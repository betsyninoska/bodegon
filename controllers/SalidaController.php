<?php

namespace app\controllers;

use app\models\Salida;
use app\models\salidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Inventario;
use app\models\Entrada;

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
                  if ($model->save()) {
                    //Buscar entrada por producto y cantidad existencia mayor a 0
                    //$exinciaxentrada = Entrada::find()->where([ 'Id_Producto' => $_POST['Salida']['Id_Producto'],['>=', 'Cantidad_existe', 1],'Status' => 1])->orderBy(['Fecha_Entrada'=>SORT_ASC, 'Id_Entrada'=>SORT_ASC])->all();
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'Id_Producto=' . $_POST['Salida']['Id_Producto'] . 'and  Cantidad_existe >=1 and Status=1';
                    $existenciaxentrada = Entrada::model()->findAll($criteria);
                    var_dump($existenciaxentrada);
                    exit;
                    if ($existenciaxentrada) {//si existencia
                      foreach ($existenciaxentrada as $row) {
                        /*Si el monto de Cantidad existencia es mayor a la salida restar y actualziar la tabla entrada campo Cantidad_existe
                        /*Restar tambien en la tabla inventa*/

                        //si es menor a la salida


                      }

                    }else{ //no hay entradas de ese producto
                      //Mandar un mensaje porque es imposible sacar producto si no tenemos entradas con existencia
                    }


                    exit;


                    //sino



                     //return $this->redirect(['view', 'Id_Salida' => $model->Id_Salida]);
                   }else{
                      print_r("a guardar");
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
