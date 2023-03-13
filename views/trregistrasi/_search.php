<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TrregistrasiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trregistrasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'no_registrasi') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'waktu_registrasi') ?>

    <?= $form->field($model, 'jenis_registrasi') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
