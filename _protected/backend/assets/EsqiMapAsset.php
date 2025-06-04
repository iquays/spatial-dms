<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace backend\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class EsqiMapAsset extends AssetBundle
{
//    public $sourcePath = '@bower/esqi';
    public $sourcePath = '@appBase/_protected/vendor2/esqi';

    public $css = [
        'css/backend.map.css',
    ];
    public $js = [
        'js/randomColor.js',
        'js/backend.map.js',
        'js/backend.map.setting.js',
    ];

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\assets\LeafletAsset',
        'common\assets\LeafletBrowserPrintAsset',
//        'frontend\assets\LeafletExtraMarkersAsset',
        'common\assets\LeafletEdgeBufferAsset',
//        'frontend\assets\LeafletFullScreenAsset',
        'common\assets\LeafletGraphicScaleAsset',
        'common\assets\LeafletMeasureAsset',
        'common\assets\LeafletMiniMapAsset',
        'common\assets\LeafletPolylineMeasureAsset',
        'common\assets\LeafletZoomBarAsset',
    ];
}

