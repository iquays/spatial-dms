<?php

namespace backend\controllers;

use common\models\MapLayer;
use common\models\MapLayerJsondata;
use Yii;

class MapController extends \yii\web\Controller
{

    public function actionList()
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $maplayers = MapLayer::find()->all();
        $out = [];
        foreach ($maplayers as $maplayer) {
            $out[] = [$maplayer->name, $maplayer->newestTable];
        }
        return $out;
    }

    public function actionGetlayer2($tableName, $layerId = 999)
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_RAW;
        return Yii::$app->postgisQuery->getGeoJson($tableName, $layerId);
    }

    public function actionGetlayer($mapLayerId = 999)
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_RAW;
        return MapLayerJsondata::findOne($mapLayerId)->jsondata;
    }

}
