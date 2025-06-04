<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace common\assets;

use yii\web\AssetBundle;

// set @themes alias so we do not have to update baseUrl every time we change themes
//Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class LeafletTileLayerPouchDBCachedAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@themes';
    public $sourcePath = '@appBase/_protected/vendor2/leafletPlugins/LeafletTileLayerPouchDBCached/';

    public $css = [
    ];
    public $js = [
//        'pouchdb-6.3.4.min.js',  // this plugin is not working with this PouchDB version
        'pouchdb-5.2.0.min.js',
//        'L.TileLayer.PouchDBCached.js',   // Below is plugin from MazeMap
        'leaflet-tilelayer-pouchdb.min.js', // Below is alternate plugin from jczaplew
    ];

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

}