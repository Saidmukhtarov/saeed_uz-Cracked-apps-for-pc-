<?php

namespace backend\controllers;

use Yii;
use common\models\Blog;
use common\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadFile;
use yii\web\UploadedFile;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
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
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
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
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new Blog();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }
        public function actionCreate()
    {
        $model = new Blog();

        
        if ($model->load(Yii::$app->request->post())) {
            $time = time();
            $user = Yii::$app->user->identity->username;

            $model->created_at = $time;
            $model->updated_at = $time;

            $model->created_by = $user;
            $model->updated_by = $user;

            // $model->old_file = "none";

            function uploadBlogimg($blogimgFieldName,$dbFieldName,$model){
                $time = time();
                $blog_img = UploadedFile::getInstance($model,$blogimgFieldName);
                if(!empty($blog_img)) {
                    if (!$blog_img->saveAs('blog_img/' . $time . '-' . $blogimgFieldName . '.' . $blog_img->extension)) {
                        var_dump($wallpaper->saveAs('blog_img/' . $time . '-' . $blogimgFieldName . '.' . $blog_img->extension));
                    }
                    $model->$dbFieldName = $time . '-' . $blogimgFieldName . '.' . $blog_img->extension;
                }
                 else{
                     $model->$dbFieldName = 'default.png';
                 }
            }
            uploadBlogimg('image', 'image', $model);

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
     * Updates an existing Blog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $time = time();
            $user = Yii::$app->user->identity->username;
            $model->updated_at = $time;
            $model->updated_by = $user;

            $image = UploadedFile::getInstance($model, 'image');
            if (!empty($image)) {
                if (!$image->saveAs('blog_img/' . $time . '.' . $image->extension)) {
                    var_dump($image->saveAs('blog_img/' . $time . '.' . $image->extension));
                }
                $model->image = $time . '.' . $image->extension;
            } else {
                $model->image = $oldImage;
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
        ]);
    }

    /**
     * Deletes an existing Blog model.
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
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
