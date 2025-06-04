<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">


    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="page-title">
                <h3><?= Html::encode($this->title) ?></h3>
                <p><?= Yii::$app->formatter->asDate($model->created_at, 'long') ?></p>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <img class="card-img-top" src="<?= $model->articleImage->getImageUrl() ?>"
                     alt="<?= $model->articleImage->filename ?>">
                <div class="card-body">
                    <p class="card-text text-justify"><?= HtmlPurifier::process($model->content) ?></p>
                </div>
            </div>
        </div>
    </div>

</div>
