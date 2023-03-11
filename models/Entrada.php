<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrada".
 *
 * @property int $Id_Entrada
 * @property int $id_Proveedor
 * @property int $Id_Producto
 * @property int $id_tipoentrada
 * @property string $Codigo
 * @property string $Fecha_Entrada
 * @property int $Cantidad_entrada
 * @property int $Cantidad_existe
 * @property float $Precio_compra
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Detallesalida[] $detallesalidas
 * @property Producto $producto
 * @property Proveedor $proveedor
 * @property Tipoentrada $tipoentrada
 */
class Entrada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entrada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_Proveedor', 'Id_Producto', 'id_tipoentrada', 'Codigo', 'Fecha_Entrada', 'Cantidad_entrada', 'Cantidad_existe', 'Precio_compra', 'Status', 'Fecha_Registro'], 'required'],
            [['id_Proveedor', 'Id_Producto', 'id_tipoentrada', 'Cantidad_entrada', 'Cantidad_existe', 'Status'], 'integer'],
            [['Fecha_Entrada', 'Fecha_Registro'], 'safe'],
            [['Precio_compra'], 'number'],
            [['Codigo'], 'string', 'max' => 8],
            [['Id_Producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['Id_Producto' => 'Id_Producto']],
            [['id_Proveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::class, 'targetAttribute' => ['id_Proveedor' => 'Id_Proveedor']],
            [['id_tipoentrada'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoentrada::class, 'targetAttribute' => ['id_tipoentrada' => 'id_tipoentrada']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Entrada' => 'Id Entrada',
            'id_Proveedor' => 'Id Proveedor',
            'Id_Producto' => 'Id Producto',
            'id_tipoentrada' => 'Id Tipoentrada',
            'Codigo' => 'Codigo',
            'Fecha_Entrada' => 'Fecha Entrada',
            'Cantidad_entrada' => 'Cantidad Entrada',
            'Cantidad_existe' => 'Cantidad Existe',
            'Precio_compra' => 'Precio Compra',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }






    /**
     * Gets Existencia en entrada del producto.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradasdeproducto($idproducto)
    {
       $result = $this->db->createCommand('select Id_Entrada,Cantidad_existe,Cantidad_entrada from entrada where Id_Producto ='. $idproducto .' and Status=1 and Cantidad_existe >=1')->queryAll();
       return $result;
    }




    /**
     * Gets query for [[Detallesalidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesalidas()
    {
        return $this->hasMany(Detallesalida::class, ['Id_Entrada' => 'Id_Entrada']);
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
     * Gets query for [[Proveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedor::class, ['Id_Proveedor' => 'id_Proveedor']);
    }

    /**
     * Gets query for [[Tipoentrada]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoentrada()
    {
        return $this->hasOne(Tipoentrada::class, ['id_tipoentrada' => 'id_tipoentrada']);
    }


}
