<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salida;

/**
 * salidaSearch represents the model behind the search form of `app\models\Salida`.
 */
class salidaSearch extends Salida
{
    /**
     * {@inheritdoc}
     */
     public $Producto;
    public function rules()
    {
        return [
            [['Id_Salida', 'Cantidad_Salida', 'Status'], 'integer'],
            [['Codigo', 'Descripcion', 'Fecha_Salida', 'Producto','Fecha_Registro'], 'safe'],
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
        $query = Salida::find();

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
        $query->joinWith(['producto',]);//<------El nombre de la Relación

        // grid filtering conditions
        $query->andFilterWhere([
            'Id_Salida' => $this->Id_Salida,
            'Id_Producto' => $this->Id_Producto,
            'Fecha_Salida' => $this->Fecha_Salida,
            'Cantidad_Salida' => $this->Cantidad_Salida,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
              ->andFilterWhere(['like', 'producto.Nombre', $this->Producto])
              ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
