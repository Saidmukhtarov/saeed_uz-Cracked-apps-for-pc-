<?php

use yii\grid\GridView;

use yii\widgets\LinkPager;
use yii\bootstrap4\ActiveForm;

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\FilesSaid;
use common\models\Blog;
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
          <?php foreach($os as $osfile): ?>
<article class="blog-post">
            <div class="post-heading">
              <h3><a href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>"><?= $osfile->name; ?></a></h3>
            </div>
            <div class="row">
              <div class="span3">
                <div class="post-image">
                  <a href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>"><img src="<?= '/img/' . $osfile->image; ?>" alt="<?= $osfile->name; ?>" /></a>
                </div>
              </div>
              <div class="span5">
                <ul class="post-meta">
                  <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $osfile->created_at) ?></span></li>
                  <li><i class="icon-list-alt"></i><span><a href="#">Comments</a></span></li>
                  <li class="last"><i class="icon-tags"></i><span><a href="#">Category</a></span></li>
                </ul>
                <div class="clearfix">
                </div>
                <p>
                  <?= mb_substr($osfile->description, 0, 300) . ' ...' ?>
                </p>
                            <a class="btn btn-success pull-right" href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>">Читать больше &raquo;</a>

              </div>
            </div>
          </article>
<?php endforeach; ?>
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
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
          </div>
        </div>
        <div class="span4">
          <aside>
            <div class="widget">
              <form class="form-search">
                <input placeholder="Введите что-либо" type="text" class="input-medium search-query">
                <button type="submit" style="color: #666;" class="btn btn-flat btn-color">Поиск</button>
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