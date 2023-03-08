<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $Id_Proveedor
 * @property string $Nombre
 * @property string $RIF
 * @property float $Telefono
 * @property string $Ciudad
 * @property string $Direccion
 *
 *
 *
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'RIF', 'Telefono', 'Ciudad', 'Direccion'], 'required'],
            [['Telefono'], 'number'],
            [['Nombre'], 'string', 'max' => 50],
            [['RIF'], 'string', 'max' => 10],
            [['Ciudad'], 'string', 'max' => 40],
            [['Direccion'], 'string', 'max' => 60],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'Nombre' => 'Nombre',
            'RIF' => 'Rif',
            'Telefono' => 'Telefono',
            'Ciudad' => 'Ciudad',
            'Direccion' => 'Direccion',
        ];
    }


}
