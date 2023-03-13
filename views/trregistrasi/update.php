<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trregistrasi $model */

$this->title = 'Update Data Registrasi: ' . $model->pasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Data Registrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pasien->nama_pasien, 'url' => ['view', 'no_registrasi' => $model->no_registrasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trregistrasi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
