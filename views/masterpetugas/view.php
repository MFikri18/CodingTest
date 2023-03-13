<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Masterpetugas $model */

$this->title = $model->nama_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="masterpetugas-view">

    <p>
        <?= Html::a('Update', ['update', 'id_petugas' => $model->id_petugas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_petugas' => $model->id_petugas], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah kamu yakin ingin menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_petugas',
            'nama_petugas',
            'jenis_kelamin',
            'alamat_petugas',
            'tempat_lahir',
            'tanggal_lahir',
        ],
    ]) ?>

</div>
