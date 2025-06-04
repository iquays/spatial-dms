<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
use kartik\widgets\SwitchInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Opd */
/* @var $form yii\widgets\ActiveForm */


$this->beginBlock('modalContainer');
Modal::begin([
    'id' => 'urusanModal',
    'title' => 'Tambah Urusan',
    'size' => 'modal-lg',
    'options' => [
        'class' => 'dark_bg fade',
    ],
    'footer' => null,
]);

echo '<div id="urusanModalContent" class="card"></div>';

Modal::end();
$this->endBlock();

?>

<div class="card-body opd-form">

    <?php $form = ActiveForm::begin(['id' => 'Opd']); ?>

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
            <h5 class="card-title text-warning">Daftar Urusan untuk OPD ini:
                <span class="">
                    <?= Html::button('<i class="fa fa-plus"></i> Tambah Urusan', [
                        'id' => 'addUrusanButton',
                        'value' => Url::to(Yii::$app->homeUrl . 'urusan/picker'),
                        'class' => 'btn btn-outline-info btn-round',
                        'onclick' => 'showUrusanModal()'
                    ]); ?>

            </span>
            </h5>

        </div>
        <div class="card-body">
            <div id="urusan-list-container" class="table-responsive table-sm">
                <table class="table table-borderless text-white-50" id="opd-list">
                    <tr>
                        <th class="col-xs-1" style='text-align: center'>No</th>
                        <th class="col-xs-9">Nama Urusan</th>
                        <th class="col-xs-2">Menu</th>
                    </tr>

                    <?php
                    if (count($model->urusanOpds) > 0) {
                        foreach ($model->urusanOpds as $i => $urusanOpd) {
                            echo "<tr><td class='col-xs-1' style='text-align: center'></td><td class='col-xs-9'>" . Html::encode($urusanOpd->urusan->nama) . "</td><td class='col-xs-2'>" .
                                Html::button('<i class="fa fa-trash"></i> Hapus', [
                                    'class' => 'btn-outline-danger btn-sm',
                                    'onclick' => '$(this).closest("tr").remove()'
                                ]) . "</td>" .
                                Html::hiddenInput('Opd[urusans][]', $urusanOpd->urusan_id) . "</tr>";
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

    var urusanCounter = 1;

    function showUrusanModal() {
        $("#urusanModal").modal("show");
        if (urusanCounter === 1) {
            $("#urusanModalContent").load($("#addUrusanButton").attr("value"));
        }
        urusanCounter++;
    }


</script>
