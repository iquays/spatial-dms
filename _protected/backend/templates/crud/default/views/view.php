<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= "<?= " ?>Html::encode($this->title) ?>

                <span class="pull-right">
                <?= "<?= " ?>Html::a(<?= $generator->generateString('Index') ?>, ['index', <?= $urlParams ?>],
                ['class' => 'btn btn-outline-warning btn-round']) ?>
                <?= "<?= " ?>Html::a(<?= $generator->generateString('Ubah') ?>, ['update', <?= $urlParams ?>],
                ['class' => 'btn btn-outline-primary btn-round']) ?>
                <?= "<?= " ?>Html::a(<?= $generator->generateString('Hapus') ?>, ['delete', <?= $urlParams ?>], [
                'class' => 'btn btn-outline-danger btn-round',
                'data' => [
                'confirm' => <?= $generator->generateString('Apakah anda yakin akan menghapus data ini?') ?>,
                'method' => 'post',
                ],
                ]) ?>
            </span>
            </h3>
        </div>
        <div class="card-body">
            <?= "<?= " ?>DetailView::widget([
            'model' => $model,
            'attributes' => [
            <?php
            if (($tableSchema = $generator->getTableSchema()) === false) {
                foreach ($generator->getColumnNames() as $name) {
                    echo "            '" . $name . "',\n";
                }
            } else {
                foreach ($generator->getTableSchema()->columns as $column) {
                    $format = $generator->generateColumnFormat($column);
                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                }
            }
            ?>
            ],
            ]) ?>
        </div>
    </div>
</div>
