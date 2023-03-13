<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trpasien $model */

$this->title = 'Update Data Pasien: ' . $model->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Data Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pasien, 'url' => ['view', 'id_pasien' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trpasien-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
