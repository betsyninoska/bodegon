<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cierres".
 *
 * @property int $Id_Cierre
 * @property string $Inicio
 * @property string|null $fin
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Inventario[] $inventarios
 */
class Cierres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cierres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Inicio', 'Status', 'Fecha_Registro'], 'required'],
            [['Inicio', 'fin', 'Fecha_Registro'], 'safe'],
            [['Status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Cierre' => 'Id Cierre',
            'Inicio' => 'Inicio',
            'fin' => 'Fin',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Inventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::class, ['Id_Cierre' => 'Id_Cierre']);
    }

    /**
     * Gets Existencia en entrada del producto.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getidcierre()
    {

       $result = $this->db->createCommand('select Id_Cierre from cierres where Status = 1  and fin is null')->queryOne();
       return $result['Id_Cierre'] ;
    }


    /**
     * Gets Registro activo de cierre
     *
     * @return \yii\db\ActiveQuery
     */
    public function getcierre()
    {
       $result = $this->db->createCommand('select * from cierres where Status = 1  and fin is null')->queryOne();
       return $result ;
    }

}
