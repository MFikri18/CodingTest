<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Trrekammedis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trrekammedis-form">
    <div class="card card-primary">
        <div class="card-header">
            <h3>Data Rekam Medis</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'id_pasien')->dropDownList(
                        ArrayHelper::map(\app\models\TrPasien::find()->all(), 'id_pasien', 'nama_pasien'),
                        ['prompt' => 'Pilih Nama Pasien....']
                    ) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'tanggal_pelayanan')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Pilih Tanggal Pelayanan...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'jenis_layanan')->widget(Select2::classname(), [
                        'name' => 'Jenis Layanan',
                        'hideSearch' => true,
                        'data' => ['Kelas 1' => 'Kelas 1','Kelas 2' => 'Kelas 2',
                        'Poliknik Dbgyn' => 'Poliknik Dbgyn','Poliknik Gigi' => 'Poliknik Gigi',
                        'Poliknik Mata' => 'Poliknik Mata','Poliknik Umum' => 'Poliknik Umum', 
                        'UGD' => 'UGD',
                        ],
                        'options' => ['placeholder' => 'Pilih Jenis Layanan...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'waktu_mulai')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Pilih Waktu Mulai...'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd H:i:s'
                            ]
                        ]); ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'waktu_selesai')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Pilih Waktu selesai...'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd H:i:s'
                            ]
                        ]); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

            </div>
            <!-- /.card-body -->
            <?php ActiveForm::end(); ?>
        </div>

    </div>