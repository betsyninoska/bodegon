<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property int $Id_Inventario
 * @property int $Id_Cierre
 * @property int $Id_Producto
 * @property int $Cantidad_Inicial
 * @property int $Existencia
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Cierres $cierre
 * @property Producto $producto
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Cierre', 'Id_Producto', 'Cantidad_Inicial', 'Existencia', 'Status', 'Fecha_Registro'], 'required'],
            [['Id_Cierre', 'Id_Producto', 'Cantidad_Inicial', 'Existencia', 'Status'], 'integer'],
            [['Fecha_Registro'], 'safe'],
            [['Id_Cierre'], 'exist', 'skipOnError' => true, 'targetClass' => Cierres::class, 'targetAttribute' => ['Id_Cierre' => 'Id_Cierre']],
            [['Id_Producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['Id_Producto' => 'Id_Producto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Inventario' => 'Id Inventario',
            'Id_Cierre' => 'Id Cierre',
            'Id_Producto' => 'Id Producto',
            'Cantidad_Inicial' => 'Cantidad Inicial',
            'Existencia' => 'Existencia',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Cierre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCierre()
    {
        return $this->hasOne(Cierres::class, ['Id_Cierre' => 'Id_Cierre']);
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




    /**
     * Gets datos del producto con existencia total
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarioxproducto($idproducto,$idcierre)
    {
      $result = $this->db->createCommand('select * FROM inventario  where Status=1 and id_cierre ='. $idcierre)->queryOne();
      return $result;
    }


}
