<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medida;

/**
 * MedidaSearch represents the model behind the search form of `app\models\Medida`.
 */
class MedidaSearch extends Medida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_UMedida'], 'integer'],
            [['Nombre', 'Abreviaturas', 'Simbolo_Medida'], 'safe'],
            [['Catidad_Medida'], 'number'],
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
        $query = Medida::find();

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
            'Id_UMedida' => $this->Id_UMedida,
            'Catidad_Medida' => $this->Catidad_Medida,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Abreviaturas', $this->Abreviaturas])
            ->andFilterWhere(['like', 'Simbolo_Medida', $this->Simbolo_Medida]);

        return $dataProvider;
    }
}
