<?php

use common\helpers\CssHelper;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pengguna');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?>
                <span class="pull-right">
                <?= Html::a('Buat Pengguna', ['create'], ['class' => 'btn btn-outline-success btn-round']) ?>
            </span>
            </h3>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax' => true,
                'layout' => "{summary}\n{items}\n{pager}",

                'pager' => [
                    'class' => 'yii\bootstrap4\LinkPager',
                    'linkContainerOptions' => [
                        'class' => 'page-item',
                    ],
                    'linkOptions' => [
                        'class' => 'page-link btn-round',
                    ]
                ],

                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn',
                        'hAlign' => 'center',
                        'vAlign' => 'top',
                        'header' => 'No'
                    ],
                    'username',
                    'email:email',
                    // status
                    [
                        'attribute' => 'status',
                        'filter' => $searchModel->statusList,
                        'value' => function ($data) {
                            return $data->statusName;
                        },
                        'contentOptions' => function ($model, $key, $index, $column) {
                            return ['class' => CssHelper::statusCss($model->statusName)];
                        }
                    ],
                    // role
                    [
                        'attribute' => 'item_name',
                        'filter' => $searchModel->rolesList,
                        'value' => function ($data) {
                            return $data->roleName;
                        },
                        'contentOptions' => function ($model, $key, $index, $column) {

                            return ['class' => CssHelper::roleCss($model->roleName)];
                        }
                    ],
                    // buttons
                    [
                        'class' => 'kartik\grid\ActionColumn',
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
                ], // columns
            ]); ?>
        </div>
    </div>
</div>
