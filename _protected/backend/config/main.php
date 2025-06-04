<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'spatu-backend',
    'name' => 'SI-KEDAI SPATU - Backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
    ],
    'components' => [
        // here you can set theme used for your backend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'frontendUserCounter' => [
            'class' => 'common\components\UserCounter',
            // You can setup these options:
            'tableUsers' => 'frontend_counter_users',
            'tableSave' => 'frontend_counter_save',
            'autoInstallTables' => true,
            'onlineTime' => 10, // min
        ],
        'view' => [
            // RMREVIN
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'webPath' => '@web', // path alias to web base
            'basePath' => '@webroot', // path alias to web base
            'minifyPath' => '@webroot/assets/minify', // path alias to save minify result
            'minifyOutput' => true, // minificate result html page
            'jsPosition' => [\yii\web\View::POS_END], // positions of js files to be minified
            'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expandImports' => true, // whether to change @import on content
            'compressOptions' => ['extra' => true], // options for compress
            'concatCss' => true,
            'minifyCss' => true,
            'concatJs' => false,
            'minifyJs' => true,
            'jsOptions' => [
//                'async' => 'async',
//                'defer' => 'defer',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@uploads' => '@appRoot/uploads',
//        '@uploads' => '@backend/uploads',
        '@uploadsurl' => '@appRoot/uploads/',
        '@uploadspath' => '@appBase/backend/uploads/',
        '@customJs' => '@appRoot/js',
    ],
];
