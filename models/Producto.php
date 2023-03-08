<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $Id_Producto
 * @property int $Id_UMedida
 * @property int $Id_Categoria
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Imagen
 * @property int $Status
 * @property string $Fecha_registro
 *
 * @property Categoria $categoria
 * @property Entrada[] $entradas
 * @property Inventario[] $inventarios
 * @property Proveedor[] $proveedors
 * @property Salida[] $salidas
 * @property Medida $uMedida
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_UMedida', 'Id_Categoria', 'Nombre', 'Descripcion', 'Imagen', 'Status', 'Fecha_registro'], 'required'],
            [['Id_UMedida', 'Id_Categoria', 'Status'], 'integer'],
            [['Fecha_registro'], 'safe'],
            [['Nombre', 'Descripcion'], 'string', 'max' => 50],
            [['Imagen'], 'string', 'max' => 40],
            [['Id_Categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['Id_Categoria' => 'Id_Categoria']],
            [['Id_UMedida'], 'exist', 'skipOnError' => true, 'targetClass' => Medida::class, 'targetAttribute' => ['Id_UMedida' => 'Id_UMedida']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Producto' => 'Id Producto',
            'Id_UMedida' => 'Id U Medida',
            'Id_Categoria' => 'Id Categoria',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Imagen' => 'Imagen',
            'Status' => 'Status',
            'Fecha_registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['Id_Categoria' => 'Id_Categoria']);
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::class, ['Id_Producto' => 'Id_Producto']);
    }

    /**
     * Gets query for [[Inventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::class, ['Id_Producto' => 'Id_Producto']);
    }

    /**
     * Gets query for [[Proveedors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedors()
    {
        return $this->hasMany(Proveedor::class, ['Id_Producto' => 'Id_Producto']);
    }

    /**
     * Gets query for [[Salidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::class, ['Id_Producto' => 'Id_Producto']);
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
