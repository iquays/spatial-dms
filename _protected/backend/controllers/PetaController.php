<?php

namespace backend\controllers;

use Yii;
use common\models\Peta;
use common\models\PetaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PetaController implements the CRUD actions for Peta model.
 */
class PetaController extends BackendController
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
     * Lists all Peta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PetaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peta model.
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
     * Creates a new Peta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peta();
        $model->versi_peta = 1;
        if (Yii::$app->user->can('adminOpd')) {
            $model->opd_id = Yii::$app->user->identity->opd_id;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->id = Yii::$app->db->createCommand("SELECT NEXTVAL('peta_id_seq')")->queryScalar();
            $file = $model->uploadFile();

            if ($model->save()) {
                // Save the file
                if ($file) {
                    $path = $model->getFile();
//                    Yii::$app->session->setFlash('info', $path);
                    $file->saveAs($path);

                    $zip = new \ZipArchive;
                    $res = $zip->open($path);
                    if ($res === TRUE) {
                        $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $model->nama_file);
                        $extractedFileLoc = $model->getLoc() . $filename . '/';
                        $zip->extractTo($extractedFileLoc);
                        $zip->close();

                        // create table for map layer
                        $model->nama_tabel = 'z' . $model->id . '_' . $model->versi_peta . '_' . strtolower(preg_replace('/\s+/', '_', $model->nama));
//                                    $createTableCommand = "/usr/local/bin/shp2pgsql " . $extractedFileLoc . "*.shp " . $modelMapLayerVersion->tablename . " | /usr/local/bin/psql -p 5432 -d sitr -U sitr";
//                                    $createTableCommand = "/usr/local/bin/shp2pgsql -s 2100 /Volumes/Data/wwwroot/sitr/backend/uploads/kabupaten.shp kabupaten | /usr/local/bin/psql -h localhost -p 5432 -d sitr -U sitr 2>&1";
                        $createTableCommand = "/usr/local/bin/uploadshp.sh " . $extractedFileLoc . " " . $model->nama_tabel;
                        Yii::$app->session->setFlash('info', $createTableCommand);
                        exec($createTableCommand, $out, $ret);
                        Yii::$app->session->setFlash('info', $ret);
                        echo "<script>console.log('hello')</script>";
                        $model->update(false);
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
     * Updates an existing Peta model.
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
            $model->versi_peta++;
            $file = $model->uploadFile();

            if ($file === false) {
                $model->nama_file = $oldFileName;
            }

            if ($model->save()) {
                // delete old and overwrite
                if ($file) {
                    $path = $model->getFile();
                    $file->saveAs($path);

                    $zip = new \ZipArchive;
                    $res = $zip->open($path);
                    if ($res === TRUE) {
                        $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $model->nama_file);
                        $extractedFileLoc = $model->getLoc() . $filename . '/';
                        $zip->extractTo($extractedFileLoc);
                        $zip->close();

                        // create table for map layer
                        $model->nama_tabel = 'z' . $model->id . '_' . $model->versi_peta . '_' . strtolower(preg_replace('/\s+/', '_', $model->nama));
//                                    $createTableCommand = "/usr/local/bin/shp2pgsql " . $extractedFileLoc . "*.shp " . $modelMapLayerVersion->tablename . " | /usr/local/bin/psql -p 5432 -d sitr -U sitr";
//                                    $createTableCommand = "/usr/local/bin/shp2pgsql -s 2100 /Volumes/Data/wwwroot/sitr/backend/uploads/kabupaten.shp kabupaten | /usr/local/bin/psql -h localhost -p 5432 -d sitr -U sitr 2>&1";
                        $createTableCommand = "/usr/local/bin/uploadshp.sh " . $extractedFileLoc . " " . $model->nama_tabel;
                        Yii::$app->session->setFlash('info', $createTableCommand);
                        exec($createTableCommand, $out, $ret);
                        Yii::$app->session->setFlash('info', $ret);
                        echo "<script>console.log('hello')</script>";
                        $model->update(false);
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
     * Deletes an existing Peta model.
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

    public function actionTest()
    {
        $createTableCommand = "/usr/local/bin/uploadshp.sh /var/www/html/backend/uploads/peta/9_6_Faskes_/ z_test2";
        exec($createTableCommand, $out, $ret);

        echo $ret;
    }

    /**
     * Finds the Peta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
