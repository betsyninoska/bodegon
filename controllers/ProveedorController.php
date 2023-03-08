<?php

namespace app\controllers;

use app\models\Proveedor;
use app\models\ProveedorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProveedorController implements the CRUD actions for Proveedor model.
 */
class ProveedorController extends Controller
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
     * Lists all Proveedor models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProveedorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proveedor model.
     * @param int $Id_Proveedor Id Proveedor
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_Proveedor)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_Proveedor),
        ]);
    }

    /**
     * Creates a new Proveedor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Proveedor();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_Proveedor' => $model->Id_Proveedor]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proveedor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_Proveedor Id Proveedor
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_Proveedor)
    {
        $model = $this->findModel($Id_Proveedor);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_Proveedor' => $model->Id_Proveedor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proveedor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_Proveedor Id Proveedor
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_Proveedor)
    {
        $this->findModel($Id_Proveedor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proveedor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_Proveedor Id Proveedor
     * @return Proveedor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_Proveedor)
    {
        if (($model = Proveedor::findOne(['Id_Proveedor' => $Id_Proveedor])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
