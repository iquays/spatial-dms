<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PetaCetak */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Peta Cetaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peta-cetak-view">

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
//                    'id',
//                    'nama',
//                    'nama_file',
                    'opd.nama',
                    'deskripsi',
//                    'created_at',
//                    'updated_at',
//                    'created_by',
//                    'updated_by',
                ],
            ]) ?>

            <?php
            if (empty($model->nama_file)) {
                echo 'Belum ada data peta';
            } else {
                echo "<object style='width:100%; height:750px' type='application/pdf'  data='" . $model->getFileUrl() . "' ><p>Maaf, fitur ini tidak didukung oleh browser anda. </p><a href='" . $model->getFileUrl() . "'>Download peta</a></object>";
            }
            ?>
        </div>
    </div>
</div>
