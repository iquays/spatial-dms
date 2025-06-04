<?php

use common\rbac\models\AuthItem;
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $role common\rbac\models\Role; */
?>
<style>
    .select2-container, .select2-selection, .select2-container--karajee-bs4 {
        background-color: #00f;
    }

    .select2-search, .select2-container--open {
        background-color: black;
    }
</style>
<div class="user-form card-body">
    <div class="col-lg-6 well bs-component">
        <?php $form = ActiveForm::begin(['id' => 'form-user']); ?>

        <?= $form->field($user, 'username') ?>

        <?= $form->field($user, 'email') ?>

        <?php if ($user->scenario === 'create'): ?>
            <?= $form->field($user, 'password')->widget(PasswordInput::classname(), []) ?>
        <?php else: ?>
            <?= $form->field($user, 'password')->widget(PasswordInput::classname(), [])
                ->passwordInput(['placeholder' => Yii::t('app', 'New pwd ( if you want to change it )')])
            ?>
        <?php endif ?>

        <div class="row">
            <div class="col-lg-6">

                <?= $form->field($user, 'status')->dropDownList($user->statusList) ?>
            </div>
            <div class="col-lg-6">
                <?php foreach (AuthItem::getRoles() as $item_name): ?>
                    <?php $roles[$item_name->name] = $item_name->name ?>
                <?php endforeach ?>
                <?= $form->field($role, 'item_name')->dropDownList($roles) ?>
            </div>
        </div>
        <?php
        echo $form->field($user, 'opd_id', ['options' => [
            'id' => 'my_opd_id', 'style' => $user->isNewRecord ? 'display:none' : (empty($user->opd_id) ? 'display:none' : 'display:')
        ]])->widget(\kartik\select2\Select2::className(), [
            'data' => \common\models\Opd::getList(),
            'theme' => \kartik\select2\Select2::THEME_KRAJEE_BS4,
            'options' => ['placeholder' => 'Pilih OPD...', 'containerCssClass' => 'darg']
        ])
        ?>
    </div>
</div>
<div class="form-group card-footer">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-outline-success btn-round']) ?>

    <?= Html::a('Batal', ['user/index'], ['class' => 'btn btn-outline-secondary btn-round']) ?>
</div>

<?php ActiveForm::end(); ?>


<?php
$script = <<< JS
    $(document).ready(function () {
        $('#role-item_name').change(function () {
            if (document.getElementById('role-item_name').value == 'adminOpd') {
                $('#my_opd_id').slideDown('fast');
            } else {
                $('#my_opd_id').slideUp('fast');
                $('#user-opd_id').val(null).trigger('change');
            }        
        })
    });
JS;
$this->registerJs($script);
?>
