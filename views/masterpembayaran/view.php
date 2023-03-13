<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Masterpembayaran $model */

$this->title = $model->pasien->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Data Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="masterpembayaran-view">

    <p>
        <?= Html::a('Update', ['update', 'id_pembayaran' => $model->id_pembayaran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pembayaran' => $model->id_pembayaran], [
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
            'id_pembayaran',
            'pasien.nama_pasien',
            'noRekamMedis.jenis_layanan',
            'petugas.nama_petugas',
            'jenis_pembayaran',
            'harga',
        ],
    ]) ?>

</div>
