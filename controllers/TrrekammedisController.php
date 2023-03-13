<?php

namespace app\controllers;

use app\models\Trrekammedis;
use app\models\TrrekammedisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use Exception;

/**
 * TrrekammedisController implements the CRUD actions for Trrekammedis model.
 */
class TrrekammedisController extends Controller
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
     * Lists all Trrekammedis models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrrekammedisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trrekammedis model.
     * @param int $no_rekam_medis No Rekam Medis
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($no_rekam_medis)
    {
        return $this->render('view', [
            'model' => $this->findModel($no_rekam_medis),
        ]);
    }

    /**
     * Creates a new Trrekammedis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Trrekammedis();

        if ($model->load(Yii::$app->request->post())) {
            try{
                if($model->save()){
                    Yii::$app->getSession()->setFlash(
                        'success','Data Tersimpan!'
                    );
                    return $this->redirect(['index', 'no_rekam_medis' => $model->no_rekam_medis]);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash(
                    'error',"{$e->getMessage()}"
                );
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Trrekammedis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $no_rekam_medis No Rekam Medis
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no_rekam_medis)
    {
        $model = $this->findModel($no_rekam_medis);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'no_rekam_medis' => $model->no_rekam_medis]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trrekammedis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $no_rekam_medis No Rekam Medis
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no_rekam_medis)
    {
        $this->findModel($no_rekam_medis)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trrekammedis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $no_rekam_medis No Rekam Medis
     * @return Trrekammedis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no_rekam_medis)
    {
        if (($model = Trrekammedis::findOne(['no_rekam_medis' => $no_rekam_medis])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
