<?php

namespace backend\controllers;

use Yii;
use common\models\PetaCetak;
use common\models\PetaCetakSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PetaCetakController implements the CRUD actions for PetaCetak model.
 */
class PetaCetakController extends BackendController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PetaCetak models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PetaCetakSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PetaCetak model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PetaCetak model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PetaCetak();
        if (Yii::$app->user->can('adminOpd')) {
            $model->opd_id = Yii::$app->user->identity->opd_id;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->id = Yii::$app->db->createCommand("SELECT NEXTVAL('peta_cetak_id_seq')")->queryScalar();
            $file = $model->uploadFile();

            if ($model->save()) {
                // Save the file
                if ($file) {
                    $path = $model->getFile();
                    $file->saveAs($path);
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PetaCetak model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldFile = $model->getFile();
        $oldFileName = $model->nama_file;
        if ($model->load(Yii::$app->request->post())) {
            $file = $model->uploadFile();

            if ($file === false) {
                $model->nama_file = $oldFileName;
            }

            if ($model->save()) {
                // delete old and overwrite
                if ($file) {
                    if (($oldFile !== null) && file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                    $path = $model->getFile();
                    $file->saveAs($path);
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PetaCetak model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PetaCetak model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PetaCetak the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PetaCetak::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
