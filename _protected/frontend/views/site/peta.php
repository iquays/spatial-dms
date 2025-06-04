<?php

use yii\helpers\Url;
use frontend\assets\EsqiMapAsset;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\helpers\Html;

EsqiMapAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\PetaSearch */
/* @var $petaProvider yii\data\ActiveDataProvider */
/* @var $defaultPetas common\models\Peta */

$this->title = Yii::t('app', Yii::$app->name);


?>
<style>
    img.leaflet-tile {
        pointer-events: none;
    }
</style>
<div id="layer-sidebar" class="">
    <div class="card p-0 mt-0">
        <div class="card-header">
            <h5 class="pull-left">Layer Peta</h5>
            <button type="button" id="layer-sidebar-toggle"
                    class="pull-right btn btn-outline-danger"><i
                        class="fa fa-chevron-left fa-lg"></i></button>
            <a href="#" data-toggle="modal" data-target="#layerModal" id="layer-modal-toggle"
               class="pull-right btn btn-success" title="Tampilkan pilihan peta"><i
                        class="fa fa-plus fa-lg"></i></a>
        </div>
        <div class="card-body p-0">

            <div class="layer-list-container list-unstyled media-list">
                <?php foreach ($defaultPetas as $defaultPeta): ?>
                    <div class="pt-1 pb-1 media align-items-center">
                        <div class="col col-12 custom-control custom-checkbox media-body pr-0">
                            <input type="checkbox" value="<?= $defaultPeta->nama_tabel ?>"
                                   id="<?= $defaultPeta->nama_tabel ?>"
                                   data-peta_id="<?= $defaultPeta->id ?>"
                                   class="checkbox-layer custom-control-input">
                            <label for="<?= $defaultPeta->nama_tabel ?>" class="custom-control-label">
                                <?= $defaultPeta->nama ?>
                            </label>

                        </div>
                        <button class="pr-2 pl-2 pull-right fa fa-trash btn btn-outline-danger btn-sm btn-round remove-layer"
                                data-tablename="<?= $defaultPeta->nama_tabel ?>" title="Sembunyikan peta"></button>
                        <!--                        <button class="pr-2 pl-2 pull-right fa fa-arrows btn btn-info rearrange-layer"-->
                        <!--                                title="Rearrange Layer"></button>-->
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<div id="map">


</div>


<div class="modal" id="layerModal" tabindex="-1" role="dialog" aria-labelledby="layerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Layer Peta</h5>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close"></i>

                </button>
            </div>
            <div class="modal-body">
                <?= GridView::widget(['dataProvider' => $petaProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-hover table-sm table-bordered'],
                    'striped' => false,
                    'pjax' => true,
                    'pjaxSettings' => ['options' => ['enablePushState' => false,],],
                    'columns' => [
                        ['class' => 'yii\grid\ActionColumn',
                            'header' => 'Menu',
                            'contentOptions' => ['class' => 'text-center'],
                            'headerOptions' => ['class' => 'text-center'],
                            'template' => '{add_layer}',
                            'buttons' => [
                                'add_layer' => function ($url, $model, $key) {
                                    return Html::button('', [
                                        'value' => $model->nama_tabel,
                                        'name' => $model->nama,
                                        'data-peta_id' => $model->id,
                                        'title' => 'Tambahkan Peta',
                                        'class' => 'add-layer-modal-button fa fa-plus btn btn-sm btn-outline-success']);
                                },
                            ],
                        ],
                        'nama',//                        'nama_tabel',
                    ],]); ?>

            </div>
        </div>
    </div>
</div>

<script>
    const homeUrl = "<?= Url::to(Yii::$app->homeUrl) ?>";
</script>