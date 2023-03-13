<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_rekam_medis".
 *
 * @property int $no_rekam_medis
 * @property int $id_pasien
 * @property string $tanggal_pelayanan
 * @property int $jenis_layanan
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 *
 * @property MasterPembayaran[] $masterPembayarans
 * @property TrPasien $pasien
 */
class TrRekamMedis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tr_rekam_medis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'tanggal_pelayanan', 'jenis_layanan', 'waktu_mulai', 'waktu_selesai'], 'required'],
            [['id_pasien'], 'integer'],
            [['tanggal_pelayanan', 'waktu_mulai', 'waktu_selesai'], 'safe'],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TrPasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_rekam_medis' => 'No Rekam Medis',
            'id_pasien' => 'Nama Pasien',
            'jenis_layanan' => 'Jenis Layanan',
            'tanggal_pelayanan' => 'Tanggal Pelayanan',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
        ];
    }

    /**
     * Gets query for [[MasterPembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasterPembayarans()
    {
        return $this->hasMany(MasterPembayaran::class, ['no_rekam_medis' => 'no_rekam_medis']);
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
