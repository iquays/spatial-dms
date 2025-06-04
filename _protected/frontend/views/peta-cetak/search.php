<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PetaCetakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $keyword string */

$this->title = 'Hasil pencarian untuk kata kunci "' . $keyword . '""';
\yii\web\YiiAsset::register($this);
?>
<div class="peta-cetak-search">

    <div class="card">
        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?>

            </h3>
        </div>

        <div class="card-body status-info">
            <div id="opd-list-container" class="table-responsive table-sm">
                <div class="col-sm-16 ">
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <div class="list-unstyled search-list">
                                <?php
                                $petaCetaks = $dataProvider->models;
                                if (count($petaCetaks) > 0) {
                                ?>
                                <?php foreach ($petaCetaks

                                as $petaCetak): ?>
                                <a href="<?= Url::to(['peta-cetak/view', 'id' => $petaCetak->id]) ?>"
                                   class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1"><?= $petaCetak->nama ?></h6>

                                        <p class="description"><?= $petaCetak->deskripsi ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php
                                    } else {
                                        echo "Maaf, belum ada peta cetak untuk urusan ini";
                                    }
                                    ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
