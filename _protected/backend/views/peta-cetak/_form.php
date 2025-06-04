<?php

use  yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\PetaCetak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body peta-cetak-form">

    <?php $form = ActiveForm::begin([
        'id' => 'PetaCetak',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-lg-7 col-md-9">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-9">
            <?= $form->field($model, 'deskripsi')->textarea(['maxlength' => true, 'rows' => 3]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-9">
            <?= $form->field($model, 'opd_id')->widget(\kartik\select2\Select2::className(), [
                'data' => \common\models\Opd::getList(),
                'theme' => \kartik\select2\Select2::THEME_KRAJEE_BS4,
                'options' => ['placeholder' => 'Pilih OPD...', 'containerCssClass' => 'darg'],
                'pluginOptions' => ['disabled' => Yii::$app->user->can('adminOpd') ? true : false]
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <?php
            $initialPreview = null;
            if (!(empty($model->nama_file))) {
                $file_parts = pathinfo($model->nama_file);
                $initialPreview = "<object style='width:100%; height:100%' type='application/pdf'  data='" . $model->getFileUrl() . "' ><p>Sorry, the plugin is not supported</p><a href='" . $model->getFileUrl() . "'>Download the File</a></object>";
            }
            ?>
            <?= $form->field($model, 'file')->label(false)->widget(FileInput::classname(), ['options' => ['accept' => 'application/pdf'],
                'pluginOptions' => [
                    'browseIcon' => '<i class="fa fa-folder-open"></i> ',
                    'allowedFileExtensions' => ['pdf'],
                    $model->nama_file == null ? null : 'initialPreview' => $initialPreview,
                    'showUpload' => false,
                    'showCaption' => false,
                    'showRemove' => false,
                    'showClose' => false,
                    'showCancel' => false,
                    'browseClass' => ' btn btn-outline-primary btn-sm',
                    'previewSettings' => ['object' => ['width' => '200px', 'height' => '150px']],
                    'layoutTemplates' => ['footer' => ''],
                ]]);
            ?>
        </div>
    </div>
</div>
<div class="card-footer form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-outline-success btn-round']) ?>
    <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn
    btn-outline-secondary btn-round']) ?>


</div>

<?php ActiveForm::end(); ?>

