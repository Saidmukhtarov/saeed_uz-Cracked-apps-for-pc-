<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Blog;

class blogWidget extends Widget {
    public $layoutType = 'standart';
    public $postCount = 4;
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }
    public function run()
    {
        $blog = Blog::find()->select('title, image, id, body, created_at')->limit($this->postCount)->orderBy('created_at DESC')->all();
        if ($this->layoutType == 'standart'){
            $view = 'blogView';
        }elseif ($this->layoutType == 'footer') {
            $view = 'blogFooterView';
        }

        return $this->render($view,[
            'blog' => $blog,
        ]);
    }
}