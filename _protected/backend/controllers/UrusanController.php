<?php

namespace backend\controllers;

use common\models\OpdSearch;
use common\models\UrusanOpd;
use Yii;
use common\models\Urusan;
use common\models\UrusanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UrusanController implements the CRUD actions for Urusan model.
 */
class UrusanController extends BackendController
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
     * Lists all Urusan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UrusanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Urusan model.
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
     * Creates a new Urusan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Urusan();
        $model->loadDefaultValues();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                // Safe Urusan_OPD
                if (count($model->opds) > 0) {
                    foreach ($model->opds as $row) {
                        $oldData = UrusanOpd::find()->where(['urusan_id' => $model->id, 'opd_id' => $row])->all(); // this line is for redundancy checking
                        if ($oldData == null) { // if no redundancy
                            $urusanOpd = new UrusanOpd();
                            $urusanOpd->opd_id = $row;
                            $urusanOpd->urusan_id = $model->id;
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
     * Updates an existing Urusan model.
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
                if (count($model->opds) > 0) {
                    foreach ($model->opds as $row) {
                        $oldData = UrusanOpd::find()->where(['urusan_id' => $model->id, 'opd_id' => $row])->all(); // this line is for redundancy checking
                        if ($oldData == null) { // if no redundancy
                            $urusanOpd = new UrusanOpd();
                            $urusanOpd->opd_id = $row;
                            $urusanOpd->urusan_id = $model->id;
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
     * Deletes an existing Urusan model.
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
     * Finds the Urusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Urusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Urusan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPicker()
    {
        $searchModel = new UrusanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        $dataProvider->pagination->pageSize = 10;
        return $this->renderAjax('picker', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


}
