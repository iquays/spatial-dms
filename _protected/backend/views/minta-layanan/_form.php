<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MintaLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body minta-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nama_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_file_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permohonan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

</div>
<div class="card-footer form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-outline-success btn-round']) ?>
    <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn
    btn-outline-secondary btn-round']) ?>


</div>

<?php ActiveForm::end(); ?>

