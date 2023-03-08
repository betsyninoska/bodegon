<?php

namespace app\controllers;

use app\models\Detallesalida;
use app\models\detallesalidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallesalidaController implements the CRUD actions for Detallesalida model.
 */
class DetallesalidaController extends Controller
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
     * Lists all Detallesalida models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new detallesalidaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallesalida model.
     * @param int $Id_detallesalida Id Detallesalida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_detallesalida)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_detallesalida),
        ]);
    }

    /**
     * Creates a new Detallesalida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Detallesalida();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_detallesalida' => $model->Id_detallesalida]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detallesalida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_detallesalida Id Detallesalida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_detallesalida)
    {
        $model = $this->findModel($Id_detallesalida);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_detallesalida' => $model->Id_detallesalida]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detallesalida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_detallesalida Id Detallesalida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_detallesalida)
    {
        $this->findModel($Id_detallesalida)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detallesalida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_detallesalida Id Detallesalida
     * @return Detallesalida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_detallesalida)
    {
        if (($model = Detallesalida::findOne(['Id_detallesalida' => $Id_detallesalida])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
