<?php

namespace frontend\controllers;

use Yii;
use common\models\FilesSaid;
use common\models\OsCategory;
use common\models\FilessaidSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadFile;
use yii\web\UploadedFile;
use yii\data\Pagination;

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
    public function actionIndex($cat_id = null)
    {
        $query = FilesSaid::find()->where(['status' => 1]);
        $searchModel = new FilessaidSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $category = FilesSaid::find()->select('name, image, id, description, os_file, created_at')->orderBy('created_at DESC')->where(['status' => 1])->where(['category' => $cat_id])->all();
        $categories = OsCategory::find()->where(['status' =>1])->all();
        $countQuery = clone $query;
        $pagination = new Pagination(['totalCount'=>$countQuery->count(),'pageSize' => 6]);
        $os = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'category_object' => $category,
            'categories' => $categories,
            'os' => $os,
            'searchModel' => $searchModel,
            'pagination' => $pagination,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilesSaid model.
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

    public function actionDownload($id)
    {
        $model = $this->findModel($id);
        $file = Yii::getAlias('@frontend/web/os_files/' . $model->os_file);
        return Yii::$app->response->sendFile($file); 
    }

    public function actionCategoryDef($cat_id = null)
    {
        $category = FilesSaid::find()->select('name, image, category, id, description, os_file, created_at')->orderBy('created_at DESC')->where(['status' => 1])->where(['category' => $cat_id])->all();
        $categories = OsCategory::find()->where(['status' =>1])->all();
        return $this->render('category_def', [
            'category_object' => $category,
            'categories' => $categories
        ]);
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
