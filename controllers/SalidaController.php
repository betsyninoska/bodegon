<?php

namespace app\controllers;

use app\models\Salida;
use app\models\salidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Inventario;
use app\models\Detallesalida;
use app\models\Entrada;
use app\models\Cierres;
/**
 * SalidaController implements the CRUD actions for Salida model.
 */
class SalidaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Salida models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new salidaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salida model.
     * @param int $Id_Salida Id Salida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_Salida)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_Salida),
        ]);
    }

    /**
     * Creates a new Salida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
/*    public function actionCreate()
    {
        $model = new Salida();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_Salida' => $model->Id_Salida]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    public function actionCreate()
       {
          $model = new Salida();
          if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                  $_POST['Salida']['Fecha_Registro']= date("Y-m-d");
                  $_POST['Salida']['Status']=1;
                  $_POST['Salida']['Fecha_Salida']= date("Y/m/d", strtotime($_POST['Salida']['Fecha_Salida']));
                  $model->attributes=$_POST['Salida'];
                  $transaction = Salida::getDb()->beginTransaction();
                  try {
                  $cierre = new Cierres();
                  $id_cierre = $cierre->getidcierre();
                  if ($model->save()) {
                    $cantidad_sale= $_POST['Salida']['Cantidad_Salida'];
                    $modelEntrada = new Entrada();
                    $detalleexistencias = $modelEntrada->getEntradasdeproducto($_POST['Salida']['Id_Producto']);
                    foreach ($detalleexistencias as $detalleexist) {
                      //print_r( $cantidad_sale .'---' . $detalleexist['Id_Entrada'] . ' ' . $detalleexist['Cantidad_existe']);
                      if ($cantidad_sale >= $detalleexist['Cantidad_existe']){
                        //colocar en entrada cantidad_existe en 0
                        $existenciaenentrada = 0;
                        //Lo que va quedando pendiente por salir para este proceso
                        $cantidad_sale = $cantidad_sale - $detalleexist['Cantidad_existe'];
                      }else{
                        $existenciaenentrada= $detalleexist['Cantidad_existe'] - $cantidad_sale;
                        $cantidad_sale= $cantidad_sale;
                      }
                      //actualiza el monto de existencia por esa entrada
                      //$modelEntrada2 = new Entrada();
                      $inventario = Entrada::find()->where( ['Id_Entrada' => $detalleexist['Id_Entrada'] , 'Id_Producto'=> $_POST['Salida']['Id_Producto'] ,'Status' => 1])->one();

                      $inventario->Id_Entrada=$detalleexist['Id_Entrada'];
                      $inventario->Cantidad_existe=$existenciaenentrada;
                      //$modelEntrada2->save();
                      if ($inventario->save()) {
                        echo "guardo DETALLE Entrada " . $inventario->Id_Entrada . ' cantidad: ' . $inventario->Cantidad_existe . '<br>';
                      }else{
                        echo "NO GUADARDO DETALLE Entrada " . $inventario->Id_Entrada . ' cantidad: ' . $inventario->Cantidad_existe . '<br>';

                      }
                      //Insertar registro en detalle de la salida con el monto cantidad existente de esa entrada $detalleexist['Cantidad_existe']
                      $modeldetallesalida = new Detallesalida();
                      $modeldetallesalida->Id_Entrada = $detalleexist['Id_Entrada'];
                      $modeldetallesalida->Id_Salida = $model->Id_Salida;
                      $modeldetallesalida->Cantidad= $cantidad_sale;
                      $modeldetallesalida->Status= 1;
                      $modeldetallesalida->Fecha_Registro=$_POST['Entrada']['Fecha_Registro']= date("Y-m-d");
                      //$modeldetallesalida->save(false);
                      if($modeldetallesalida->save(false)){
                        echo ("inserto detalle salida " .  $modeldetallesalida->Id_Entrada . 'Salida ' .$modeldetallesalida->Id_Salida) . '<br>' ;
                      }else{
                        echo ("No inserto detalle salida " .  $modeldetallesalida->Id_Entrada . 'Salida ' .$modeldetallesalida->Id_Salida) . '<br>'  ;
                      }

                    }
                    //Restar el monto globa de la salida en inventario

                    //$modelinventario= new Inventario;
                    //$modelinventario->getInventarioxproducto($_POST['Salida']['Id_Producto'], $id_cierre);

                    $inventario = Inventario::find()->where(['Id_Cierre' => $id_cierre, 'Id_Producto' => $_POST['Salida']['Id_Producto'], 'Status' => 1])->one();

                    $inventario->Existencia=$inventario->Existencia - $_POST['Salida']['Cantidad_Salida'];
                    //$modelinventario->save();
                    if($inventario->save()){
                      echo"actualizo inventario  . $inventario->Id_Inventario.' Existencia' . $inventario->Existencia" . '<br>';
                    }else{
                      echo"NO actualizo inventario  . $inventario->Id_Inventario.' Existencia' . $inventario->Existencia" . '<br>';

                    }
                    exit;
                    //if
                    //return $this->redirect(['view', 'Id_Salida' => $model->Id_Salida]);
                   }else{
                      print_r("error al guardar");
                   }

                  } catch(\Exception $e) {
                    $transaction->rollBack();
                  throw $e;
                  } catch(\Throwable $e) {
                    $transaction->rollBack();
                  throw $e;
                  }
            }
           } else {
               $model->loadDefaultValues();
           }

           return $this->render('create', [
               'model' => $model,
           ]);
       }

    /**
     * Updates an existing Salida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_Salida Id Salida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_Salida)
    {
        $model = $this->findModel($Id_Salida);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_Salida' => $model->Id_Salida]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Salida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_Salida Id Salida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_Salida)
    {
        $this->findModel($Id_Salida)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Salida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_Salida Id Salida
     * @return Salida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_Salida)
    {
        if (($model = Salida::findOne(['Id_Salida' => $Id_Salida])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Página no existe.'));
    }
}
