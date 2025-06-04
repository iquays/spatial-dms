<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Nama Pengguna: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="card">
        <div class="card-header page-title">

            <h3><?= Html::encode($this->title) ?>

                <div class="pull-right">
                    <?= Html::a('Index', ['index'], ['class' => 'btn btn-outline-info btn-round']) ?>
                    <?= Html::a('Ubah', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-outline-warning btn-round']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-outline-danger btn-round',
                        'data' => [
                            'confirm' => 'Apakah anda yakin akan menghapus pengguna ini?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>

            </h3>
        </div>
        <?php
        $attr = [];
        $attr[] = 'username';
        $attr[] = 'email:email';
        $attr[] = [
            'attribute' => 'status',
            'value' => $model->getStatusName(),
        ];
        $attr[] = [
            'attribute' => 'item_name',
            'value' => $model->getRoleName(),
        ];
        if (!empty($model->opd_id)) {
            $attr[] = 'opd.nama';
        }

        ?>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => $attr
//                'id',
//                    'username',
//                    'email:email',
                //'password_hash',
//                    [
//                        'attribute' => 'status',
//                        'value' => $model->getStatusName(),
//                    ],
//                    [
//                        'attribute' => 'item_name',
//                        'value' => $model->getRoleName(),
//                    ],
//                    !empty($model->opd_id) ? ['opd.name'] : [null],
                //'auth_key',
                //'password_reset_token',
                //'account_activation_token',
//                'created_at:date',
//                'updated_at:date',
//                ],
            ]) ?>
        </div>
    </div>
