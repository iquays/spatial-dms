<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', Yii::$app->name);
?>
<!--<div class="site-index">-->
<style>
    .row-flex {
        display: flex;
        flex-wrap: wrap;
    }


    .myContent {
        height: 100%;
    }

</style>
<div class="body-content container-fluid">
    <div class="container-fluid pt-3">
        <div class="row row-flex">
            <div class="col-md-12 col-lg-6">
                <div class="col-md-16 myContent serviceblock col-lg mt-2 mb-2">
                    <div class="block carousel slide" data-ride="carousel" id="fitur">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#fitur" data-slide-to="0" class="active"></li>
                            <li data-target="#fitur" data-slide-to="1"></li>
                            <li data-target="#fitur" data-slide-to="2"></li>
                            <li data-target="#fitur" data-slide-to="3"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="img carousel-item active">
                                <img class="img-thumbnail" src="../uploads/peta.png" alt="Peta Interaktif">
                                <div class="carousel-caption">
                                    <h3>Peta Interaktif</h3>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="img-thumbnail" src="../uploads/peta-cetak.png" alt="Peta Cetak">
                                <div class="carousel-caption">
                                    <h3>Peta Cetak</h3>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="img-thumbnail" src="../uploads/layanan.png" alt="Layanan Peta">
                                <div class="carousel-caption">
                                    <h3>Layanan Permintaan Peta</h3>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="img-thumbnail" src="../uploads/login.png" alt="Admin Login">
                                <div class="carousel-caption">
                                    <h3>Admin Login</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="col-md-16 myContent serviceblock col-lg mt-2 mb-2">
                    <div class="block">
                        <h4>Sistem Informasi Pengelolaan Data Spasial</h4>
                        <h2 class="">SI-KEDAI SPATU</h2>
                        <br>
                        <p class="lead">Sistem Informasi Pengelolaan Data dan Informasi berbasis Spasial Tuban (SI-KEDAI
                            SPATU) merupakan wadah pengelolaan, penyimpanan, pengumpulan, dan
                            pemanfaatan data berbasis spasial yang dikelola dalam sebuah teknologi informasi. Data dan
                            Informasi berbasis spasial ini nantinya akan dijadikan dasar
                            sebagai pengambilan kebijakan dan perumusan dalam penyusunan arah kebijakan pembangunan.
                            Selain itu SI-KEDAI SPATU ini dimaksudkan untuk melakukan pemantauan dan evaluasi terhadap
                            capaian
                            kinerja program dan kegiatan.</p>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--</div>-->

