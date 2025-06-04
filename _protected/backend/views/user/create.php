<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $role common\rbac\models\Role */

$this->title = Yii::t('app', 'Buat Pengguna');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="card">

        <div class="card-header page-title">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

        <?= $this->render('_form', [
            'user' => $user,
            'role' => $role,
        ]) ?>
    </div>
</div>

