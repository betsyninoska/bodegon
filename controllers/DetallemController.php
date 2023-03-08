<?php

namespace app\controllers;

use app\models\Detallem;
use app\models\DetallemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallemController implements the CRUD actions for Detallem model.
 */
class DetallemController extends Controller
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
     * Lists all Detallem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetallemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallem model.
     * @param int $Id_DMedida Id D Medida
     * @param int $Id_UMedida Id U Medida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id_DMedida, $Id_UMedida)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id_DMedida, $Id_UMedida),
        ]);
    }

    /**
     * Creates a new Detallem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Detallem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Id_DMedida' => $model->Id_DMedida, 'Id_UMedida' => $model->Id_UMedida]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detallem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Id_DMedida Id D Medida
     * @param int $Id_UMedida Id U Medida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id_DMedida, $Id_UMedida)
    {
        $model = $this->findModel($Id_DMedida, $Id_UMedida);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id_DMedida' => $model->Id_DMedida, 'Id_UMedida' => $model->Id_UMedida]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detallem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Id_DMedida Id D Medida
     * @param int $Id_UMedida Id U Medida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id_DMedida, $Id_UMedida)
    {
        $this->findModel($Id_DMedida, $Id_UMedida)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detallem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Id_DMedida Id D Medida
     * @param int $Id_UMedida Id U Medida
     * @return Detallem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id_DMedida, $Id_UMedida)
    {
        if (($model = Detallem::findOne(['Id_DMedida' => $Id_DMedida, 'Id_UMedida' => $Id_UMedida])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
