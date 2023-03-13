<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trrekammedis $model */

$this->title = 'Tambah Data Rekam Medis';
$this->params['breadcrumbs'][] = ['label' => 'Data Rekam Medis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trrekammedis-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
