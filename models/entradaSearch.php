<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entrada;

/**
 * entradaSearch represents the model behind the search form of `app\models\Entrada`.
 */
class entradaSearch extends Entrada
{
    /**
     * {@inheritdoc}
     */
    public $Producto;
    public $Proveedor;
    public $Tipoentrada;

    public function rules()
    {
        return [
            [['Id_Entrada', 'id_tipoentrada', 'Cantidad_entrada', 'Status'], 'integer'],
            [['Codigo', 'Fecha_Entrada', 'Fecha_Registro','Producto', 'Proveedor','Tipoentrada'], 'safe'],
            [['Precio_compra'], 'number'],
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
    /*public function search($params)
    {
        $query = Entrada::find();

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
            'Id_Entrada' => $this->Id_Entrada,
            'id_Proveedor' => $this->id_Proveedor,
            'Id_Producto' => $this->Id_Producto,
            'id_tipoentrada' => $this->id_tipoentrada,
            'Fecha_Entrada' => $this->Fecha_Entrada,
            'Cantidad_entrada' => $this->Cantidad_entrada,
            'Precio_compra' => $this->Precio_compra,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo]);

        return $dataProvider;
    }*/
    public function search($params)
    {
        $query = Entrada::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);
        if (!($this->load($params) && $this->validate())) {
        //if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->joinWith(['producto',]);//<------El nombre de la Relación
        $query->joinWith(['proveedor']);//<------El nombre de la Relación
        $query->joinWith(['tipoentrada']);//<------El nombre de la Relación
        // grid filtering conditions
        $query->andFilterWhere([


            'Id_Entrada' => $this->Id_Entrada,
            //'id_Proveedor' => $this->id_Proveedor,
            //'producto.Nombre' => $this->Producto,//<----la variable para filtro
            //'proveedor.Nombre' => $this->Proveedor,
            //'Id_Producto' => $this->Id_Producto,
            //'Producto.Nombre' => $this->producto_entrada_fk,
            //'id_tipoentrada' => $this->id_tipoentrada,
            'Fecha_Entrada' => $this->Fecha_Entrada,
            'Cantidad_entrada' => $this->Cantidad_entrada,
            'Precio_compra' => $this->Precio_compra,
            'Status' => $this->Status,
            'Fecha_Registro' => $this->Fecha_Registro,
        ]);
        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'proveedor.Nombre', $this->Proveedor])
            ->andFilterWhere(['like', 'producto.Nombre', $this->Producto])
            ->andFilterWhere(['like', 'tipoentrada.Nombre', $this->Tipoentrada]);

        return $dataProvider;
    }
}
