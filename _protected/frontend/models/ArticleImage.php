<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

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
            return Yii::$app->UrlManager->baseUrl . '/backend/uploads/article-image/' . $this->picture;
        } else {
            return Yii::$app->UrlManager->baseUrl . '/backend/uploads/article-image/empty-image.jpg';
        }
    }

    public function getImageUrlThumbnail()
    {
        if (isset($this->picture)) {
            return Yii::$app->UrlManager->baseUrl . '/backend/uploads/article-image/thumbnail/' . $this->picture;
        } else {
            return Yii::$app->UrlManager->baseUrl . '/backend/uploads/article-image/empty_image_thumbnail.jpg';
        }
    }

}
