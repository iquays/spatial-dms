<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PetaCetakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peta Cetak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peta-cetak-index container-fluid">
    <div class="card ">
        <div class="card-header page-title">
            <h3>Daftar Peta Cetak
                <span class="pull-right">
<!--                    <form id="w0" action="/spatu/peta-cetak/search" method="get" data-pjax=""-->
                    <!--                          class="form-inline ml-2  pull-left search-header">-->
                    <?php
                    $form = ActiveForm::begin([
                        'action' => ['search'],
                        'method' => 'get',
                        'options' => ['data-pjax' => true, 'class' => "form-inline ml-2  pull-left search-header"]]);
                    ?>
                  <input id="petacetaksearch-nama" name="PetaCetakSearch[nama]" class="form-control dark-input"
                         type="text"
                         placeholder="Cari Peta Cetak">
                  <button class="btn btn-outline-info " type="submit"><a
                              class="fa fa-search fa-2x"></a></button>
                    <?php
                    ActiveForm::end();
                    ?> 
<!--                    </form>-->
                </span>
            </h3>
        </div>
        <div class="card-body">
            <div class="list-unstyled member-list row">
                <?php $i = 1; ?>
                <?php foreach ($urusans as $urusan): ?>
                    <?php
                    switch ($i++) {
                        case 1:
                            $bg_color = 'bg-primary';
                            break;
                        case 2:
                            $bg_color = 'bg-secondary';
                            break;
                        case 3:
                            $bg_color = 'bg-info';
                            break;
                        case 4:
                            $bg_color = 'bg-success';
                            break;
                        default:
                            $bg_color = 'bg-danger';
                            break;
                    }
                    if ($i == 6) {
                        $i = 1;
                    };
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-16 ">
                        <div class="media flex-column <?= $bg_color ?> text-white "><span class="message_userpic"><i
                                        class="fa fa-map-o"></i></span>
                            <div class="">
                                <h6><?= $urusan->nama ?></h6>
                                <button type="button" class=" btn-outline-warning btn-round">
                                    <?= Html::a('<i class="fa fa-search"></i> ' . $urusan->jumlahPetaCetak . ' dokumen',
                                        ['urusan', 'id' => $urusan->id], ['class' => 'btn-outline-warning']); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


</div>
