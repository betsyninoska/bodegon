<?php

namespace app\controllers;

use app\models\Salida;
use app\models\SalidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $searchModel = new SalidaSearch();
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
    public function actionCreate()
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
