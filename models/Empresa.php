<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $Id_Empresa
 * @property string $Nombre
 * @property string $Direccion
 * @property string $Rif
 * @property string $Telefono
 * @property string $Logo
 * @property int $Status
 * @property string $Fecha_Registro
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Direccion', 'Rif', 'Telefono', 'Logo', 'Status', 'Fecha_Registro'], 'required'],
            [['Status'], 'integer'],
            [['Fecha_Registro'], 'safe'],
            [['Nombre', 'Direccion'], 'string', 'max' => 100],
            [['Rif', 'Telefono', 'Logo'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Empresa' => 'Id Empresa',
            'Nombre' => 'Nombre',
            'Direccion' => 'Direccion',
            'Rif' => 'Rif',
            'Telefono' => 'Telefono',
            'Logo' => 'Logo',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }
}
