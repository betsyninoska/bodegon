<?php

namespace app\controllers;

use app\models\Entrada;
use app\models\entradaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Inventario;
use app\models\Cierres;
/**
 * EntradaController implements the CRUD actions for Entrada model.
 */
class EntradaController extends Controller
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
     * Lists all Entrada models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new entradaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entrada model.
     * @param int $Id_Entrada Id Entrada
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_Entrada)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_Entrada),
        ]);
    }

    /**
     * Creates a new Entrada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

        public function actionCreate()
        {
            $model = new Entrada();
            $Cierre = new Cierres();
            //verificar si existe el registro aparturado para comenzar
            if ($this->request->isPost) {
                $Cierre = Cierres::find()->where(['fin' => null, 'Status' => 1])->one();
                if ($Cierre) {

                    if ($model->load($this->request->post())) {
                      /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
                      $_POST['Entrada']['Fecha_Entrada']=date("Y/m/d", strtotime($_POST['Entrada']['Fecha_Entrada']));
                      $_POST['Entrada']['Fecha_Registro']= date("Y-m-d");
                      $_POST['Entrada']['Status']=1;
                      $_POST['Entrada']['Cantidad_existe']=$_POST['Entrada']['Cantidad_entrada'];
                      $model->attributes=$_POST['Entrada'];
                      //print_r($model->attributes);
                      //print_r('inventario');
                      //print_r($inventario->Id_Inventario);
                      //exit;
                      $transaction = Entrada::getDb()->beginTransaction();
                      try {
                        if ($model->save()) { //Guardar
                          $inventario = Inventario::find()->where(['Id_Cierre' => $Cierre->Id_Cierre, 'Id_Producto' => $model->Id_Producto, 'Status' => 1])->one();
                          if ($_POST['Entrada']['id_tipoentrada']==1){ //Tipo de entrada inicial
                                $modelinventario = new Inventario();
                                if (!$inventario){ //Si no existe lo creo
                                  //print_r('tipo 1 No existe inventario');
                                  //var_dump($inventario);
                                  //die();
                                  //Se crea un registro en la tabla inventario
                                  $modelinventario->Id_Cierre= $Cierre->Id_Cierre;
                                  $modelinventario->Id_Producto=$model->Id_Producto;
                                  $modelinventario->Cantidad_Inicial=$model->Cantidad_entrada;
                                  $modelinventario->Existencia=$model->Cantidad_entrada;
                                  $modelinventario->Fecha_Registro= date("Y-m-d");
                                  $modelinventario->Status=1;
                                  $modelinventario->save();
                                }else { //
                                  print_r('existe inventario');
                                  //Yii::$app->session->setFlash('success','You have updated your profile.');

                                  var_dump($inventario);
                                  die();
                                  //Mensaje de que ya existe
                                }
                        	}else if ($_POST['Entrada']['id_tipoentrada']==2){ // normal
                            $modelinventario2 = new Inventario();
                            if (! $inventario){ //Se crea un registro en la tabla inventario
                              //print_r('tipo 2 No existe inventario');
                              //var_dump($inventario);
                              $modelinventario2->Id_Cierre= $Cierre->Id_Cierre;
                              $modelinventario2->Id_Producto=$model->Id_Producto;
                              $modelinventario2->Cantidad_Inicial=0;
                              $modelinventario2->Existencia=$model->Cantidad_entrada;
                              $modelinventario2->Fecha_Registro= date("Y-m-d");
                              $modelinventario2->Status=1;
                              $modelinventario2->save();

                            }else { //tipo entrada actualizar montos

                              //print_r('Existe inventario entrada 2 debe actualizar');
                              //print_r($inventario->Id_Inventario);
                              //$inventario->Id_Inventario=$inventario->Id_Inventario;
                              $inventario->Existencia=$inventario->Existencia+$model->Cantidad_entrada;
                              $inventario->save();
                              /*if($inventario->save(false)) {
                                  print_r($inventario);
                              }else{
                                print_r("GUARDO  esta entrada ya con inicial");
                              }*/
                            }
                        	}
                          $transaction->commit();
                             return $this->redirect(['view', 'Id_Entrada' => $model->Id_Entrada]); //Direccionar a la vista view

                        }

                        } catch(\Exception $e) {
                          $transaction->rollBack();
                        throw $e;
                        } catch(\Throwable $e) {
                          $transaction->rollBack();
                        throw $e;
                        }
                    }
                }else{
                  //echo "<script>alert('No tiene apertura para crear entrada')</script>";
                    //echo "<script type='text/javascript'>alert('Existen Alegatos Registrados')</script>";
                  return $this->redirect(['/cierres/index']);
                }
            }else {
                $model->loadDefaultValues();
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    /**
     * Updates an existing Entrada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_Entrada Id Entrada
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_Entrada)
    {
        $model = $this->findModel($Id_Entrada);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_Entrada' => $model->Id_Entrada]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Entrada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_Entrada Id Entrada
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_Entrada)
    {
        $this->findModel($Id_Entrada)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entrada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_Entrada Id Entrada
     * @return Entrada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_Entrada)
    {
        if (($model = Entrada::findOne(['Id_Entrada' => $Id_Entrada])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Esta página no existe.'));
    }
}
