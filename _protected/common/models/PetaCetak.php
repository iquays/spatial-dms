<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "peta_cetak".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $nama_file
 * @property int $opd_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Opd $opd
 */
class PetaCetak extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peta_cetak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'opd_id'], 'required', 'message' => 'Kolom {attribute} tidak koleh kosong'],
            [['opd_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id', 'opd_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama', 'deskripsi', 'nama_file'], 'string', 'max' => 255],
            [['opd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opd::className(), 'targetAttribute' => ['opd_id' => 'id']],
            [['file'], 'file', 'extensions' => 'pdf', 'maxSize' => 20480000, 'tooBig' => 'Batas ukuran file maksimal 20MB'],

        ];
    }


    public function getFile()
    {
        return isset($this->nama_file) ? Yii::getAlias('uploads/peta-cetak/') . $this->nama_file : null;
    }

    public function getFileUrl()
    {
        $split = explode("/", Yii::getAlias('@app'));
        if ($split[count($split) - 1] == 'frontend') {
            $theUrl = empty($this->nama_file) ? null : Yii::$app->UrlManager->baseUrl . '/backend/uploads/peta-cetak/' . $this->nama_file;
        } else {
            $theUrl = empty($this->nama_file) ? null : Yii::$app->UrlManager->baseUrl . '/uploads/peta-cetak/' . $this->nama_file;

        }
        return $theUrl;
    }

    public function uploadFile()
    {
        $file = UploadedFile::getInstance($this, 'file');

        if (empty($file)) {
            return false;
        }
        $name = preg_replace('/\s+/', '_', $file->baseName);
        $this->nama_file = $this->id . '_' . $name . '_' . Yii::$app->security->generateRandomString(3) . "." . $file->extension;

        // the uploaded image instance
        return $file;
    }

    public function deleteFile()
    {
        $file = $this->getFile();

        if (empty($file) || !file_exists($file)) {
            return false;
        }

        if (!unlink($file)) {
            return false;
        }

        return true;
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
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
            'nama_file' => 'Nama File',
            'opd_id' => 'Opd ID',
            'opd.nama' => 'Nama Opd'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpd()
    {
        return $this->hasOne(Opd::className(), ['id' => 'opd_id']);
    }
}
