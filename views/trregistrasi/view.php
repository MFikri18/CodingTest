<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Trregistrasi $model */

$this->title = $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Trregistrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trregistrasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'no_registrasi' => $model->no_registrasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'no_registrasi' => $model->no_registrasi], [
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
            'no_registrasi',
            'id_pasien',
            'waktu_registrasi',
            'jenis_registrasi',
            'status',
        ],
    ]) ?>

</div>
