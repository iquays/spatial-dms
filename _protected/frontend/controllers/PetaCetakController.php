<?php

namespace frontend\controllers;

use common\models\Urusan;
use Yii;
use common\models\PetaCetak;
use common\models\PetaCetakSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PetaCetakController implements the CRUD actions for PetaCetak model.
 */
class PetaCetakController extends Controller
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

        $urusans = Urusan::find()->orderBy('nama')->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'urusans' => $urusans
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
     * Displays aall PetaCetak for Urusan.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUrusan($id)
    {
        $urusan = Urusan::findOne($id);

        return $this->render('urusan', [
            'urusan' => $urusan,
        ]);
    }

    /**
     * Displays aall PetaCetak for Urusan.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSearch()
    {
        $searchModel = new PetaCetakSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $keyword = $_GET['PetaCetakSearch']['nama'];

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'keyword' => $keyword
        ]);
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
