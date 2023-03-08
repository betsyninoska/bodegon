<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida".
 *
 * @property int $Id_Salida
 * @property int $Id_Producto
 * @property int $Id_UMedida
 * @property int $Id_DMedida
 * @property string $Fecha_Salida
 * @property int $Cantidad_Salida
 *
 * @property Detallem $dMedida
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
            [['Id_Producto', 'Id_UMedida', 'Id_DMedida', 'Fecha_Salida', 'Cantidad_Salida'], 'required'],
            [['Id_Producto', 'Id_UMedida', 'Id_DMedida', 'Cantidad_Salida'], 'integer'],
            [['Fecha_Salida'], 'safe'],
            [['Id_DMedida', 'Id_UMedida'], 'exist', 'skipOnError' => true, 'targetClass' => Detallem::class, 'targetAttribute' => ['Id_DMedida' => 'Id_DMedida', 'Id_UMedida' => 'Id_UMedida']],
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
            'Id_UMedida' => 'Id U Medida',
            'Id_DMedida' => 'Id D Medida',
            'Fecha_Salida' => 'Fecha Salida',
            'Cantidad_Salida' => 'Cantidad Salida',
        ];
    }

    /**
     * Gets query for [[DMedida]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDMedida()
    {
        return $this->hasOne(Detallem::class, ['Id_DMedida' => 'Id_DMedida', 'Id_UMedida' => 'Id_UMedida']);
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
