<?php

use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Tata Ruang Provinsi Jawa Timur">
    <meta name="author" content="Syauqi">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="icon" href="../favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="menuclose menuclose-right">
<?php $this->beginBody() ?>
<div class="nav-menu bg-gradient">
    <nav class="navbar navbar-dark navbar-expand-md">
        <!--        <div class="container-fluid">-->
        <!--            <div class="navbar-header">-->
        <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->name ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <!--</div>-->
        <div class="collapse navbar-collapse" id="navbar">

            <?php
            echo \yii\widgets\Menu::widget([
                    'items' => [
                        ['label' => ' BERANDA', 'url' => ['site/index']],
                        ['label' => ' PETA INTERAKTIF', 'url' => ['site/peta']],
                        ['label' => ' PETA CETAK', 'url' => ['peta-cetak/index']],
                        ['label' => ' LAYANAN', 'url' => ['minta-layanan/create']],
                        ['label' => '<span><i class="fa fa-user-secret"></i></span> ADMIN', 'url' => ['/backend/site/index']],
                    ],
                    'itemOptions' => [
                        'class' => 'nav-item ',
                    ],
                    'options' => [
                        'class' => 'navbar-nav ml-auto',
                    ],
                    'encodeLabels' => false,
                    'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
                ]
            );
            ?>
        </div>
    </nav>
</div>


<?php
//echo \luya\bootstrap4\widgets\Breadcrumbs::widget([
//    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//])
?>


<?= Alert::widget() ?>
<!--<div class="content pt-5 mt-2">-->
<div id="content">
    <?php echo $content ?>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
