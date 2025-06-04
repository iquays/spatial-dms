<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MintaLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body minta-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row col-lg-8 col-md-10 col-sm-12">
        <div class="col-md-7 col-sm-12">
            <?= $form->field($model, 'nama_pemohon')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5 col-sm-12">
            <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <?= $form->field($model, 'alamat')->textarea(['maxlength' => true]) ?>
    </div>
    <div class="row col-lg-8 col-md-10 col-sm-12">
        <div class="col-lg-6 col-md-10 col-sm-12">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-10 col-sm-12">
            <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php
    //    echo $form->field($model, 'nama_file_ktp')->textInput(['maxlength' => true])
    ?>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <?= $form->field($model, 'permohonan')->textarea(['maxlength' => true, 'rows' => 4]) ?>
    </div>
</div>
<div class="card-footer form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-outline-success btn-round']) ?>
    <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn
    btn-outline-secondary btn-round']) ?>


</div>

<?php ActiveForm::end(); ?>

