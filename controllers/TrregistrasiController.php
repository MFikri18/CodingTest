<?php

namespace app\controllers;

use app\models\Trregistrasi;
use app\models\TrregistrasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use Exception;

/**
 * TrregistrasiController implements the CRUD actions for Trregistrasi model.
 */
class TrregistrasiController extends Controller
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
     * Lists all Trregistrasi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrregistrasiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trregistrasi model.
     * @param int $no_registrasi No Registrasi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($no_registrasi)
    {
        return $this->render('view', [
            'model' => $this->findModel($no_registrasi),
        ]);
    }

    /**
     * Creates a new Trregistrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Trregistrasi();

        if ($model->load(Yii::$app->request->post())) {
            try{
                if($model->save()){
                    Yii::$app->getSession()->setFlash(
                        'success','Data Tersimpan!'
                    );
                    return $this->redirect(['index', 'no_registrasi' => $model->no_registrasi]);
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
     * Updates an existing Trregistrasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $no_registrasi No Registrasi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no_registrasi)
    {
        $model = $this->findModel($no_registrasi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'no_registrasi' => $model->no_registrasi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trregistrasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $no_registrasi No Registrasi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no_registrasi)
    {
        $this->findModel($no_registrasi)->delete();

        return $this->redirect(['index']);
    }


   
    /**
     * Finds the Trregistrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $no_registrasi No Registrasi
     * @return Trregistrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no_registrasi)
    {
        if (($model = Trregistrasi::findOne(['no_registrasi' => $no_registrasi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

   
}