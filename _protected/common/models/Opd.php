<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "opd".
 *
 * @property int $id
 * @property string $nama
 * @property bool $is_aktif
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property PetaCetak[] $petaCetaks
 * @property UrusanOpd[] $urusanOpds
 * @property User[] $users
 **/
class Opd extends \yii\db\ActiveRecord
{

    public $urusans;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required', 'message' => 'Kolom {attribute} tidak koleh kosong'],
            [['is_aktif'], 'boolean'],
            [['nama'], 'string', 'max' => 255],
            [['urusans'], 'safe']
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
            'nama' => 'Nama',
            'is_aktif' => 'Is Aktif',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetaCetaks()
    {
        return $this->hasMany(PetaCetak::className(), ['opd_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrusanOpds()
    {
        return $this->hasMany(UrusanOpd::className(), ['opd_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['opd_id' => 'id']);
    }

    public static function getList()
    {
        $opds = self::find()->select(['id', 'nama'])->orderBy('nama')->all();
        foreach ($opds as $opd) {
            $listOpds[$opd->id] = $opd->nama;
        }
        return $listOpds;
    }
}
