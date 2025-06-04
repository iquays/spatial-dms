<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Opd */

$this->title = 'Buat Opd';
$this->params['breadcrumbs'][] = ['label' => 'Opds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opd-create">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>
</div>
