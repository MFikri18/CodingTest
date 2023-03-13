<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Masterpembayaran $model */

$this->title = 'Tambah Data Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterpembayaran-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
