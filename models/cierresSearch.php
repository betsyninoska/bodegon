<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cierres;

/**
 * cierresSearch represents the model behind the search form of `app\models\Cierres`.
 */
class cierresSearch extends Cierres
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Cierre', 'Status'], 'integer'],
            [['Inicio', 'fin', 'Fecha_Registro'], 'safe'],
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
        $query = Cierres::find();

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
            'Id_Cierre' => $this->Id_Cierre,
            'Inicio' => $this->Inicio,
            'fin' => $this->fin,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);

        return $dataProvider;
    }
}
