<?php

namespace backend\models;

use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property integer $status
 * @property integer $category
 * @property string $slug
 * @property integer $article_image_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $user
 * @property ArticleImage $articleImage
 */
class Article extends ActiveRecord
{
    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;

    const CATEGORY_ECONOMY = 1;
    const CATEGORY_SOCIETY = 2;
    const CATEGORY_SPORT = 3;

    public $image;

    /**
     * Declares the name of the database table associated with this AR class.
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'maxFiles' => 6, 'extensions' => 'jpg, gif, png'],
            [['user_id', 'title', 'summary', 'content', 'status', 'article_image_id'], 'required'],
            [['user_id', 'status', 'category', 'article_image_id'], 'integer'],
            [['article_image_id'], 'safe'],
            [['summary', 'content'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
//                'immutable' => true,
//                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Author'),
            'title' => Yii::t('app', 'Title'),
            'article_image_id' => Yii::t('app', 'Article Image'),
            'summary' => Yii::t('app', 'Summary'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'category' => Yii::t('app', 'Category'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets the id of the article creator.
     * NOTE: needed for RBAC Author rule.
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->user_id;
    }

    /**
     * Gets the author name from the related User table.
     *
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->user->username;
    }

    /**
     * Returns the article status in nice format.
     *
     * @param  null|integer $status Status integer value if sent to method.
     * @return string               Nicely formatted status.
     */
    public function getStatusName($status = null)
    {
        $status = (empty($status)) ? $this->status : $status;

        if ($status === self::STATUS_DRAFT) {
            return Yii::t('app', 'Draft');
        } else {
            return Yii::t('app', 'Published');
        }
    }

    /**
     * Returns the array of possible article status values.
     *
     * @return array
     */
    public function getStatusList()
    {
        $statusArray = [
            self::STATUS_PUBLISHED => Yii::t('app', 'Published'),
            self::STATUS_DRAFT => Yii::t('app', 'Draft'),
        ];

        return $statusArray;
    }

    /**
     * Returns the article category in nice format.
     *
     * @param  null|integer $category Category integer value if sent to method.
     * @return string                 Nicely formatted category.
     */
    public function getCategoryName($category = null)
    {
        $category = (empty($category)) ? $this->category : $category;

        if ($category === self::CATEGORY_ECONOMY) {
            return Yii::t('app', 'Economy');
        } elseif ($category === self::CATEGORY_SOCIETY) {
            return Yii::t('app', 'Society');
        } else {
            return Yii::t('app', 'Sport');
        }
    }

    /**
     * Returns the array of possible article category values.
     *
     * @return array
     */
    public function getCategoryList()
    {
        $statusArray = [
            self::CATEGORY_ECONOMY => Yii::t('app', 'Economy'),
            self::CATEGORY_SOCIETY => Yii::t('app', 'Society'),
            self::CATEGORY_SPORT => Yii::t('app', 'Sport'),
        ];

        return $statusArray;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleImage()
    {
        return $this->hasOne(ArticleImage::className(), ['id' => 'article_image_id']);
    }

}
