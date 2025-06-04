<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>

    <?php foreach ($generator->getColumnNames() as $attribute) {
        if (in_array($attribute, $safeAttributes)) {
            echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
        }
    } ?>
</div>
<div class="card-footer form-group">
    <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Simpan') ?>, ['class' => 'btn btn-outline-success btn-round']) ?>
    <?= "<?= " ?>Html::a(<?= $generator->generateString('Batal') ?>, Yii::$app->request->referrer, ['class' => 'btn
    btn-outline-secondary btn-round']) ?>


</div>

<?= "<?php " ?>ActiveForm::end(); ?>

