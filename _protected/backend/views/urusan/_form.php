<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Urusan */
/* @var $form yii\widgets\ActiveForm */

$this->beginBlock('modalContainer');
Modal::begin([
    'id' => 'opdModal',
    'title' => 'Tambah OPD',
    'size' => 'modal-lg',
    'options' => [
        'class' => 'dark_bg fade',
    ],
    'footer' => null,
]);

echo '<div id="opdModalContent" class="card"></div>';

Modal::end();
$this->endBlock();

?>
<div class="card-body urusan-form">

    <?php $form = ActiveForm::begin(['id' => 'Urusan']); ?>

    <?= $form->field($model, 'is_aktif')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText' => 'Aktif',
            'offText' => 'Tidak Aktif',
            'size' => 'small'
        ]
    ]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <div class="card status-warning" style="display: table-cell">
        <div class="card-header">
            <h5 class="card-title text-warning">Daftar OPD di Urusan ini:
                <span class="">
                    <?= Html::button('<i class="fa fa-plus"></i> Tambah OPD', [
                        'id' => 'addOpdButton',
                        'value' => Url::to(Yii::$app->homeUrl . 'opd/picker'),
                        'class' => 'btn btn-outline-info btn-round',
                        'onclick' => 'showOpdModal()'
                    ]); ?>

            </span>
            </h5>

        </div>
        <div class="card-body">
            <div id="opd-list-container" class="table-responsive table-sm">
                <table class="table table-borderless text-white-50" id="opd-list">
                    <tr>
                        <th class="col-xs-1" style='text-align: center'>No</th>
                        <th class="col-xs-9"> Nama</th>
                        <th class="col-xs-2">Menu</th>
                    </tr>

                    <?php
                    if (count($model->urusanOpds) > 0) {
                        foreach ($model->urusanOpds as $i => $urusanOpd) {
                            echo "<tr><td class='col-xs-1' style='text-align: center'></td><td class='col-xs-9'>" . Html::encode($urusanOpd->opd->nama) . "</td><td class='col-xs-2'>" .
                                Html::button('<i class="fa fa-trash"></i> Hapus', [
                                    'class' => 'btn-outline-danger btn-sm',
                                    'onclick' => '$(this).closest("tr").remove()'
                                ]) . "</td>" .
                                Html::hiddenInput('Urusan[opds][]', $urusanOpd->opd->id) . "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-footer form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-outline-success btn-round']) ?>
    <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn
    btn-outline-secondary btn-round']) ?>

</div>

<?php ActiveForm::end(); ?>


<script>

    var opdCounter = 1;

    function showOpdModal() {
        $("#opdModal").modal("show");
        if (opdCounter === 1) {
            $("#opdModalContent").load($("#addOpdButton").attr("value"));
        }
        opdCounter++;
    }


</script>
