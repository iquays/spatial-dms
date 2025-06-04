<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Urusan */

$this->title = 'Buat Urusan';
$this->params['breadcrumbs'][] = ['label' => 'Urusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urusan-create">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>
</div>
