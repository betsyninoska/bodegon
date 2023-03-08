<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoentrada".
 *
 * @property int $id_tipoentrada
 * @property string $Nombre
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Entrada[] $entradas
 */
class Tipoentrada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoentrada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Status', 'Fecha_Registro'], 'required'],
            [['Status'], 'integer'],
            [['Fecha_Registro'], 'safe'],
            [['Nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipoentrada' => 'Id Tipoentrada',
            'Nombre' => 'Nombre',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::class, ['id_tipoentrada' => 'id_tipoentrada']);
    }
}
