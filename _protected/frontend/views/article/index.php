<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', Yii::$app->name) . ' ' . Yii::t('app', 'news');
$this->params['breadcrumbs'][] = Yii::t('app', 'Articles');
?>
<div class="article-index container-fluid">

    <div class="row">
        <?php foreach ($dataProvider->models as $model): ?>
            <div class="col-auto col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="<?= $model->articleImage->getImageUrlThumbnail() ?>"
                         alt="<?= $model->articleImage->filename ?>">
                    <div class="card-header">
                        <a href="<?= Yii::$app->homeUrl . 'article/' . $model->slug ?>">
                            <h4><?= $model->title ?></h4>
                        </a>
                        <p><?= Yii::$app->formatter->asDate($model->created_at, 'long') ?></p>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-justify"><?= $model->summary ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= Yii::$app->homeUrl . 'article/' . $model->slug ?>" class="btn
                           btn-outline-info">Read More...</a>
                        <ul class="nav pull-right">
                            <li class="nav-item"><span class="nav-link">Share:</span></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i
                                            class="fa fa-facebook text-primary"></i></a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i
                                            class="fa fa-twitter text-info"></i></a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i
                                            class="fa fa-pinterest text-danger"></i></a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i
                                            class="fa fa-google-plus text-danger"></i></a></li>
                            <li class="nav-item"><a href="#" class="nav-link"><i
                                            class="fa fa-linkedin text-success"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <div class="container">
            <?php
            echo \luya\bootstrap4\widgets\LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'firstPageLabel' => 'First',
//                'nextPageLabel' => 'Next',
//                'prevPageLabel' => 'Previous',
                'lastPageLabel' => 'Last',
                'options' => [
                    'class' => 'pagination justify-content-center'
                ]
            ])
            ?>
        </div>
    </div>


</div>
