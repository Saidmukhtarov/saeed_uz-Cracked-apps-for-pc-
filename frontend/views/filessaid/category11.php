<?php

use yii\grid\GridView;

use yii\widgets\LinkPager;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\FilesSaid;
use common\models\Blog;
use common\models\OsCategory;
use frontend\widgets\category11;
use frontend\widgets\blogWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Все софты');
$this->params['breadcrumbs'][] = $this->title;
?>
  <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666;">Web Разработка</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span8">
          <!-- start article 1 -->
          <?= category11::widget() ?>
          <!-- end article 1 -->
          <div class="pagination">
            <!-- <ul>
              <li><a href="#">Prev</a></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">Next</a></li>
            </ul> -->
            <?php //echo LinkPager::widget(['pagination' => $pagination]) ?>
          </div>
        </div>
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Categories</h4>
              <ul class="cat">
                <li><a href="<?= Url::to(['filessaid/category7']) ?>">Для фото и видео монтажеров</a></li>
                <li><a href="<?= Url::to(['filessaid/category8']) ?>">Оформления Windows</a></li>
                <li><a href="<?= Url::to(['filessaid/category9']) ?>">Безопасность</a></li>
                <li><a href="<?= Url::to(['filessaid/category10']) ?>">Текст</a></li>
                <li><a href="<?= Url::to(['filessaid/category11']) ?>">Web Разработка</a></li>
                <li><a href="<?= Url::to(['filessaid/category12']) ?>">Утилиты</a></li>
                <li><a href="<?= Url::to(['filessaid/category13']) ?>">Веб Шаблоны</a></li>
                <li><a href="<?= Url::to(['filessaid/category14']) ?>">Другие</a></li>
              </ul>
            </div>
            <div class="widget">
              <h4>Недавние Посты в IT Блоге</h4>
              <ul class="recent-posts">
                <?= blogWidget::widget() ?>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>