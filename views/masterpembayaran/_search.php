<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MasterpembayaranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="masterpembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pembayaran') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'no_rekam_medis') ?>

    <?= $form->field($model, 'id_petugas') ?>

    <?= $form->field($model, 'jenis_pembayaran') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
