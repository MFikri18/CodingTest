<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Trpasien $model */

$this->title = $model->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Data Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trpasien-view">

    <p>
        <?= Html::a('Update', ['update', 'id_pasien' => $model->id_pasien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pasien' => $model->id_pasien], [
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
            'id_pasien',
            'nama_pasien',
            'jenis_kelamin',
            'alamat_pasien',
            'tempat_lahir',
            'tanggal_lahir',
        ],
    ]) ?>

</div>
