<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Peta */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Petas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peta-view">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?>

                <span class="pull-right">
                <?= Html::a('Index', ['index', 'id' => $model->id],
                    ['class' => 'btn btn-outline-warning btn-round']) ?>
                <?= Html::a('Ubah', ['update', 'id' => $model->id],
                    ['class' => 'btn btn-outline-primary btn-round']) ?>
                <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-outline-danger btn-round',
                    'data' => [
                        'confirm' => 'Apakah anda yakin akan menghapus data ini?',
                        'method' => 'post',
                    ],
                ]) ?>
            </span>
            </h3>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'nama',
                    'deskripsi',
                    'nama_file',
                    'nama_tabel',
                    'opd_id',
                    'default_on_frontpage'
                ],
            ]) ?>
        </div>
    </div>
</div>
