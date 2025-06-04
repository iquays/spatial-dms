<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString("Daftar " . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= "<?= " ?>Html::encode($this->title) ?>

                <span class="pull-right">
                <?= "<?= " ?>Html::a(<?= $generator->generateString('Buat ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-outline-success btn-round']) ?>
            </span>
            </h3>
        </div>
        <div class="card-body">
            <?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : '' ?>
            <?php if (!empty($generator->searchModelClass)): ?>
                <?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php endif; ?>

            <?php if ($generator->indexWidgetType === 'grid'): ?>
                <?= "<?= " ?>\kartik\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'layout' => "{summary}\n{items}\n{pager}",

                'pager' => [
                'class' => 'yii\bootstrap4\LinkPager',
                'linkContainerOptions' => [
                'class' => 'page-item',
                ],
                'linkOptions' => [
                'class' => 'page-link btn-round',
                ]
                ],

                <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
                ['class' => 'kartik\grid\SerialColumn',
                'hAlign' => 'center',
                'vAlign' => 'top',
                'header' => 'No'],

                <?php
                $count = 0;
                if (($tableSchema = $generator->getTableSchema()) === false) {
                    foreach ($generator->getColumnNames() as $name) {
                        if (++$count < 6) {
                            echo "            '" . $name . "',\n";
                        } else {
                            echo "            //'" . $name . "',\n";
                        }
                    }
                } else {
                    foreach ($tableSchema->columns as $column) {
                        $format = $generator->generateColumnFormat($column);
                        if (++$count < 6) {
                            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                        } else {
                            echo "            //'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                        }
                    }
                }
                ?>

                ['class' => 'kartik\grid\ActionColumn',
                'header' => "Menu",
                'hAlign' => 'center',
                'vAlign' => 'top',
                'width' => '135px',
                'template' => '
                <button class="btn-outline-warning btn-round">{view}</button>
                <button class="btn-outline-primary btn-round">{update}</button>
                <button class="btn-outline-danger btn-round">{delete}</button>',
                'buttons' => [
                'view' => function ($url, $model, $key) {
                return Html::a('', $url, ['title' => 'Tampilkan',
                'class' => 'fa fa-eye']);
                },
                'update' => function ($url, $model, $key) {
                return Html::a('', $url, ['title' => 'Ubah',
                'class' => 'fa fa-pencil-square-o']);
                },
                'delete' => function ($url, $model, $key) {
                return Html::a('', $url, ['title' => 'Hapus',
                'class' => 'fa fa-trash',
                'data' => [
                'confirm' => <?= $generator->generateString('Apakah anda yakin akan menghapus data ini?') ?>,
                'method' => 'post']
                ]);
                }
                ]
                ], // ActionColumn


                ],
                ]); ?>


            <?php else: ?>
                <?= "<?= " ?>ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                },
                ]) ?>
            <?php endif; ?>

            <?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>
        </div>
    </div>
</div>
