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
class MobappAsset extends AssetBundle
{
    public $sourcePath = '@appBase/_protected/vendor2/mobapp';

    public $css = [
//        'css/style.css',
        'css/style.modified.css',
    ];
    public $js = [
        'js/script.js',
    ];

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV,
    ];

    public $depends = [
    ];
}

