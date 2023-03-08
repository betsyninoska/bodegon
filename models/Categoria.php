<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $Id_Categoria
 * @property string $Nombre
 * @property int $Status
 * @property int $Fecha_Registro
 *
 * @property Producto[] $productos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Status', 'Fecha_Registro'], 'required'],
            [['Status', 'Fecha_Registro'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Categoria' => 'Id Categoria',
            'Nombre' => 'Nombre',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::class, ['Id_Categoria' => 'Id_Categoria']);
    }
}
