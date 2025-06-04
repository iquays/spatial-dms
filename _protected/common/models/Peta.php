<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "peta".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property bool $default_on_frontpage
 * @property string $nama_file
 * @property string $nama_tabel
 * @property int $versi_peta
 * @property int $opd_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Opd $opd
 */
class Peta extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required', 'message' => 'Kolom {attribute} tidak koleh kosong'],
            [['opd_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['opd_id', 'versi_peta'], 'integer'],
            [['default_on_frontpage'], 'boolean'],
            [['nama', 'deskripsi'], 'string', 'max' => 255],
            [['nama_file', 'nama_tabel'], 'string', 'max' => 100],
            [['opd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opd::className(), 'targetAttribute' => ['opd_id' => 'id']],
            [['file'], 'file', 'extensions' => 'zip', 'maxSize' => 20480000, 'tooBig' => 'Batas ukuran file maksimal 20MB'],
        ];
    }

    public function getLoc()
    {
        return Yii::getAlias('uploads/peta/');
    }


    public function getFile()
    {
        return isset($this->nama_file) ? Yii::getAlias('uploads/peta/') . $this->nama_file : null;
    }

    public function getFileUrl()
    {
        $split = explode("/", Yii::getAlias('@app'));
        if ($split[count($split) - 1] == 'frontend') {
            $theUrl = empty($this->nama_file) ? null : Yii::$app->UrlManager->baseUrl . '/backend/uploads/peta/' . $this->nama_file;
        } else {
            $theUrl = empty($this->nama_file) ? null : Yii::$app->UrlManager->baseUrl . '/uploads/peta/' . $this->nama_file;

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
        $this->nama_file = $this->id . '_' . $this->versi_peta . '_' . $name . "." . $file->extension;

        // the uploaded image instance
        return $file;
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
            'default_on_frontpage' => 'Default On Frontpage',
            'nama_file' => 'Nama File',
            'nama_tabel' => 'Nama Tabel',
            'opd_id' => 'Nama Opd',
            'file' => 'Nama File (format zip)',
            'opd.nama' => 'Nama OPD',
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
