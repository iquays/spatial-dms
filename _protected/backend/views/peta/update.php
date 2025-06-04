<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Peta */

$this->title = 'Ubah Peta: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Petas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="peta-update">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
