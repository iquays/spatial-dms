<?php
/**
 * Created by PhpStorm.
 * User: Syauqi
 * Date: 11/29/2017
 * Time: 16:56
 */

namespace common\components;

use Yii;
use yii\base\Component;

class postgisQuery extends Component
{
    public function getGeoJson($tableName, $layerId)
    {
        $db = Yii::$app->db;
        Yii::$app->response->format = yii\web\Response::FORMAT_RAW;

        $sql = "
            SELECT jsonb_build_object(
              'type',     'FeatureCollection',
              'features', jsonb_agg(feature)
            ) features
            FROM (
              SELECT jsonb_build_object(
                'type',       'Feature',
                'lid', " . $layerId . ",
                 'gid',         gid,
                'geometry',   ST_AsGeoJSON(geom)::JSONB,
                'properties', to_jsonb(row) - 'gid' - 'geom'
              ) AS feature
              FROM (SELECT * FROM {{" . $tableName . "}}) row
            ) features;
        ";

        $row = $db->createCommand($sql)->queryScalar();

        return $row;
    }

    // Only select minimal data
    public function getGeoJson2($tableName, $layerId)
    {
        $db = Yii::$app->db;
        Yii::$app->response->format = yii\web\Response::FORMAT_RAW;

        $sql = "
            SELECT jsonb_build_object(
              'type',     'FeatureCollection',
              'features', jsonb_agg(feature)
            ) features
            FROM (
              SELECT jsonb_build_object(
                'type',       'Feature',
                'lid', " . $layerId . ",
                'gid',         gid,
                'geometry',   ST_AsGeoJSON(geom)::JSONB
              ) AS feature
              FROM (SELECT * FROM {{" . $tableName . "}}) row
            ) features;
        ";

        $row = $db->createCommand($sql)->queryScalar();

        return $row;
    }
}