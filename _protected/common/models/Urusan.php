<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "urusan".
 *
 * @property int $id
 * @property string $nama
 * @property bool $is_aktif
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property UrusanOpd[] $urusanOpds
 * @property Opd[] $opds
 * @property int $jumlahPetaCetak
 */
class Urusan extends \yii\db\ActiveRecord
{

    public $opds;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required', 'message' => 'Kolom {attribute} tidak koleh kosong'],
            [['opds'], 'safe'],
            [['is_aktif'], 'boolean'],
            [['nama'], 'string', 'max' => 255],
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
            'nama' => 'Nama Urusan',
            'is_aktif' => 'Status: ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrusanOpds()
    {
        return $this->hasMany(UrusanOpd::className(), ['urusan_id' => 'id']);
    }

    public function getJumlahPetaCetak()
    {
        $jumlahPetaCetak = 0;
        foreach ($this->urusanOpds as $urusanOpd) {
            $jumlahPetaCetak = $jumlahPetaCetak + $urusanOpd->opd->getPetaCetaks()->count();
        }
        return $jumlahPetaCetak;
    }

}
