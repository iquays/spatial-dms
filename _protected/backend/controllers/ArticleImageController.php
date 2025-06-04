<?php

namespace backend\controllers;

use Yii;
use backend\models\ArticleImage;
use yii\imagine\Image;
use yii\helpers\Html;


class ArticleImageController extends \yii\web\Controller
{

    /**
     * Upload function to handle AJAX file upload request
     */

    public function actionUpload()
    {
        // Check if no file for upload
        if (empty($_FILES['file'])) {
            echo json_encode(['errors' => 'No file(s) found for upload']);
            return;
        }

        // Get the file(s)
        $files = $_FILES['file'];

        $success = NULL;
        $paths = [];

        $filenames = $files['name'];

//        if (!file_exists(Yii::$app->params['productUploadPath'] . DIRECTORY_SEPARATOR . $_POST['product_id'])) {
//            mkdir(Yii::$app->params['productUploadPath'] . DIRECTORY_SEPARATOR . $_POST['product_id']);
//            mkdir(Yii::$app->params['productUploadPath'] . DIRECTORY_SEPARATOR . $_POST['product_id'] . DIRECTORY_SEPARATOR . 'thumbnail');
//        }

        $preview = [];
        $previewConfig = [];
        $countFilename = count($filenames);
        for ($i = 0; $i < $countFilename; $i++) {
            $filename = $filenames[$i];
            $picture = Yii::$app->security->generateRandomString(3) . '-' . preg_replace('/\s+/', '_', $filename);
            $target = Yii::getAlias('@uploadspath') . 'article-image/' . $picture;
            $targetThumbnail = Yii::getAlias('@uploadspath') . 'article-image/thumbnail/' . $picture;
            if (move_uploaded_file($files['tmp_name'][$i], $target)) {
                $success = TRUE;
                $paths[] = $target;
                $modelArticleImage = new ArticleImage();
                $modelArticleImage->picture = $picture;
                $modelArticleImage->filename = $filename;
                $modelArticleImage->save();
                Image::thumbnail($target, 640, 426)->save($targetThumbnail, ['quality' => 90]);
                $preview[$i] = Html::img($modelArticleImage->getImageUrl(), ['style' => 'height:160px', 'class' => 'file-preview-image']);
                $previewConfig[$i] = ['url' => Yii::$app->homeUrl . 'articleimage/delete?id=' . $modelArticleImage->id, 'caption' => $modelArticleImage->filename];
            } else {
                $success = FALSE;
                break;
            }
        }

        if ($success === TRUE) {
            $output = ['succeeded' => 'file uploaded', 'article_image_id' => $modelArticleImage->id, 'initialPreview' => $preview, 'initialPreviewConfig' => $previewConfig, 'append' => true];
//            $output = ['error' => $target . '<==>' . $targetThumbnail, 'initialPreview' => $preview, 'initialPreviewConfig' => $previewConfig, 'append' => true];
        } elseif ($success === FALSE) {
            $output = ['error' => 'Error while upload'];
            foreach ($paths as $path) {
                unlink($path);
            }
        } else {
            $output = ['error' => 'No file(s) were processed'];
        }

        echo json_encode($output);
    }

}
