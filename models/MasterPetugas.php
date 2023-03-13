<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_petugas".
 *
 * @property int $id_petugas
 * @property string $nama_petugas
 * @property string $jenis_kelamin
 * @property string $alamat_petugas
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 *
 * @property MasterPembayaran[] $masterPembayarans
 */
class MasterPetugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_petugas', 'jenis_kelamin', 'alamat_petugas', 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nama_petugas'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 20],
            [['alamat_petugas', 'tempat_lahir'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_petugas' => 'Id Petugas',
            'nama_petugas' => 'Nama Petugas',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat_petugas' => 'Alamat Petugas',
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
        return $this->hasMany(MasterPembayaran::class, ['id_petugas' => 'id_petugas']);
    }
}
