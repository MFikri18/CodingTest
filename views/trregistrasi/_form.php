<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;


/** @var yii\web\View $this */
/** @var app\models\Trregistrasi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trregistrasi-form">
    <div class="card card-primary">
        <div class="card-header">
            <h3>Data Registrasi</h3>
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
                    <?php //$form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) 
                    ?>
                    <?= $form->field($model, 'waktu_registrasi')->widget(DateTimePicker::classname(), [
                        'options' => ['placeholder' => 'Pilih Waktu Registrasi...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd H:i:s'
                        ]
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'jenis_registrasi')->widget(Select2::classname(), [
                        'name' => 'Jenis Registrasi',
                        'hideSearch' => true,
                        'data' => ['UGD' => 'UGD', 'Rawat Jalan' => 'Rawat Jalan', 'Rawat Inap' => 'Rawat Inap'],
                        'options' => ['placeholder' => 'Pilih Jenis Registrasi...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'status')->widget(Select2::classname(), [
                        'name' => 'Status Registrasi',
                        'hideSearch' => true,
                        'data' => ['Aktif' => 'Aktif', 'Tutup Kunjungan' => 'Tutup Kunjungan'],
                        'options' => ['placeholder' => 'Pilih Status..'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

                </div>
                <?php ActiveForm::end(); ?>

        </div>
</div>