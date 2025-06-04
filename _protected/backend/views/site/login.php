<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
?>
<figure class="background"><img src="../images/login_bg.jpg" alt="Adminux- sign in "></figure>


<div class="wrapper-content-sign-in p-0">
    <div class="col-md-6 offset-md-6 text-left side_signing_full">

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableClientValidation' => false,
            'fieldConfig' => ['options' => ['class' => 'form-group my-4']],
            'options' => [
                'class' => 'form-signin1 full_side text-white'
            ]
        ]); ?>
        <h2 class="tex-black mb-5">Sign in</h2>

        <?php //-- use email or username field depending on model scenario --// ?>
        <?php if ($model->scenario === 'lwe'): ?>
            <?= $form->field($model, 'email', ['labelOptions' => ['class' => 'sr-only']])->textInput(['placeholder' => 'Email'])->label(false) ?>
        <?php else: ?>
            <?= $form->field($model, 'username', ['labelOptions' => ['class' => 'sr-only']])->textInput(['placeholder' => 'Nama User']) ?>
        <?php endif ?>
        <?= $form->field($model, 'password', ['labelOptions' => ['class' => 'sr-only']])->passwordInput(['placeholder' => 'Password'])->label(false) ?>
        <?php // $form->field($model, 'rememberMe')->checkbox() ?>

        <!--        <div class="form-group">-->
        <?= Html::submitButton(Yii::t('app', 'Sign in'), ['class' => 'btn btn-lg btn-round btn-outline-primary my-4', 'name' => 'login-button']) ?>
        <!--        </div>-->

        <?php ActiveForm::end(); ?>

        <br>
    </div>
    <footer class="footer-content row  justify-content-between align-items-center">
        <div class="col-sm-8">Sistem Informasi Pengelolaan Data dan Informasi Berbasis Spasial Tuban - <a
                    href="http://localhost/spatu"
                    target="_blank"
                    class="">SI-KEDAI SPATU</a></div>
    </footer>
</div>

