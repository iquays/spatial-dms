<?php

/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="row  align-items-center justify-content-between">
        <div class="col-11 col-sm-12 page-title">
            <h2>Dashboard</h2>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-4">
            <div class="activity-block success">
                <div class="media">
                    <div class="media-body">
                        <h5><span class="spincreament"><?= Yii::$app->frontendUserCounter->getTotal() ?></span></h5>
                        <p>Total Pengunjung</p>
                    </div>
                    <i class="fa fa-users"></i>
                </div>
                <br>
                <div class="media">
                    <!--                                    <div class="media-body"><span class="progress-heading">Monthly progress</span></div>-->
                    <span><span class="dynamicsparkline">Loading..</span> </span>
                </div>
                <div class="row">
                    <div class="progress ">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                             aria-valuemax="100" style="width: 70%;"><span class="trackerball"></span></div>
                    </div>
                </div>
                <i class="bg-icon text-center fa fa-users"></i></div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-4">
            <div class="activity-block danger">
                <div class="media">
                    <div class="media-body">
                        <h5><span class="spincreament"><?= Yii::$app->frontendUserCounter->getOnline() ?></span></h5>
                        <p>Pengunjung Sedang Online</p>
                    </div>
                    <i class="fa fa-users"></i></div>
                <br>
                <div class="media">
                    <!--                                    <div class="media-body"><span class="progress-heading">Monthly progress</span></div>-->
                    <span><span class="dynamicsparkline">Loading..</span> </span>
                </div>
                <div class="row">
                    <div class="progress ">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                             aria-valuemax="100" style="width: 60%;"><span class="trackerball"></span></div>
                    </div>
                </div>
                <i class="bg-icon text-center fa fa-users"></i></div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-4">
            <div class="activity-block warning">
                <div class="media">
                    <div class="media-body">
                        <h5><span class="spincreament">2548</span></h5>
                        <p>Peta Spasial</p>
                    </div>
                    <i class="fa fa-cart-arrow-down"></i></div>
                <br>
                <div class="media">
                    <div class="media-body"><span class="progress-heading">Monthly progress</span></div>
                    <span><span class="dynamicsparkline">Loading..</span> </span>
                </div>
                <div class="row">
                    <div class="progress ">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                             aria-valuemax="100" style="width: 45%;"><span class="trackerball"></span></div>
                    </div>
                </div>
                <i class="bg-icon text-center fa fa-cart-arrow-down"></i></div>
        </div>
        <div class="col-md-8 col-lg-8 col-xl-4">
            <div class="activity-block primary">
                <div class="media">
                    <div class="media-body">
                        <h5><span class="spincreament">1548</span></h5>
                        <p>Total Peta Cetak</p>
                    </div>
                    <i class="fa fa-comments"></i></div>
                <br>
                <div class="media">
                    <div class="media-body"><span class="progress-heading">Monthly progress</span></div>
                    <span><span class="dynamicsparkline">Loading..</span> </span>
                </div>
                <div class="row">
                    <div class="progress ">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                             aria-valuemax="100" style="width: 80%;"><span class="trackerball"></span></div>
                    </div>
                </div>
                <i class="bg-icon text-center fa fa-comments"></i></div>
        </div>
    </div>


</div>

