<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_pasien".
 *
 * @property int $id_pasien
 * @property string $nama_pasien
 * @property string $jenis_kelamin
 * @property string $alamat_pasien
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 *
 * @property MasterPembayaran[] $masterPembayarans
 * @property TrRegistrasi[] $trRegistrasis
 * @property TrRekamMedis[] $trRekamMedis
 */
class TrPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tr_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'jenis_kelamin', 'alamat_pasien', 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nama_pasien'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 20],
            [['alamat_pasien', 'tempat_lahir'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat_pasien' => 'Alamat Pasien',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }

    /**
     * Gets query for [[MasterPembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasterPembayarans()
    {
        return $this->hasMany(MasterPembayaran::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[TrRegistrasis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrRegistrasis()
    {
        return $this->hasMany(TrRegistrasi::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[TrRekamMedis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrRekamMedis()
    {
        return $this->hasMany(TrRekamMedis::class, ['id_pasien' => 'id_pasien']);
    }
}
