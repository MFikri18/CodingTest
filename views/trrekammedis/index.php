<?php

use app\models\Trrekammedis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TrrekammedisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Rekam Medis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trrekammedis-index">

    <p>
        <?= Html::a('Tambah Data Rekam Medis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'no_rekam_medis',
            [
                'header' => 'Nama Pasien',
                'attribute' => 'nama_pasien',
                'value' => function($model) {
                    return $model->pasien->nama_pasien;
                }
            ],
            [
                'header' => 'Tanggal Pelayanan',
                'attribute' => 'tanggal_pelayanan',
                'value' => function($model) {
                    return date("d-m-Y", strtotime($model->tanggal_pelayanan));
                }
            ],
            [
                'header' => 'Jenis Layanan',
                'attribute' => 'jenis_layanan',
                'headerOptions' =>  ['style' => 'width:200px'],
                'filter' => Html::activeDropDownList($searchModel, 'jenis_layanan', 
                ['Kelas 1' => 'Kelas 1','Kelas 2' => 'Kelas 2',
                        'Poliknik Dbgyn' => 'Poliknik Dbgyn','Poliknik Gigi' => 'Poliknik Gigi',
                        'Poliknik Mata' => 'Poliknik Mata','Poliknik Umum' => 'Poliknik Umum', 
                        'UGD' => 'UGD'],
                        ['class' => 'form-control', 'prompt' => 'Semua']),
                'value' => function($model) {
                    return $model->jenis_layanan;
                }
            ],
            [
                'header' => 'Waktu Mulai',
                'attribute' => 'waktu_mulai',
                'value' => function($model) {
                    return date("d-m-Y H:i:s", strtotime($model->waktu_mulai));
                }
            ],
            [
                'header' => 'Waktu Selesai',
                'attribute' => 'waktu_selesai',
                'value' => function($model) {
                    return date("d-m-Y H:i:s", strtotime($model->waktu_selesai));
                }
            ],
            
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['style' => 'width:100px'],
                'urlCreator' => function ($action, Trrekammedis $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'no_rekam_medis' => $model->no_rekam_medis]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
