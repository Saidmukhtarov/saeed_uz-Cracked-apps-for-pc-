<?php

namespace backend\controllers;

use Yii;
use common\models\FilesSaid;
use common\models\FilessaidSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadFile;
use yii\web\UploadedFile;

/**
 * FilessaidController implements the CRUD actions for FilesSaid model.
 */
class FilessaidController extends Controller
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
     * Lists all FilesSaid models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilessaidSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilesSaid model.
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

    public function actionDownload($id)
    {
        $model = $this->findModel($id);
        $file = Yii::getAlias('@backend/web/os_files/' . $model->os_file);
        return Yii::$app->response->sendFile($file); 
    }



    // public function actionDownload($id)
    // {
    //     $data = FilesSaid::findOne($id);
    //     header('Content-Type:'.pathinfo($data->filepath, PATHINFO_EXTENSION));
    //     header('Content-Disposition: attachment; filename=' . $data->filename);
    //     return readfile($data->filepath);
    // }




    /**
     * Creates a new FilesSaid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new FilesSaid();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }
        
    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }
public function actionCreate()
    {
        $model = new FilesSaid();

        
        if ($model->load(Yii::$app->request->post())) {
            $time = time();
            $user = Yii::$app->user->identity->username;

            $model->created_at = $time;
            $model->updated_at = $time;

            $model->created_by = $user;
            $model->updated_by = $user;

            // $model->old_file = "none";

            function uploadFile($os_fileFieldName,$dbFieldName,$model){
                $time = time();
                $osfile = UploadedFile::getInstance($model,$os_fileFieldName);
                if(!empty($osfile)) {
                    if (!$osfile->saveAs('os_files/' . $time . '-' . $os_fileFieldName . '.' . $osfile->extension)) {
                        var_dump($osfile->saveAs('os_files/' . $time . '-' . $os_fileFieldName . '.' . $osfile->extension));
                    }
                    $model->$dbFieldName = $time . '-' . $os_fileFieldName . '.' . $osfile->extension;
                }
                // else{
                //     $model->$dbFieldName = 'default.jpg';
                // }
            }

            function uploadImage($imageFieldName,$dbFieldName,$model){
                $time = time();
                $image = UploadedFile::getInstance($model,$imageFieldName);
                if(!empty($image)) {
                    if (!$image->saveAs('img/' . $time . '-' . $imageFieldName . '.' . $image->extension)) {
                        var_dump($image->saveAs('img/' . $time . '-' . $imageFieldName . '.' . $image->extension));
                    }
                    $model->$dbFieldName = $time . '-' . $imageFieldName . '.' . $image->extension;
                }
                 else{
                     $model->$dbFieldName = 'default.png';
                 }
            }
            uploadFile('os_file','os_file',$model);
            uploadImage('image', 'image', $model);

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                var_dump($model->errors);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing FilesSaid model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;
        $oldFile = $model->os_file;
        if ($model->load(Yii::$app->request->post())) {
            $time = time();
            $user = Yii::$app->user->identity->username;
            $model->updated_at = $time;
            $model->updated_by = $user;

            $image = UploadedFile::getInstance($model, 'image');
            if (!empty($image)) {
                if (!$image->saveAs('img/' . $time . '.' . $image->extension)) {
                    var_dump($image->saveAs('img/' . $time . '.' . $image->extension));
                }
                $model->image = $time . '.' . $image->extension;
            } else {
                $model->image = $oldImage;
            }

            $os_file = UploadedFile::getInstance($model, 'os_file');
            if (!empty($os_file)) {
                if (!$os_file->saveAs('os_files/' . $time . '.' . $os_file->extension)) {
                    var_dump($os_file->saveAs('os_files/' . $time . '.' . $os_file->extension));
                }
                $model->os_file = $time . '.' . $os_file->extension;
            } else {
                $model->os_file = $oldFile;
            }

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                var_dump($model->errors);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'oldImage' => $oldImage,
            'oldFile' => $oldFile,
        ]);
    }

    /**
     * Deletes an existing FilesSaid model.
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
     * Finds the FilesSaid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FilesSaid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FilesSaid::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
