<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PetaCetakSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peta-cetak-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'nama_file') ?>

    <?= $form->field($model, 'opd_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-outline-primary btn-round']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary btn-round']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
