<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medida".
 *
 * @property int $Id_UMedida
 * @property string $Nombre
 * @property string $Abreviaturas
 * @property string $Simbolo_Medida
 * @property float $Catidad_Medida
 *
 * @property Detallem[] $detallems
 * @property Producto[] $productos
 */
class Medida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Abreviaturas', 'Simbolo_Medida', 'Catidad_Medida'], 'required'],
            [['Catidad_Medida'], 'number'],
            [['Nombre'], 'string', 'max' => 50],
            [['Abreviaturas'], 'string', 'max' => 5],
            [['Simbolo_Medida'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_UMedida' => 'Id U Medida',
            'Nombre' => 'Nombre',
            'Abreviaturas' => 'Abreviatura',
            'Simbolo_Medida' => 'Símbolo de medida',
            'Catidad_Medida' => 'Catidad',
        ];
    }

    /**
     * Gets query for [[Detallems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetallems()
    {
        return $this->hasMany(Detallem::class, ['Id_UMedida' => 'Id_UMedida']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::class, ['Id_UMedida' => 'Id_UMedida']);
    }
}
