<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peta_jsondata".
 *
 * @property int $peta_id
 * @property int $peta_version
 * @property string $jsondata
 */
class PetaJsondata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peta_jsondata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['peta_id'], 'required'],
            [['peta_id', 'peta_version'], 'default', 'value' => null],
            [['peta_id', 'peta_version'], 'integer'],
            [['jsondata'], 'string'],
            [['peta_id'], 'unique'],
        ];
    }

}
