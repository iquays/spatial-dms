<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace frontend\assets;

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
class AppAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@themes';

    public $css = [
    ];
    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\assets\FontAwesomeAsset',
//        'common\assets\MobappAsset',
        'common\assets\AdminuxLightBlueHeaderAsset',
//        'common\assets\AdminuxAsset',
//        'common\assets\AdminuxLanding1Asset',
        'common\assets\Bootstrap4Asset',
//        'yii\bootstrap4\BootstrapAsset',
        'frontend\assets\EsqiAsset'
    ];
}

