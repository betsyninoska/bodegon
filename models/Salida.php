<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida".
 *
 * @property int $Id_Salida
 * @property int $Id_Producto
 * @property string $Codigo
 * @property string $Descripcion
 * @property string $Fecha_Salida
 * @property int $Cantidad_Salida
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Detallesalida[] $detallesalidas
 * @property Producto $producto
 */
class Salida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Producto', 'Codigo', 'Descripcion', 'Fecha_Salida', 'Cantidad_Salida', 'Status', 'Fecha_Registro'], 'required'],
            [['Id_Producto', 'Cantidad_Salida', 'Status'], 'integer'],
            [['Fecha_Salida', 'Fecha_Registro'], 'safe'],
            [['Codigo'], 'string', 'max' => 8],
            [['Descripcion'], 'string', 'max' => 50],
            [['Id_Producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['Id_Producto' => 'Id_Producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Salida' => 'Id Salida',
            'Id_Producto' => 'Id Producto',
            'Codigo' => 'Codigo',
            'Descripcion' => 'Descripcion',
            'Fecha_Salida' => 'Fecha Salida',
            'Cantidad_Salida' => 'Cantidad Salida',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Detallesalidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesalidas()
    {
        return $this->hasMany(Detallesalida::class, ['Id_Salida' => 'Id_Salida']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::class, ['Id_Producto' => 'Id_Producto']);
    }
}
