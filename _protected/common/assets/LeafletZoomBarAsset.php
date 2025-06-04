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
class LeafletZoomBarAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@themes';
    public $sourcePath = '@appBase/_protected/vendor2/leafletPlugins/leafletZoomBar/build/';

    public $css = [
        'L.Control.ZoomBar.css',
    ];
    public $js = [
        'L.Control.ZoomBar.js',
    ];

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

}