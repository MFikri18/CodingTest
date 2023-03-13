<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trregistrasi $model */

$this->title = 'Tambah Data Registrasi';
$this->params['breadcrumbs'][] = ['label' => 'Data Registrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trregistrasi-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
