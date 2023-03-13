<?php

namespace app\models;

use Yii;
use app\models\Inventario;

/**
 * This is the model class for table "salida".
 *
 * @property int $Id_Salida
 * @property int $Id_Producto
 * @property string $Codigo
 * @property string $Descripcion
 * @property string $Fecha_Salida
 * @property int $Cantidad_Salida
 * @property int $Status
 * @property string $Fecha_Registro
 *
 * @property Detallesalida[] $detallesalidas
 * @property Producto $producto
 */
class Salida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_Producto', 'Codigo', 'Descripcion', 'Fecha_Salida', 'Cantidad_Salida', 'Status', 'Fecha_Registro'], 'required', 'message' => 'El campo es requerido.'],
            [['Id_Producto', 'Cantidad_Salida', 'Status'], 'integer', 'message' => 'Coloque una cantidad.'],
            [['Fecha_Salida', 'Fecha_Registro'], 'safe'],
            [['Codigo'], 'string', 'max' => 8],
            [['Descripcion'], 'string', 'max' => 50],
            [['Id_Producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['Id_Producto' => 'Id_Producto']],
            [['Cantidad_Salida'], 'ValidarCantidad'],


        ];
    }





    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Salida' => 'Id Salida',
            'Id_Producto' => 'Id Producto',
            'Codigo' => 'Codigo',
            'Descripcion' => 'Descripcion',
            'Fecha_Salida' => 'Fecha Salida',
            'Cantidad_Salida' => 'Cantidad Salida',
            'Status' => 'Status',
            'Fecha_Registro' => 'Fecha Registro',
        ];
    }

    /**
     * Gets query for [[Detallesalidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesalidas()
    {
        return $this->hasMany(Detallesalida::class, ['Id_Salida' => 'Id_Salida']);
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




    public function ValidarCantidad($attribute, $params)
    {
      $existencia=0;

      /*SELECT * FROM `inventario` t1 INNER JOIN cierres t2 ON t1.Id_Cierre=t2.Id_Cierre WHERE
      t1.Status=1 and t2.Status=1*/

      $inventario = Inventario::find()->leftJoin('cierres', 'inventario.Id_Cierre=cierres.Id_Cierre')->andWhere('inventario.Status=1')->andWhere('cierres.Status=1')->andWhere('inventario.Id_Producto='.$this->Id_Producto)->asArray()->one();


      if($inventario){
          $existencia=$inventario['Existencia'];
      }

      /*echo("Existencia " . $existencia);
      echo("Cantidad " . $this->$attribute);

      echo "????????????????????????";
      echo '<pre>';
      print_r($inventario);
      echo '</pre>';
    //  exit;*/

      if ($existencia<$this->$attribute) {
        $this->addError($attribute, 'El monto debe ser menor.');
      }
    }

}
