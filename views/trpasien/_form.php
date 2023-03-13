<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Trpasien $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="trpasien-form">
    <div class="card card-primary">
        <div class="card-header">
            <h3>Data Pasien</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <?= $form->field($model, 'nama_pasien')->textInput([
                        'placeholder' => 'Nama Pasien',
                        'maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?php //$form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) 
                    ?>
                    <?= $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
                       'name' => 'Jenis Kelamin',
                       'hideSearch' => true,
                       'data' => ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'],
                       'options' => ['placeholder' => 'Pilih Jenis Kelamin...'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'alamat_pasien')->textInput([
                        'placeholder' => 'Alamat Pasien',
                        'maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'tempat_lahir')->textInput([
                        'placeholder' => 'Tempat Lahir',
                        'maxlength' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Pilih Tanggal Lahir...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <!-- /.card-body -->
        <?php ActiveForm::end(); ?>
    </div>




</div>