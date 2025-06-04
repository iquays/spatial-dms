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
class EsqiAsset extends AssetBundle
{
//    public $sourcePath = '@bower/esqi';
    public $sourcePath = '@appBase/_protected/vendor2/esqi';

    public $css = [
        'css/backend.css',
        'css/myBackend.css'
    ];
    public $js = [
//        'js/backend.js'
    ];

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}

