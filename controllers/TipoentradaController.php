<?php

namespace app\controllers;

use app\models\Tipoentrada;
use app\models\tipoentradaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoentradaController implements the CRUD actions for Tipoentrada model.
 */
class TipoentradaController extends Controller
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
     * Lists all Tipoentrada models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new tipoentradaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tipoentrada model.
     * @param int $id_tipoentrada Id Tipoentrada
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tipoentrada)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tipoentrada),
        ]);
    }

    /**
     * Creates a new Tipoentrada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tipoentrada();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tipoentrada' => $model->id_tipoentrada]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tipoentrada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tipoentrada Id Tipoentrada
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tipoentrada)
    {
        $model = $this->findModel($id_tipoentrada);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tipoentrada' => $model->id_tipoentrada]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tipoentrada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tipoentrada Id Tipoentrada
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tipoentrada)
    {
        $this->findModel($id_tipoentrada)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tipoentrada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tipoentrada Id Tipoentrada
     * @return Tipoentrada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tipoentrada)
    {
        if (($model = Tipoentrada::findOne(['id_tipoentrada' => $id_tipoentrada])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
