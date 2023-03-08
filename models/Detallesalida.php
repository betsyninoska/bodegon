<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallesalida".
 *
 * @property int $Id_detallesalida
 * @property int $Id_Entrada
 * @property int $Id_Salida
 * @property int $Cantidad
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Entrada $entrada
 * @property Salida $salida
 */
class Detallesalida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detallesalida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Entrada', 'Id_Salida', 'Cantidad', 'Status', 'Fecha_Registro'], 'required'],
            [['Id_Entrada', 'Id_Salida', 'Cantidad', 'Status'], 'integer'],
            [['Fecha_Registro'], 'safe'],
            [['Id_Entrada'], 'exist', 'skipOnError' => true, 'targetClass' => Entrada::class, 'targetAttribute' => ['Id_Entrada' => 'Id_Entrada']],
            [['Id_Salida'], 'exist', 'skipOnError' => true, 'targetClass' => Salida::class, 'targetAttribute' => ['Id_Salida' => 'Id_Salida']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_detallesalida' => 'Id Detallesalida',
            'Id_Entrada' => 'Id Entrada',
            'Id_Salida' => 'Id Salida',
            'Cantidad' => 'Cantidad',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Entrada]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntrada()
    {
        return $this->hasOne(Entrada::class, ['Id_Entrada' => 'Id_Entrada']);
    }

    /**
     * Gets query for [[Salida]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalida()
    {
        return $this->hasOne(Salida::class, ['Id_Salida' => 'Id_Salida']);
    }
}
