<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Masterpetugas $model */

$this->title = 'Update Data Petugas: ' . $model->nama_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_petugas, 'url' => ['view', 'id_petugas' => $model->id_petugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterpetugas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
