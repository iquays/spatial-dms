<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Peta */

$this->title = 'Buat Peta';
$this->params['breadcrumbs'][] = ['label' => 'Petas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peta-create">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>
</div>
