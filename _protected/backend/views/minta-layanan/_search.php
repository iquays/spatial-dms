<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MintaLayananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minta-layanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_pemohon') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'no_telepon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'nama_file_ktp') ?>

    <?php // echo $form->field($model, 'permohonan') ?>

    <?php // echo $form->field($model, 'status') ?>

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
