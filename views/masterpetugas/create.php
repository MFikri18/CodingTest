<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Masterpetugas $model */

$this->title = 'Tambah Data Petugas';
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterpetugas-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
