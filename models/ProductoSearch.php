<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{

    /**
     * {@inheritdoc}
     */

     public $Categoria;
     public $Medida;


    public function rules()
    {
        return [
            [['Id_Producto',  'Status'], 'integer'],
            [['Nombre', 'Descripcion', 'Imagen', 'Fecha_registro','Categoria','Medida'], 'safe'],
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
        $query = Producto::find();

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

        $query->joinWith(['medida']);//<------El nombre de la Relación
        $query->joinWith(['categoria']);//<------El nombre de la Relación
        // grid filtering conditions
        $query->andFilterWhere([
            'Id_Producto' => $this->Id_Producto,
            //'Id_UMedida' => $this->Id_UMedida,
            //'Id_Categoria' => $this->Id_Categoria,
            'Status' => $this->Status,
            'Fecha_registro' => $this->Fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Imagen', $this->Imagen])

            ->andFilterWhere(['like', 'categoria.Nombre', $this->Categoria]);

        return $dataProvider;
    }
}
