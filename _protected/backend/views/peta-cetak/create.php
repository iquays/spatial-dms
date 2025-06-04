<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PetaCetak */

$this->title = 'Buat Peta Cetak';
$this->params['breadcrumbs'][] = ['label' => 'Peta Cetaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peta-cetak-create">
    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>
</div>
