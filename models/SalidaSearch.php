<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salida;

/**
 * SalidaSearch represents the model behind the search form of `app\models\Salida`.
 */
class SalidaSearch extends Salida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Salida', 'Id_Producto', 'Id_UMedida', 'Id_DMedida', 'Cantidad_Salida'], 'integer'],
            [['Fecha_Salida'], 'safe'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'Id_Salida' => $this->Id_Salida,
            'Id_Producto' => $this->Id_Producto,
            'Id_UMedida' => $this->Id_UMedida,
            'Id_DMedida' => $this->Id_DMedida,
            'Fecha_Salida' => $this->Fecha_Salida,
            'Cantidad_Salida' => $this->Cantidad_Salida,
        ]);

        return $dataProvider;
    }
}
