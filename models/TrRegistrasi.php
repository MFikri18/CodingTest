<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_registrasi".
 *
 * @property int $no_registrasi
 * @property int $id_pasien
 * @property string $waktu_registrasi
 * @property string $jenis_registrasi
 * @property string $status
 *
 * @property TrPasien $pasien
 */
class TrRegistrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tr_registrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'waktu_registrasi', 'jenis_registrasi', 'status'], 'required'],
            [['id_pasien'], 'integer'],
            [['waktu_registrasi'], 'safe'],
            [['jenis_registrasi', 'status'], 'string', 'max' => 100],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TrPasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_registrasi' => 'No Registrasi',
            'id_pasien' => 'Nama Pasien',
            'waktu_registrasi' => 'Waktu Registrasi',
            'jenis_registrasi' => 'Jenis Registrasi',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(TrPasien::class, ['id_pasien' => 'id_pasien']);
    }
}
