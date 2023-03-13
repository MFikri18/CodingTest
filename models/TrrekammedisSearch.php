<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trrekammedis;

/**
 * TrrekammedisSearch represents the model behind the search form of `app\models\Trrekammedis`.
 */
class TrrekammedisSearch extends Trrekammedis
{
    public $nama_pasien;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medis', 'id_pasien'], 'integer'],
            [['tanggal_pelayanan', 'jenis_layanan', 'waktu_mulai', 'waktu_selesai', 'nama_pasien'], 'safe'],
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
        $query = Trrekammedis::find();
        $query->innerJoin('tr_pasien', 'tr_rekam_medis.id_pasien = tr_pasien.id_pasien');

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
            'no_rekam_medis' => $this->no_rekam_medis,
            'id_pasien' => $this->id_pasien,
            'jenis_layanan' => $this->jenis_layanan,
            'tanggal_pelayanan' => $this->tanggal_pelayanan,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
        ]);

        $query->andFilterWhere(['like', 'tr_pasien.nama_pasien', $this->nama_pasien]);

        return $dataProvider;
    }
}
