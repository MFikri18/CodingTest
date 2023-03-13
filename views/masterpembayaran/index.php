<?php

use app\models\Masterpembayaran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\MasterpembayaranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterpembayaran-index">

    <p>
        <?= Html::a('Tambah Data Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export to PDF', Url::to(['pdf']), ['class' => 'btn btn-danger']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Nama Pasien',
                'attribute' => 'nama_pasien',
                'value' => function($model) {
                    return $model->pasien->nama_pasien;
                }
            ],
            [
                'header' => 'Jenis Layanan',
                'attribute' => 'jenis_layanan',
                'value' => function($model) {
                    return $model->noRekamMedis->jenis_layanan;
                }
            ],
            [
                'header' => 'Nama Petugas',
                'attribute' => 'nama_petugas',
                'value' => function($model) {
                    return $model->petugas->nama_petugas;
                }
            ],
            [
                'header' => 'Jenis Pembayaran',
                'attribute' => 'jenis_pembayaran',
                'headerOptions' =>  ['style' => 'width:200px'],
                'filter' => Html::activeDropDownList($searchModel, 'jenis_pembayaran', 
                ['BNI Life' => 'BNI Life', 'BPJS' => 'BPJS',
                 'Mandiri InHealth' => 'Mandiri InHealth', 'Umum' => 'Umum'],
                ['class' => 'form-control', 'prompt' => 'Semua']),
                'value' => function($model) {
                    return $model->jenis_pembayaran;
                }
            ],
            [
                'header' => 'Harga',
                'attribute' => 'harga',
                'value' => function($model) {
                    return $model->harga;
                }
            ],
            //'id_pembayaran',
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['style' => 'width:100px'],
                'urlCreator' => function ($action, Masterpembayaran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pembayaran' => $model->id_pembayaran]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
