<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "article_image".
 *
 * @property int $id
 * @property string $picture
 * @property string $filename
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ArticleImage extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'jpg, jpeg, gif, png'],
            [['picture', 'filename', 'image'], 'safe'],
            [['picture', 'filename'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'picture' => 'Picture',
            'filename' => 'Filename',
        ];
    }

    public function getImageFile()
    {
        return isset($this->picture) ? Yii::getAlias('@uploadspath') . 'article-image/' . $this->picture : null;
    }

    public function getImageFileThumbnail()
    {
        return isset($this->picture) ? Yii::getAlias('@uploadspath') . 'article-image/thumbnail/' . $this->picture : null;
    }

    public function getImageUrl()
    {
        if (isset($this->picture)) {
            return Yii::$app->UrlManager->baseUrl . '/uploads/article-image/' . $this->picture;
        } else {
            return Yii::$app->UrlManager->baseUrl . '/uploads/article-image/empty-image.jpg';
        }
    }

    public function getImageUrlThumbnail()
    {
        if (isset($this->picture)) {
            return Yii::$app->UrlManager->baseUrl . '/uploads/article-image/thumbnail/' . $this->picture;
        } else {
            return Yii::$app->UrlManager->baseUrl . '/uploads/article-image/empty_image_thumbnail.jpg';
        }
    }

    public function uploadImage()
    {
        $image = UploadedFile::getInstance($this, 'image');

        if (empty($image)) {
            return false;
        }

        $this->filename = $image->name;
        // generate a unique file name
        $this->picture = $this->id . "_" . Yii::$app->security->generateRandomString(8) . "." . $image->extension;
        // the uploaded image instance
        return $image;
    }

    public function deleteImage()
    {
        $file = $this->getImageFile();
        if (empty($file) || !file_exists($file)) {
            return false;
        }
        if (!unlink($file)) {
            return false;
        }

        $fileThumbnail = $this->getImageFileThumbnail();
        if (empty($fileThumbnail) || !file_exists($fileThumbnail)) {
            return false;
        }
        if (!unlink($fileThumbnail)) {
            return false;
        }

        return true;
    }
}
