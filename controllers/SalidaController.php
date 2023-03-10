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
              /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
              $_POST['Salida']['Fecha_Registro']= date("Y-m-d");
              $_POST['Salida']['Status']=1;
              $model->attributes=$_POST['Salida'];
              $transaction = Entrada::getDb()->beginTransaction();
              try {
                    if ($model->save()) { //Guardar
                    //buscar las entradas de ese producto por orden ascendente metodo fifo
                    //e ir restando para guardarlo en la tabla inventario
                    //El status de entrada es que aun se encuentra disponible cuando ya no hay mas se debe colocar en falso =0

                    //$entradasproducto = Entrada::find()->where([ 'Id_Producto' => $_POST['Salida']['Id_Producto'], 'Status' => 1])->orderBy(['Fecha_Entrada'=>SORT_ASC]['Id_Entrada'=>SORT_ASC])->all();

                    //var_dump($entradasproducto);
                    foreach ($entradasproducto as $row) {
                      //$salidasanterioresxidentrada = Salida::find()->where([ 'Id_Producto' => $_POST['Salida']['Id_Producto'],'Id_Entrada' => $row['Id_Entrada'], 'Status' => 1])->orderBy(['Fecha_Entrada'=>SORT_ASC])->all();

                      //SALIDAS
                      //SELECT * FROM salida LEFT JOIN detallesalida ON salida.Id_Salida = detallesalida.Id_Salida

                      //entradas
                      //SELECT * FROM entrada INNER JOIN detallesalida ON entrada.Id_Entrada = detallesalida.Id_Entrada
                      foreach ($salidasanterioresxidentrada as $row2) {

                      $row['row2']=
                      //echo "id=". $row['Id_Entrada'] .  "Cantidad:". $row['Cantidad_entrada'] . "<br/><br/>";
                      //Verificar si ya he sacado de ese identrada productos en la misma entrada salida para saber cuanto realmente queda de ese id

                      //Luego restar
                      //si saque productos
                      }
                        $quedan= $row['Cantidad_entrada'];
                    }
                    exit;


                    return $this->redirect(['view', 'Id_Salida' => $model->Id_Salida]); //Direccionar a la vista view

                    }
               } catch(\Exception $e) {
                 $transaction->rollBack();
               throw $e;
               } catch(\Throwable $e) {
                 $transaction->rollBack();
               throw $e;
               }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
      }
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

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
