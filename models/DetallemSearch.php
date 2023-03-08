<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallem;

/**
 * DetallemSearch represents the model behind the search form of `app\models\Detallem`.
 */
class DetallemSearch extends Detallem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_DMedida', 'Id_UMedida', 'Cantidad_Detalle'], 'integer'],
            [['Nombre', 'Descripcion'], 'safe'],
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
        $query = Detallem::find();

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
            'Id_DMedida' => $this->Id_DMedida,
            'Id_UMedida' => $this->Id_UMedida,
            'Cantidad_Detalle' => $this->Cantidad_Detalle,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
