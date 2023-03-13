<?php

use app\models\Masterpetugas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\MasterpetugasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterpetugas-index">

    <p>
        <?= Html::a('Tambah Data Petugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_petugas',
            [
                'header' => 'Nama Petugas',
                'attribute' => 'nama_petugas',
                'value' => function($model) {
                    return $model->nama_petugas;
                }
            ],
            [
                'header' => 'Jenis Kelamin',
                'attribute' => 'jenis_kelamin',
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
                'header' => 'Alamat Petugas',
                'attribute' => 'alamat_petugas',
                'value' => function($model) {
                    return $model->alamat_petugas;
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
                'urlCreator' => function ($action, Masterpetugas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_petugas' => $model->id_petugas]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
