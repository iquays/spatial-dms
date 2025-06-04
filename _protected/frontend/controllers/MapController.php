<?php

namespace frontend\controllers;

use common\models\Peta;
use common\models\PetaJsondata;
use Yii;
use yii\db\Query;

class MapController extends \yii\web\Controller
{

    public function actionList()
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $petas = Peta::find()->all();
        $out = [];
        foreach ($petas as $peta) {
            $out[] = [$peta->nama, $peta->nama_tabel];
        }
        return $out;
    }

    public function actionInfo($petaId, $gid)
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $data = (new Query())->select(['nama_tabel', 'nama'])->from('peta')->where(['id' => $petaId])->one();
        $tableName = $data["nama_tabel"];
        $columns = Yii::$app->db->createCommand("SELECT column_name FROM information_schema.columns WHERE table_name = '" . $tableName . "' AND column_name NOT IN('gid', 'geom')")->queryAll();

        $out_columns = [];

        foreach ($columns as $item) {
            $out_columns[] = $item['column_name'];
        }

        $info ["nama"] = $data["nama"];
        $info ["data"] = (new Query())->select($out_columns)->from($tableName)->where(['gid' => $gid])->one();
        return $info;
    }

    public function actionGetlayer2($tableName, $layerId = 999)
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_RAW;
        return Yii::$app->postgisQuery->getGeoJson($tableName, $layerId);
    }

    public function actionGetlayer($petaId = 999)
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_RAW;
        return PetaJsondata::findOne($petaId)->jsondata;
    }

}
