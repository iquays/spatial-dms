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
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@appBase/_protected/vendor2/font-awesome/';
//    public $sourcePath = '@bower/font-awesome/fa5/svg-with-js/';
//    public $sourcePath = '@bower/font-awesome/fa5/web-fonts-with-css/';

    public $css = [
        'css/font-awesome.css',
//        'css/fa-svg-with-js.css'
//        'css/fontawesome-all.css'
    ];
    public $js = [
//        'js/fontawesome-all.js'
    ];

    public $publishOptions = [
//        'forceCopy' => YII_ENV_DEV,
    ];

}

