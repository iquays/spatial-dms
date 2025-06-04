<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "minta_layanan".
 *
 * @property int $id
 * @property string $nama_pemohon
 * @property string $alamat
 * @property string $nik
 * @property string $no_telepon
 * @property string $email
 * @property string $nama_file_ktp
 * @property string $permohonan
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class MintaLayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minta_layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pemohon', 'nik', 'email', 'permohonan'], 'required', 'message' => 'Kolom {attribute} tidak koleh kosong'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama_pemohon', 'alamat', 'nama_file_ktp', 'permohonan'], 'string', 'max' => 255],
            [['nik'], 'string', 'max' => 16],
            [['no_telepon'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['email'], 'unique'],
            [['email'], 'email'],
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
            'nama_pemohon' => 'Nama Pemohon',
            'alamat' => 'Alamat',
            'nik' => 'NIK',
            'no_telepon' => 'No Telepon',
            'email' => 'Email',
            'nama_file_ktp' => 'Nama File Ktp',
            'permohonan' => 'Permohonan',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
