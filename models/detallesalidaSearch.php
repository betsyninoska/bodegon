<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallesalida;

/**
 * detallesalidaSearch represents the model behind the search form of `app\models\Detallesalida`.
 */
class detallesalidaSearch extends Detallesalida
{
    /**
     * {@inheritdoc}
     */
      public $Fecha_Entrada;
    public function rules()
    {
        return [
            [['Id_detallesalida',  'Id_Salida', 'Cantidad', 'Status'], 'integer'],
            [['Fecha_Registro','Fecha_Entrada'], 'safe'],
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
        $query = Detallesalida::find();

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
        $query->joinWith(['entrada',]);//<------El nombre de la Relación
        // grid filtering conditions
        $query->andFilterWhere([
            'Id_detallesalida' => $this->Id_detallesalida,
            //'Id_Entrada' => $this->Id_Entrada,
            'Id_Salida' => $this->Id_Salida,
            'Cantidad' => $this->Cantidad,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);
        $query->andFilterWhere(['like', 'entrada.Fecha_Entrada', $this->Fecha_Entrada]);
        return $dataProvider;
    }
}
