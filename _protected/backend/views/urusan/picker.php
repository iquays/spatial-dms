<?php

use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>


<div class="urusan-picker card-body">

    <?php
    echo GridView::widget([
        'id' => 'searchUrusanGrid',
        'bordered' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'tableOptions' => [
            'class' => 'text-white-50',
        ],
//        'panel' => [
//            'type' => GridView::TYPE_ACTIVE,
//            'footer' => false,
//            'after' => false,
//        ],
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
            'linkContainerOptions' => [
                'class' => 'page-item',
            ],
            'linkOptions' => [
                'class' => 'page-link btn-round',
            ]
        ],
        'toolbar' => false,
        'pjax' => true,
        'pjaxSettings' => [
            'options' => [
                'id' => 'pjaxUrusan',
                'timeout' => 9999999,
                'enablePushState' => false,
                'clientOptions' => ['method' => 'POST'],
            ],
        ],
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'header' => 'No',
                'vAlign' => 'top'
            ],
            'nama',
            // buttons
            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'Menu',
                'vAlign' => 'top',
                'template' => '<small>{add}</small>',
                'buttons' => [
                    'add' => function ($url, $model) {
                        return Html::button('<i class="fa fa-plus"></i>  Tambah',
                            [
                                'class' => 'btn btn-outline-success btn-round btn-sm text-white-50',
                                'onclick' => 'addUrusanButtonClick("' . $model->nama . '","' .
                                    $model->id . '")'
                            ]);
                    }
                ]
            ]
        ], // columns
    ]);
    ?>

</div>
<script>
    function addUrusanButtonClick(nama, id) {
        modelName = $("form").attr('id');
        inputName = modelName + "[urusans][]";
        $("#urusanModal").modal("hide");
        $("#opd-list>tbody:last").append("<tr><td style='text-align: center'></td><td>" + nama +
            "</td><td><button type='button' onclick='$(this).closest(\"tr\").remove()' class='btn-sm btn-outline-danger'><i class='fa fa-trash'></i>  Hapus </button></td>" +
            "<input type='hidden' name='" + inputName + "' value='" + id + "'></input></tr>"
        );
    }

</script>