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
    /*public function actionCreate()
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
        $Cierre = new Cierres();
        if ($this->request->isPost) {
            $Cierre = Cierres::find()->where(['fin' => null, 'Status' => 1])->one();


            if ($model->load($this->request->post()) ) {
              $_POST['Salida']['Fecha_Salida']=date("Y/m/d", strtotime($_POST['Salida']['Fecha_Salida']));
              $_POST['Salida']['Fecha_Registro']= date("Y-m-d");
              $_POST['Salida']['Status']=1;
              $model->attributes=$_POST['Salida'];


              /*echo '<pre>';
              print_r($model);
              echo '</pre>';*/

              //VALIDACION FORMULARIO
              if ($model->validate()) {
                echo"fue validado";
                } else {
                echo"dioo error";
                $errors = $model->errors;
              }



              $transaction = Salida::getDb()->beginTransaction();
              try {
                  $fracaso=false;
                  $fracaso2=false;
                  if ( $model->save()){
                    echo "Salida: " .$model->Id_Salida . 'antidad_Salida ' .$model->Cantidad_Salida . '<br><br>';
                    $id_salida=$model->Id_Salida;
                    $cantidad_pendiente= $_POST['Salida']['Cantidad_Salida'];
                    $modelEntrada = new Entrada();
                    $detalleexistencias = $modelEntrada->getEntradasdeproducto($_POST['Salida']['Id_Producto']);
                    //print_r( $cantidad_sale .'---' . $detalleexist['Id_Entrada'] . ' ' . $detalleexist['Cantidad_existe']);
                    foreach ($detalleexistencias as $detalleexist) {
                      //print_r( $cantidad_sale .'---' . $detalleexist['Id_Entrada'] . ' ' . $detalleexist['Cantidad_existe']);
                        if ($cantidad_pendiente > 0){
                          if ($cantidad_pendiente >= $detalleexist['Cantidad_existe']){
                            //colocar en entrada cantidad_existe en 0
                            $existenciaenentrada = 0;
                            $cantidad_sale = $detalleexist['Cantidad_existe'];
                            //Lo que va quedando pendiente por salir para este proceso
                            $cantidad_pendiente = $cantidad_pendiente - $detalleexist['Cantidad_existe'];
                            ECHO 'Mayor Existenciaentrada '  . $existenciaenentrada .'sale: ' .$cantidad_sale . 'Pendiente: ' .$cantidad_pendiente .'<br><br>';

                          }else{
                            $existenciaenentrada = $detalleexist['Cantidad_existe'] - $cantidad_pendiente ;

                            $cantidad_sale = $cantidad_pendiente  ;
                            $cantidad_pendiente = 0;
                            ECHO 'Menor Existenciaentrada ' . $existenciaenentrada .'sale: ' .$cantidad_sale . 'Pendiente: ' .$cantidad_pendiente .'<br><br>';
                          }

                          //actualiza el monto de existencia por esa entrada
                          //$modelEntrada2 = new Entrada();
                          $modelEntrada2 = Entrada::find()->where( ['Id_Entrada' => $detalleexist['Id_Entrada'] , 'Id_Producto'=> $_POST['Salida']['Id_Producto'] ,'Status' => 1])->one();
                          $modelEntrada2->Id_Entrada=$detalleexist['Id_Entrada'];
                          $modelEntrada2->Cantidad_existe=$existenciaenentrada;
                          if ($modelEntrada2->save()) {
                            //echo "GUARDO Entrada: Id_Entrada:"  .$modelEntrada2->Id_Entrada .'Antes' .$detalleexist['Cantidad_existe'].' cantidad_existe: ' . $modelEntrada2->Cantidad_existe . '<br><br>';

                          }else{
                            //echo "NO GUADARDO Entrada: Id_Entrada:"  .$modelEntrada2->Id_Entrada .'Antes' .$detalleexist['Cantidad_existe'].' cantidad_existe: ' . $modelEntrada2->Cantidad_existe . '<br><br>';
                            $fracaso=true;
                          }
                          //Insertar registro en detalle de la salida con el monto cantidad existente de esa entrada $detalleexist['Cantidad_existe']
                          $modeldetallesalida = new Detallesalida();
                          $modeldetallesalida->Id_Entrada = $detalleexist['Id_Entrada'];
                          $modeldetallesalida->Id_Salida = $model->Id_Salida;
                          $modeldetallesalida->Cantidad= $cantidad_sale;
                          $modeldetallesalida->Status= 1;
                          $modeldetallesalida->Fecha_Registro=$_POST['Entrada']['Fecha_Registro']= date("Y-m-d");
                          //$modeldetallesalida->save(false);
                          if($modeldetallesalida->save()){
                            echo ("INSERTO detalle_salida Id_detalle:" .  $modeldetallesalida->Id_Entrada . ' id_Salida ' .$modeldetallesalida->Id_Salida) . 'cantidad: '. $modeldetallesalida->Cantidad .'<br><br>' ;

                          }else{
                            echo ("NO INSERTO detalle_salida Id_detalle:" .  $modeldetallesalida->Id_Entrada . ' id_Salida ' .$modeldetallesalida->Id_Salida) . 'cantidad: '. $modeldetallesalida->Cantidad .'<br><br>' ;
                            $fracaso2=true;
                          }
                      }//fin cantidad_pendiente > 0
                    } //fin foreach
                    //Restar el monto globa de la salida en inventario
                    $inventario = Inventario::find()->where(['Id_Cierre' => $Cierre->Id_Cierre, 'Id_Producto' => $_POST['Salida']['Id_Producto'], 'Status' => 1])->one();
                    $inventario->Existencia=$inventario->Existencia - $_POST['Salida']['Cantidad_Salida'];

                    if($inventario->save()){
                      echo"ACTUALIZO inventario  . $inventario->Id_Inventario.' Existencia' . $inventario->Existencia" . '<br>';
                      if( $fracaso==false and $fracaso2==false){
                        $transaction->commit();
                        return $this->redirect(['view', 'Id_Salida' => $model->Id_Salida]);
                      }
                    } //fin guardar inventario
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



    /*public function actionSalidaajax(){
      return $this->render()

    }*/
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

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
