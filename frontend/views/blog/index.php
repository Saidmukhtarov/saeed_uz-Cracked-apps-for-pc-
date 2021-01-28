<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use common\models\FilesSaid;
use frontend\widgets\osfilesWidget;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'IT Блог';
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666;"><?= $this->title; ?></h3>
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
          <?php foreach($blog as $blogs): ?>
<article class="blog-post">
            <div class="post-heading">
              <h3><a href="<?= Url::to(['blog/view', 'id' => $blogs->id]) ?>"><?= $blogs->title; ?></a></h3>
            </div>
            <div class="row">
              <div class="span3">
                <div class="post-image">
                  <a href="<?= Url::to(['blog/view', 'id' => $blogs->id]) ?>"><img src="<?= '/blog_img/' . $blogs->image; ?>" alt="<?= $blogs->title; ?>" /></a>
                </div>
              </div>
              <div class="span5">
                <ul class="post-meta">
                  <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $blogs->created_at) ?></span></li>
                  <li><i class="icon-list-alt"></i><span><a href="#">Comments</a></span></li>
                  <li class="last"><i class="icon-tags"></i><span><a href="#">Category</a></span></li>
                </ul>
                <div class="clearfix">
                </div>
                <p>
                  <?= mb_substr($blogs->body, 0, 300) . ' ...' ?>
                </p>
                            <a class="btn btn-success pull-right" href="<?= Url::to(['blog/view', 'id' => $blogs->id]) ?>">Читать больше &raquo;</a>

              </div>
            </div>
          </article>
          <?php endforeach; ?>
          <!-- end article 1 -->
          <div class="pagination">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
          </div>
        </div>
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Categories</h4>
              <ul class="cat">
                <?php foreach ($categories as $single_category):?>
                      <li><a href="<?= Url::to(['filessaid/category-def', 'cat_id' => $single_category->id]) ?>"><?=$single_category->title.' ('.$single_category->filecount?>)</a></li>
                  <?php endforeach;?>
              </ul>
            </div>
            <div class="widget">
              <h4>Последние софты</h4>
              <ul class="recent-posts">
               <?= osfilesWidget::widget(['layoutType' => 'filessaid', 'postCount' => 4]) ?>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>