<?php

namespace app\controllers;

use app\models\Producto;
use app\models\productoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
     * Lists all Producto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new productoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param int $Id_Producto Id Producto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_Producto)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_Producto),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Producto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_Producto' => $model->Id_Producto]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_Producto Id Producto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_Producto)
    {
        $model = $this->findModel($Id_Producto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_Producto' => $model->Id_Producto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_Producto Id Producto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_Producto)
    {
        $this->findModel($Id_Producto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_Producto Id Producto
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_Producto)
    {
        if (($model = Producto::findOne(['Id_Producto' => $Id_Producto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
