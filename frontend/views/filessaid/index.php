<?php

use yii\grid\GridView;

use yii\widgets\LinkPager;
use yii\bootstrap4\ActiveForm;

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\FilesSaid;
use frontend\widgets\osfilesWidget;
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
              <h3 style="color: #666;">Все софты</h3>
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
          <?= osfilesWidget::widget(['layoutType' => 'filessaid']); ?>
          <!-- end article 1 -->
          <div class="pagination">
            <ul>
              <li><a href="#">Prev</a></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </div>
        </div>
        <div class="span4">
          <aside>
            <div class="widget">
              <form class="form-search">
                <input placeholder="Type something" type="text" class="input-medium search-query">
                <button type="submit" class="btn btn-flat btn-color">Search</button>
              </form>
            </div>
            <div class="widget">
              <h4>Categories</h4>
              <ul class="cat">
                <li><a href="#">Web design (114)</a></li>
                <li><a href="#">Internet news (15)</a></li>
                <li><a href="#">Tutorial and tips (20)</a></li>
                <li><a href="#">Design trends (15)</a></li>
                <li><a href="#">Online business (10)</a></li>
              </ul>
            </div>
            <div class="widget">
              <h4>Recent posts</h4>
              <ul class="recent-posts">
                <li><a href="#">Lorem ipsum dolor sit amet munere commodo ut nam</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 4 Comments</span>
                </li>
                <li><a href="#">Sea nostrum omittantur ne mea malis nominavi insolens</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 2 Comments</span>
                </li>
                <li><a href="#">Eius graece recusabo no pri odio tale quo id, mea at saepe</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 4 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 12 Comments</span>
                </li>
                <li><a href="#">Malorum deserunt at nec usu ad graeco elaboraret at rebum</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 3 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 3 Comments</span>
                </li>
              </ul>
            </div>
            <div class="widget">
              <h4>Tags</h4>
              <ul class="tags">
                <li><a href="#" class="btn">Tutorial</a></li>
                <li><a href="#" class="btn">Tricks</a></li>
                <li><a href="#" class="btn">Design</a></li>
                <li><a href="#" class="btn">Trends</a></li>
                <li><a href="#" class="btn">Online</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>