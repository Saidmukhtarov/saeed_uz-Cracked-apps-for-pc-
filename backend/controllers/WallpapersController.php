<?php

namespace backend\controllers;

use Yii;
use common\models\Wallpapers;
use common\models\WallpapersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadFile;
use yii\web\UploadedFile;

/**
 * WallpapersController implements the CRUD actions for Wallpapers model.
 */
class WallpapersController extends Controller
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
     * Lists all Wallpapers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WallpapersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wallpapers model.
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
     * Creates a new Wallpapers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Wallpapers();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionCreate()
    {
        $model = new Wallpapers();

        
        if ($model->load(Yii::$app->request->post())) {
            $time = time();
            $user = Yii::$app->user->identity->username;

            $model->created_at = $time;
            $model->updated_at = $time;

            $model->created_by = $user;
            $model->updated_by = $user;

            // $model->old_file = "none";

            function uploadWallpaper($wallpaperFieldName,$dbFieldName,$model){
                $time = time();
                $wallpaper = UploadedFile::getInstance($model,$wallpaperFieldName);
                if(!empty($wallpaper)) {
                    if (!$wallpaper->saveAs('wallpapers/' . $time . '-' . $wallpaperFieldName . '.' . $wallpaper->extension)) {
                        var_dump($wallpaper->saveAs('wallpapers/' . $time . '-' . $wallpaperFieldName . '.' . $wallpaper->extension));
                    }
                    $model->$dbFieldName = $time . '-' . $wallpaperFieldName . '.' . $wallpaper->extension;
                }
                 else{
                     $model->$dbFieldName = 'default.png';
                 }
            }
            uploadWallpaper('image', 'image', $model);

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
     * Updates an existing Wallpapers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wallpapers model.
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
     * Finds the Wallpapers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wallpapers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wallpapers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
