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
    /*public function actionCreate()
    {
        $model = new Entrada();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_Entrada' => $model->Id_Entrada]);
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
            $model = new Entrada();
            $modelinventario = new Inventario();
            $model3 = new Cierres();
            $Cierre = new Cierres();

            if ($this->request->isPost) {

                if ($model->load($this->request->post())) {
                  /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
                  $_POST['Entrada']['Fecha_Entrada']=date("Y/m/d", strtotime($_POST['Entrada']['Fecha_Entrada']));
                  $_POST['Entrada']['Fecha_Registro']= date("Y-m-d");
                  $_POST['Entrada']['Status']=1;
                  $model->attributes=$_POST['Entrada'];
                  //print_r($model->attributes);
                  //  exit;
                  $transaction = Entrada::getDb()->beginTransaction();
                  try {
                    if ($model->save()) { //Guardar
                      $Cierre = Cierres::find()->where(['fin' => null, 'Status' => 1])->one();
                      if ($_POST['Entrada']['id_tipoentrada']==1){ //Tipo de entrada inicial
                          //Se crea un registro en la tabla inventario
                          $id = $Cierre->Id_Cierre;
                          if ($Cierre){ //Si existe un registro
                              $modelinventario->Id_Cierre= $Cierre->Id_Cierre;
                              
                          }else {

                          }
                          print_r($invcierre);

                          exit;
                        	$modelinventario->Id_Producto=$model->Id_Producto;

                          $modelinventario->Cantidad_Inicial=$model->Cantidad_entrada;

                        	$modelinventario->Existencia=$model->Cantidad_entrada;

                        	$modelinventario->Fecha_Registro= date("Y-m-d");
                        	$modelinventario->Status=1;
                          $modelinventario->save();

                    	}else if ($_POST['Entrada']['id_tipoentrada']==2){ // normal
                        	//Se verifica que exista registro en la tabla Inventario
                          /*$inv=Inventario::model()->findByPk(Yii::app()->user->id);
                          $vid = Yii::app()->db->createCommand('SELECT max(id) FROM buzon')->queryScalar();
                          $db->createCommand('INSERT INTO `customer` (`name`) VALUES (:name)', [
                          ':name' => 'Qiang',
                          ])->execute();*/
                          //Status=1
                          //Id_Prooducto = $model->Id_Producto;
                          //Id_Cierre

                        	//si existe
                        	  //se actualiza existencia

                        	//Sino
                        	//Se crea un registro en la tabla inventario y el campo inicio = 0

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
            } else {
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

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
