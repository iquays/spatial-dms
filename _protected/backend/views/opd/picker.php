<?php

use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\helpers\Html;

//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>


<div class="opd-picker card-body">

    <?php
    echo GridView::widget([
        'id' => 'searchOpdGrid',
        'bordered' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'tableOptions' => [
            'class' => 'text-white-50',
        ],
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
                'id' => 'pjaxOpd',
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
                'template' => '{add}',
                'buttons' => [
                    'add' => function ($url, $model) {
                        return Html::button('<i class="fa fa-plus"></i>  Tambah',
                            [
                                'class' => 'btn btn-outline-success btn-round btn-sm text-white-50',
                                'onclick' => 'addOpdButtonClick("' . $model->nama . '","' .
                                    $model->id . '")'
                            ]);
                    }
                ]
            ]
        ], // columns
    ]);
    ?>

    <!--    </div>-->
</div>

<script>
    function addOpdButtonClick(nama, id) {
        modelName = $("form").attr('id');
        inputName = modelName + "[opds][]";
        $("#opdModal").modal("hide");
        $("#opd-list>tbody:last").append("<tr><td style='text-align: center'></td><td>" + nama +
            "</td><td><button type='button' onclick='$(this).closest(\"tr\").remove()' class='btn-sm btn-outline-danger'><i class='fa fa-trash'></i>  Hapus </button></td>" +
            "<input type='hidden' name='" + inputName + "' value='" + id + "'></input></tr>"
        );
    }

</script>