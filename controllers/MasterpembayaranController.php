<?php

namespace app\controllers;

use app\models\Masterpembayaran;
use app\models\MasterpembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use Yii;
use Exception;


/**
 * MasterpembayaranController implements the CRUD actions for Masterpembayaran model.
 */
class MasterpembayaranController extends Controller
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
     * Lists all Masterpembayaran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterpembayaranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterpembayaran model.
     * @param int $id_pembayaran Id Pembayaran
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pembayaran)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pembayaran),
        ]);
    }

    /**
     * Creates a new Masterpembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Masterpembayaran();

        if ($model->load(Yii::$app->request->post())) {
            try{
                if($model->save()){
                    Yii::$app->getSession()->setFlash(
                        'success','Data Tersimpan!'
                    );
                    return $this->redirect(['index', 'id_pembayaran' => $model->id_pembayaran]);
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
     * Updates an existing Masterpembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pembayaran Id Pembayaran
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pembayaran)
    {
        $model = $this->findModel($id_pembayaran);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id_pembayaran' => $model->id_pembayaran]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Masterpembayaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pembayaran Id Pembayaran
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pembayaran)
    {
        $this->findModel($id_pembayaran)->delete();

        return $this->redirect(['index']);
    }

    public function actionPdf()
    {
        // Query data dari database
        $data = Yii::$app->db->createCommand('
        SELECT tr_registrasi.waktu_registrasi, tr_registrasi.no_registrasi, tr_rekam_medis.no_rekam_medis, 
        tr_pasien.nama_pasien, tr_pasien.jenis_kelamin, tr_pasien.tanggal_lahir, 
        tr_registrasi.jenis_registrasi, tr_rekam_medis.jenis_layanan, master_pembayaran.jenis_pembayaran, 
        tr_registrasi.status, tr_rekam_medis.waktu_mulai, tr_rekam_medis.waktu_selesai, 
        master_petugas.nama_petugas 
        FROM tr_pasien INNER JOIN tr_rekam_medis ON tr_pasien.id_pasien = tr_rekam_medis.id_pasien 
        INNER JOIN tr_registrasi ON tr_pasien.id_pasien = tr_registrasi.id_pasien 
        INNER JOIN master_pembayaran ON master_pembayaran.id_pasien = tr_pasien.id_pasien 
        INNER JOIN master_petugas ON master_pembayaran.id_petugas = master_petugas.id_petugas 
        AND master_pembayaran.no_rekam_medis = tr_rekam_medis.no_rekam_medis;
    ')->queryAll();

        // Konfigurasi TCPDF
        $pdf = new Pdf([
            // Nama file PDF yang akan dihasilkan
            'filename' => 'Export PDF.pdf',
            // Ukuran dan orientasi halaman
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // Konfigurasi margin
            'marginLeft' => 15,
            'marginRight' => 15,
            'marginTop' => 16,
            'marginBottom' => 16,
            // Konfigurasi header dan footer
            'options' => [
                'title' => 'Export PDF',
            ],
            'methods' => [
                'SetHeader' => ['Export PDF'],
                'SetFooter' => ['{PAGENO}'],
            ],
        ]);

        // Mengisi konten PDF dengan data dari database
        $pdf->content = $this->renderPartial('_pdf', ['data' => $data]);

        // Menghasilkan file PDF
        return $pdf->render();
    }

    /**
     * Finds the Masterpembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pembayaran Id Pembayaran
     * @return Masterpembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pembayaran)
    {
        if (($model = Masterpembayaran::findOne(['id_pembayaran' => $id_pembayaran])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
