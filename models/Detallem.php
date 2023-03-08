<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallem".
 *
 * @property int $Id_DMedida
 * @property int $Id_UMedida
 * @property string $Nombre
 * @property int $Cantidad_Detalle
 * @property string $Descripcion
 *
 * @property Entrada[] $entradas
 * @property Inventario[] $inventarios
 * @property Salida[] $salidas
 * @property Medida $uMedida
 */
class Detallem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detallem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_UMedida', 'Nombre', 'Cantidad_Detalle', 'Descripcion'], 'required'],
            [['Id_UMedida', 'Cantidad_Detalle'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 100],
            [['Id_UMedida'], 'exist', 'skipOnError' => true, 'targetClass' => Medida::class, 'targetAttribute' => ['Id_UMedida' => 'Id_UMedida']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_DMedida' => 'Id D Medida',
            'Id_UMedida' => 'Medida',
            'Nombre' => 'Nombre',
            'Cantidad_Detalle' => 'Cantidad detalle (factor)',
            'Descripcion' => 'Descripción',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::class, ['Id_DMedida' => 'Id_DMedida', 'Id_UMedida' => 'Id_UMedida']);
    }

    /**
     * Gets query for [[Inventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::class, ['Id_UMedida' => 'Id_UMedida', 'Id_DMedida' => 'Id_DMedida']);
    }

    /**
     * Gets query for [[Salidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::class, ['Id_DMedida' => 'Id_DMedida', 'Id_UMedida' => 'Id_UMedida']);
    }

    /**
     * Gets query for [[UMedida]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUMedida()
    {
        return $this->hasOne(Medida::class, ['Id_UMedida' => 'Id_UMedida']);
    }
}
