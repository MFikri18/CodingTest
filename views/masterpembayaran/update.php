<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Masterpembayaran $model */

$this->title = 'Update Masterpembayaran: ' . $model->id_pembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Masterpembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembayaran, 'url' => ['view', 'id_pembayaran' => $model->id_pembayaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterpembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
