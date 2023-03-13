<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var app\models\Masterpembayaran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="masterpembayaran-form">
<div class="card card-primary">
        <div class="card-header">
            <h3>Data Pembayaran</h3>
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
                    <?= $form->field($model, 'no_rekam_medis')->dropDownList(
                        ArrayHelper::map(\app\models\TrRekamMedis::find()->all(), 'no_rekam_medis', 'jenis_layanan'),
                        ['prompt' => 'Pilih Layanan....']
                    ) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <?= $form->field($model, 'id_petugas')->dropDownList(
                        ArrayHelper::map(\app\models\MasterPetugas::find()->all(), 'id_petugas', 'nama_petugas'),
                        ['prompt' => 'Pilih Nama Petugas....']
                    ) ?>
                </div>
                <div class="col-md-6">
                <?= $form->field($model, 'jenis_pembayaran')->widget(Select2::classname(), [
                       'name' => 'Jenis Pembayaran',
                       'hideSearch' => true,
                       'data' => ['BNI Life' => 'BNI Life', 'BPJS' => 'BPJS', 
                       'Mandiri InHealth' => 'Mandiri InHealth', 'Umum' => 'Umum'],
                       'options' => ['placeholder' => 'Pilih Jenis Pembayaran...'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
                    ]); ?>
                </div>
            </div>
            <?= $form->field($model, 'harga')->textInput([
                        'placeholder' => 'Harga',
                        'maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <!-- /.card-body -->
        <?php ActiveForm::end(); ?>
    </div>


</div>
