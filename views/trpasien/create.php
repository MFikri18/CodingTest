<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trpasien $model */

$this->title = 'Tambah Data Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Data Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trpasien-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
