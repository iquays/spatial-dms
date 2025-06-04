<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use luya\bootstrap4\grid\ActionColumn;

//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Opd';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opd-index">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?>

                <span class="pull-right">
                <?= Html::a('Buat Opd', ['create'], ['class' => 'btn btn-outline-success btn-round']) ?>
            </span>
            </h3>
        </div>
        <div class="card-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?php
            echo \kartik\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'layout' => "{summary}\n{items}",
                'filterModel' => $searchModel,
//                'bsVersion' => '3.x',

                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn',
                        'hAlign' => 'center',
                        'vAlign' => 'top',
                        'header' => 'No'],

//                    'id',
                    'nama',
                    'is_aktif:boolean',
//                    'created_at',
//                    'updated_at',
                    //'created_by',
                    //'updated_by',
                    ['class' => 'kartik\grid\ActionColumn',
                        'header' => "Menu",
                        'hAlign' => 'center',
                        'vAlign' => 'top',
                        'width' => '135px',
                        'template' => '
                            <button class="btn-outline-warning btn-round">{view}</button>
                            <button class="btn-outline-primary btn-round">{update}</button>
                            <button class="btn-outline-danger btn-round">{delete}</button>',
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('', $url, ['title' => 'Tampilkan',
                                    'class' => 'fa fa-eye']);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('', $url, ['title' => 'Ubah',
                                    'class' => 'fa fa-pencil-square-o']);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('', $url, ['title' => 'Hapus',
                                    'class' => 'fa fa-trash',
                                    'data' => [
                                        'confirm' => 'Apakah anda yakin akan menghapus data ini?',
                                        'method' => 'post']
                                ]);
                            }
                        ]
                    ], // ActionColumn


                ],
            ]);
            ?>
            <?= \yii\bootstrap4\LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'linkOptions' => [
                    'class' => 'page-link btn-round',
                ]
            ]) ?>


        </div>
    </div>
</div>
