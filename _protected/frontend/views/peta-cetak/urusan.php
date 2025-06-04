<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $urusan common\models\Urusan */

$this->title = 'Daftar Peta Cetak untuk Urusan: ' . $urusan->nama;
\yii\web\YiiAsset::register($this);
?>
<style>
    #page-container {
        position: relative;
        min-height: 100vh;
    }

    #content {
        padding-bottom: 19.3rem; /* Footer height */
    }

    #my-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /*height: 2.5rem; !* Footer height *!*/
    }

</style>
<div class="peta-cetak-urusan">

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
                                if ($urusan->jumlahPetaCetak > 0) {
                                foreach ($urusan->urusanOpds as $urusanOpd) {
                                foreach ($urusanOpd->opd->petaCetaks as $petaCetak): ?>
                                <a href="<?= Url::to(['peta-cetak/view', 'id' => $petaCetak->id]) ?>"
                                   class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1"><?= $petaCetak->nama ?></h6>

                                        <p class="description"><?= $petaCetak->deskripsi ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php
                                    }
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
