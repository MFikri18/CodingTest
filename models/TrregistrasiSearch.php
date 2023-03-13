<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trregistrasi;

/**
 * TrregistrasiSearch represents the model behind the search form of `app\models\Trregistrasi`.
 */
class TrregistrasiSearch extends Trregistrasi
{
    public $nama_pasien;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'id_pasien'], 'integer'],
            [['waktu_registrasi', 'jenis_registrasi', 'status', 'nama_pasien'], 'safe'],
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
        $query = Trregistrasi::find();
        $query->innerJoin('tr_pasien', 'tr_registrasi.id_pasien = tr_pasien.id_pasien');

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
            'no_registrasi' => $this->no_registrasi,
            'id_pasien' => $this->id_pasien,
            'waktu_registrasi' => $this->waktu_registrasi,
        ]);

        $query->andFilterWhere(['like', 'jenis_registrasi', $this->jenis_registrasi])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'tr_pasien.nama_pasien', $this->nama_pasien]);

        return $dataProvider;
    }
}
