<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trrekammedis $model */

$this->title = 'Update Data Rekam Medis: ' . $model->pasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Data Rekam Medis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pasien->nama_pasien, 'url' => ['view', 'no_rekam_medis' => $model->no_rekam_medis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trrekammedis-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
