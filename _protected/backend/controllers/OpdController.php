<?php

namespace backend\controllers;

use app\models\LecturerSearch;
use common\models\UrusanOpd;
use Yii;
use common\models\Opd;
use common\models\OpdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OpdController implements the CRUD actions for Opd model.
 */
class OpdController extends BackendController
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
     * Lists all Opd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Opd model.
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
     * Creates a new Opd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Opd();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                // Safe Urusan_OPD
                if (count($model->urusans) > 0) {
                    foreach ($model->urusans as $row) {
                        $oldData = UrusanOpd::find()->where(['urusan_id' => $row, 'opd_id' => $model->id])->all(); // this line is for redundancy checking
                        if ($oldData == null) { // if no redundancy
                            $urusanOpd = new UrusanOpd();
                            $urusanOpd->opd_id = $model->id;
                            $urusanOpd->urusan_id = $row;
                            $urusanOpd->save();
                        }
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Opd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                // Delete all previous OPDs --> for refreshing data
                foreach ($model->urusanOpds as $urusanOpd) {
                    $urusanOpd->delete();
                }
                // Safe Urusan_OPD
                if (count($model->urusans) > 0) {
                    foreach ($model->urusans as $row) {
                        $oldData = UrusanOpd::find()->where(['urusan_id' => $row, 'opd_id' => $model->id])->all(); // this line is for redundancy checking
                        if ($oldData == null) { // if no redundancy
                            $urusanOpd = new UrusanOpd();
                            $urusanOpd->opd_id = $model->id;
                            $urusanOpd->urusan_id = $row;
                            $urusanOpd->save();
                        }
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Opd model.
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
     * Finds the Opd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Opd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Opd::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPicker()
    {
        $searchModel = new OpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        $dataProvider->pagination->pageSize = 10;
        return $this->renderAjax('picker', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

}
