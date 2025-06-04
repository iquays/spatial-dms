<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MintaLayanan */

$this->title = 'Permohonan Layanan Peta';
$this->params['breadcrumbs'][] = ['label' => 'Minta Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minta-layanan-create">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
