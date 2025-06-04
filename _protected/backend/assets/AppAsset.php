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
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 *
 * Customized by Nenad Živković
 */
class AppAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@themes';
//    public $sourcePath = '@appBase/_protected/vendor2/';


    public $css = [
//        'css/site.css',
    ];
    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'backend\assets\EsqiAsset',
//        'yii\bootstrap4\BootstrapAsset',
        'common\assets\Bootstrap4Asset',
        'common\assets\FontAwesomeAsset',
        'common\assets\AdminuxAsset',
    ];
}
