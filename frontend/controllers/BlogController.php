<?php

namespace frontend\controllers;

use Yii;
use common\models\Blog;
use common\models\BlogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\FilesSaid;
use common\models\OsCategory;
use yii\filters\VerbFilter;
use yii\web\UploadFile;
use yii\web\UploadedFile;
use yii\data\Pagination;
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
    public function actionIndex($cat_id = null)
    {
        $query = Blog::find();
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $countQuery = clone $query;
        $pagination = new Pagination(['totalCount'=>$countQuery->count(),'pageSize' => 6]);
        $blog = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('created_at DESC')
            ->all();
        $category = FilesSaid::find()->select('name, image, id, description, os_file, created_at')->orderBy('created_at DESC')->where(['status' => 1])->where(['category' => $cat_id])->all();
        $categories = OsCategory::find()->where(['status' =>1])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagination' => $pagination,
            'blog' => $blog,
            'category_object' => $category,
            'categories' => $categories,
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $cat_id = null)
    {
        $category = FilesSaid::find()->select('name, image, id, description, os_file, created_at')->orderBy('created_at DESC')->where(['status' => 1])->where(['category' => $cat_id])->all();
        $categories = OsCategory::find()->where(['status' =>1])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'category_object' => $category,
            'categories' => $categories,
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
