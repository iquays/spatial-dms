<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "urusan_opd".
 *
 * @property int $id
 * @property int $urusan_id
 * @property int $opd_id
 *
 * @property Opd $opd
 * @property Urusan $urusan
 */
class UrusanOpd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urusan_opd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urusan_id', 'opd_id'], 'required'],
            [['urusan_id', 'opd_id'], 'integer'],
            [['opd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opd::className(), 'targetAttribute' => ['opd_id' => 'id']],
            [['urusan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Urusan::className(), 'targetAttribute' => ['urusan_id' => 'id']],
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
            'urusan_id' => 'Urusan ID',
            'opd_id' => 'Opd ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpd()
    {
        return $this->hasOne(Opd::className(), ['id' => 'opd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrusan()
    {
        return $this->hasOne(Urusan::className(), ['id' => 'urusan_id']);
    }
}
