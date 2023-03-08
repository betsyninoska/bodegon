<?php

namespace app\controllers;

use app\models\Cierres;
use app\models\cierresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CierresController implements the CRUD actions for Cierres model.
 */
class CierresController extends Controller
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
     * Lists all Cierres models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new cierresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cierres model.
     * @param int $Id_Cierre Id Cierre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_Cierre)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_Cierre),
        ]);
    }

    /**
     * Creates a new Cierres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    /*public function actionCreate()
    {
        $model = new Cierres();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_Cierre' => $model->Id_Cierre]);
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
        $model = new Cierres();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
              /*Valores que no se registran por formulario pero que se deben guardar en BD en conjunto con los del formulario*/
              $_POST['Cierres']['Fecha_Registro']= date("Y-m-d");
              $_POST['Cierres']['Status']=1;


              $model->attributes=$_POST['Cierres'];
              //print_r($_POST['Cierres']); die;
               if ($model->save()) { //Guardar
                    return $this->redirect(['view', 'Id_Cierre' => $model->Id_Cierre]); //Direccionar a la vista view
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
     * Updates an existing Cierres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_Cierre Id Cierre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_Cierre)
    {
        $model = $this->findModel($Id_Cierre);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_Cierre' => $model->Id_Cierre]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cierres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_Cierre Id Cierre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_Cierre)
    {
        $this->findModel($Id_Cierre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cierres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_Cierre Id Cierre
     * @return Cierres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_Cierre)
    {
        if (($model = Cierres::findOne(['Id_Cierre' => $Id_Cierre])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
