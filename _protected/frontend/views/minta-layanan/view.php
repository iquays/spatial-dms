<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MintaLayanan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Minta Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="minta-layanan-view">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?>

                <span class="pull-right">
                <?= Html::a('Ubah', ['index', 'id' => $model->id],
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
                        'id',
            'nama_pemohon',
            'alamat',
            'nik',
            'no_telepon',
            'email:email',
            'nama_file_ktp',
            'permohonan',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            ],
            ]) ?>
        </div>
    </div>
</div>
