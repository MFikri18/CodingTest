<?php

use app\models\Trregistrasi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TrregistrasiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trregistrasi-index">

    <p>
        <?= Html::a('Tambah Data Registrasi', ['create'], ['class' => 'btn btn-success']) ?>
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
                'header' => 'Waktu Registrasi',
                'attribute' => 'waktu_registrasi',
                'value' => function($model) {
                    return date("d-m-Y H:i:s", strtotime($model->waktu_registrasi));
                }
            ],
            [
                'header' => 'Jenis Registrasi',
                'attribute' => 'jenis_registrasi',
                'filter' => Html::activeDropDownList($searchModel, 'jenis_registrasi', 
                ['UGD' => 'UGD', 'Rawat Jalan' => 'Rawat Jalan', 'Rawat Inap' => 'Rawat Inap'],
                ['class' => 'form-control', 'prompt' => 'Semua']),
                'value' => function($model) {
                    return $model->jenis_registrasi;
                }
                
            ],
            [
                'header' => 'Status',
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', 
                ['Aktif' => 'Aktif', 'Tutup Kunjungan' => 'Tutup Kunjungan'],
                ['class' => 'form-control', 'prompt' => 'Semua']),
                'value' => function($model) {
                    return $model->status;
                }
            ],
            
            //'no_registrasi',
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['style' => 'width:100px'],
                'urlCreator' => function ($action, Trregistrasi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'no_registrasi' => $model->no_registrasi]);
                 }
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>
