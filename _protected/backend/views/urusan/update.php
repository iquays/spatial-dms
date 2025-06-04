<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Urusan */

$this->title = 'Ubah Urusan: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Urusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="urusan-update">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
