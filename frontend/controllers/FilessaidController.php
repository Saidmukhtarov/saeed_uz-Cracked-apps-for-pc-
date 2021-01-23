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
    public function actionIndex()
    {
        $query = FilesSaid::find()->where(['status' => 1]);
        $searchModel = new FilessaidSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $countQuery = clone $query;
        $pagination = new Pagination(['totalCount'=>$countQuery->count(),'pageSize' => 6]);
        $os = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDownload($id)
    {
        $model = $this->findModel($id);
        $file = Yii::getAlias('@frontend/web/os_files/' . $model->os_file);
        return Yii::$app->response->sendFile($file); 
    }

    public function actionCategory7()
    {
        return $this->render('category7');
    }
    public function actionCategory8()
    {
        return $this->render('category8');
    }
    public function actionCategory9()
    {
        return $this->render('category9');
    }
    public function actionCategory10()
    {
        return $this->render('category10');
    }
    public function actionCategory11()
    {
        return $this->render('category11');
    }
    public function actionCategory12()
    {
        return $this->render('category12');
    }
    public function actionCategory13()
    {
        return $this->render('category13');
    }
    public function actionCategory14()
    {
        return $this->render('category14');
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
