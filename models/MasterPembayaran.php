<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_pembayaran".
 *
 * @property int $id_pembayaran
 * @property int $id_pasien
 * @property int $no_rekam_medis
 * @property int $id_petugas
 * @property string $jenis_pembayaran
 * @property int $harga
 *
 * @property TrRekamMedis $noRekamMedis
 * @property TrPasien $pasien
 * @property MasterPetugas $petugas
 */
class MasterPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'no_rekam_medis', 'id_petugas', 'jenis_pembayaran', 'harga'], 'required'],
            [['id_pasien', 'no_rekam_medis', 'id_petugas', 'harga'], 'integer'],
            [['jenis_pembayaran'], 'string', 'max' => 255],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => TrPasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_petugas'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPetugas::class, 'targetAttribute' => ['id_petugas' => 'id_petugas']],
            [['no_rekam_medis'], 'exist', 'skipOnError' => true, 'targetClass' => TrRekamMedis::class, 'targetAttribute' => ['no_rekam_medis' => 'no_rekam_medis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'id_pasien' => 'Nama Pasien',
            'no_rekam_medis' => 'Jenis Layanan',
            'id_petugas' => 'Nama Petugas',
            'jenis_pembayaran' => 'Jenis Pembayaran',
            'harga' => 'Harga',
        ];
    }

    /**
     * Gets query for [[NoRekamMedis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoRekamMedis()
    {
        return $this->hasOne(TrRekamMedis::class, ['no_rekam_medis' => 'no_rekam_medis']);
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

    /**
     * Gets query for [[Petugas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasOne(MasterPetugas::class, ['id_petugas' => 'id_petugas']);
    }
}
