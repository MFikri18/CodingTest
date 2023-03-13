<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TrpasienSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trpasien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php //$form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'nama_pasien') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'alamat_pasien') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
