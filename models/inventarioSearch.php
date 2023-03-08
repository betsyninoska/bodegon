<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventario;

/**
 * inventarioSearch represents the model behind the search form of `app\models\Inventario`.
 */
class inventarioSearch extends Inventario
{
    /**
     * {@inheritdoc}
     */
    public $Producto;

    public function rules()
    {
        return [
            [['Id_Inventario', 'Id_Cierre', 'Id_Producto', 'Cantidad_Inicial', 'Existencia', 'Status'], 'integer'],
            [['Fecha_Registro','Producto'], 'safe'],
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
        $query = Inventario::find();

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
            'Id_Inventario' => $this->Id_Inventario,
            'Id_Cierre' => $this->Id_Cierre,
            'Id_Producto' => $this->Id_Producto,
            'Cantidad_Inicial' => $this->Cantidad_Inicial,
            'Existencia' => $this->Existencia,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);
        $query->andFilterWhere(['like', 'producto.Nombre', $this->Producto]) ;

        return $dataProvider;
    }
}
