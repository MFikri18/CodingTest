<?php

use app\models\Trpasien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TrpasienSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trpasien-index">

    <p>
        <?= Html::a('Tambah Data Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_pasien',
            [
                'header' => 'Nama Pasien',
                'attribute' => 'nama_pasien',
                'value' => function($model) {
                    return $model->nama_pasien;
                },
               
            ],
            [
                'header' => 'Jenis Kelamin',
                'headerOptions' =>  ['style' => 'width:150px'],
                'attribute' => 'jenis_kelamin',
                'filter' => Html::activeDropDownList($searchModel, 'jenis_kelamin', 
                ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], 
                ['class' => 'form-control', 'prompt' => 'Semua']),
                'value' => function($model) {
                    return $model->jenis_kelamin;
                }
            ],
            [
                'header' => 'Alamat Pasien',
                'attribute' => 'alamat_pasien',
                'value' => function($model) {
                    return $model->alamat_pasien;
                }
            ],
            [
                'header' => 'Tempat Lahir',
                'attribute' => 'tempat_lahir',
                'value' => function($model) {
                    return $model->tempat_lahir;
                }
            ],
            [
                'header' => 'Tanggal Lahir',
                'attribute' => 'tanggal_lahir',
                'value' => function($model) {
                    return date("d-m-Y", strtotime($model->tanggal_lahir));
                }
            ],
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['style' => 'width:100px'],
                'urlCreator' => function ($action, Trpasien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pasien' => $model->id_pasien]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
