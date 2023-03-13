<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Trrekammedis $model */

$this->title = $model->pasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Data Rekam Medis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trrekammedis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'no_rekam_medis' => $model->no_rekam_medis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'no_rekam_medis' => $model->no_rekam_medis], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_rekam_medis',
            'pasien.nama_pasien',
            'tanggal_pelayanan',
            'jenis_layanan',
            'waktu_mulai',
            'waktu_selesai',
        ],
    ]) ?>

</div>
