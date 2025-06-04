<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Urusan */

$this->title = 'Nama Urusan: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Urusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="urusan-view">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?>

                <span class="pull-right">
                <?= Html::a('Index', ['index'],
                    ['class' => 'btn btn-outline-info btn-round']) ?>
                <?= Html::a('Ubah', ['update', 'id' => $model->id],
                    ['class' => 'btn btn-outline-warning btn-round']) ?>
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

        <div class="card-body status-warning">
            <div class="card-header">
                <h5 class="card-title text-warning">Daftar OPD di Urusan ini:</h5>
            </div>
            <div id="opd-list-container" class="table-responsive table-sm">
                <table class="table table-borderless text-white-50" id="opd-list">
                    <tr>
                        <th width="70px" style='text-align: center'>No</th>
                        <th> Nama</th>
                    </tr>

                    <?php
                    if (count($model->urusanOpds) > 0) {
                        foreach ($model->urusanOpds as $i => $urusanOpd) {
                            echo "<tr><td class='col-xs-1' style='text-align: center'></td><td class='col-xs-9'>" . Html::encode($urusanOpd->opd->nama) . "</td></tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
