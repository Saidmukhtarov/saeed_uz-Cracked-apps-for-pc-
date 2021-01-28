<?php

namespace backend\controllers;

use Yii;
use common\models\FilesSaid;
use common\models\FilessaidSearch;
use common\models\OsCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadFile;
use yii\helpers\ArrayHelper;
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

    public function actionIndex()
    {
        $searchModel = new FilessaidSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

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

    public function actionCreate()
    {
        $model = new FilesSaid();
        $oscat = OsCategory::find()->all();
        $oscatList = ArrayHelper::map($oscat, 'id', 'title');

        
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
            'oscatList' => $oscatList,
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oscat = OsCategory::find()->all();
        $oscatList = ArrayHelper::map($oscat, 'id', 'title');
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
            'oscatList' => $oscatList,
            'oldImage' => $oldImage,
            'oldFile' => $oldFile,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = FilesSaid::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
