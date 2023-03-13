<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Masterpembayaran;

/**
 * MasterpembayaranSearch represents the model behind the search form of `app\models\Masterpembayaran`.
 */
class MasterpembayaranSearch extends Masterpembayaran
{
    public $nama_pasien;
    public $nama_petugas;
    public $jenis_layanan;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembayaran', 'id_pasien', 'no_rekam_medis', 'id_petugas', 'harga'], 'integer'],
            [['jenis_pembayaran', 'nama_pasien', 'nama_petugas', 'jenis_layanan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Masterpembayaran::find();
        $query->innerJoin('tr_pasien', 'master_pembayaran.id_pasien = tr_pasien.id_pasien')
        ->innerJoin('tr_rekam_medis', 'master_pembayaran.no_rekam_medis = tr_rekam_medis.no_rekam_medis')
        ->innerJoin('master_petugas', 'master_pembayaran.id_petugas = master_petugas.id_petugas');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pembayaran' => $this->id_pembayaran,
            'id_pasien' => $this->id_pasien,
            'no_rekam_medis' => $this->no_rekam_medis,
            'id_petugas' => $this->id_petugas,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'jenis_pembayaran', $this->jenis_pembayaran])
        ->andFilterWhere(['like', 'tr_pasien.nama_pasien', $this->nama_pasien])
        ->andFilterWhere(['like', 'tr_petugas.nama_petugas', $this->nama_petugas])
        ->andFilterWhere(['like', 'no_rekam_medis.jenis_layanan', $this->jenis_layanan]);;
        

        return $dataProvider;
    }
}
