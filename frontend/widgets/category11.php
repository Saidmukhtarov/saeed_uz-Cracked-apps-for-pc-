<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\FilesSaid;

class category11 extends Widget {
    public $layoutType = 'standart';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }
    public function run()
    {
        $category7 = FilesSaid::find()->select('name, image, id, description, os_file, created_at')->orderBy('created_at DESC')->where(['status' => 1])->where(['category' => 11])->all();
        if ($this->layoutType == 'standart'){
            $view = 'cat7View';
        }
        return $this->render($view,[
            'category7' => $category7,
        ]);
    }
}