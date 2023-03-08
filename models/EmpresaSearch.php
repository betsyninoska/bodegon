<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form of `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Empresa', 'Status'], 'integer'],
            [['Nombre', 'Direccion', 'Rif', 'Telefono', 'Logo', 'Fecha_Registro'], 'safe'],
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
        $query = Empresa::find();

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
            'Id_Empresa' => $this->Id_Empresa,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Rif', $this->Rif])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Logo', $this->Logo]);

        return $dataProvider;
    }
}
