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
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class AdminuxAsset extends AssetBundle
{
//    public $sourcePath = '@bower/adminux/chosen';
    public $sourcePath = '@appBase/_protected/vendor2/adminux/chosen';

    public $css = [
//        'css/dark_blue_adminux.css',
        'css/dark_grey_adminux.css',
    ];
    public $js = [
        'vendor/cookie/jquery.cookie.js',
        'vendor/cookie/js.cookie.js',
        'js/ie10-viewport-bug-workaround.js',
        'vendor/cicular_progress/circle-progress.min.js',
        'vendor/sparklines/jquery.sparkline.min.js',
        'js/adminux.js',
    ];

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}

