<?php 
use yii\helpers\Url;
use common\models\FilesSaid;
use common\models\Blog;
use frontend\widgets\blogWidget;
$this->title = $model->name;
\yii\web\YiiAsset::register($this);

 ?>
 <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666;"><?= $model->name ?></h3>
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
          <!-- start article full post -->
          <article class="blog-post">
            <div class="post-heading">
              <h3></h3>
            </div>
            <div class="clearfix">
            </div>
            <img src="<?= '/img/' . $model->image ?>" alt="<?= $model->name ?>" />
            <ul class="post-meta">
              <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $model->created_at) ?></span></li>
              <li><i class="icon-list-alt"></i><span><a href="#">Comments</a></span></li>
              <li class="last"><i class="icon-tags"></i><span><a href="#">Category</a></span></li>
            </ul>
            <div class="clearfix">
            </div>
            <p>
              <?= $model->description ?>
            </p>
            <a style="font-weight: bolder;" class="btn btn-success" href="<?= Url::to(['filessaid/download/' . $model->id]) ?>">Скачать &DownArrowBar;</a>
          </article>
          <!-- end article full post -->
          <h4>Комментарии</h4>
          <ul class="media-list">
            <li class="media">
              <div class="media-body">
                <h5 class="media-heading">John doe</h5>
                <span style="color: #666;">3 March, 2013</span>
                <p>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </p>
              </div>
            </li>
            
          </ul>
          <div class="comment-post">
            <h4>Leave a comment</h4>
            <form action="#" method="post" class="comment-form" name="comment-form">
              <div class="row">
                <div class="span3">
                  <label>Name <span>*</span></label>
                  <input type="text" class="input-block-level" placeholder="Your name" />
                </div>
                <div class="span3">
                  <label>Email <span>*</span></label>
                  <input type="text" class="input-block-level" placeholder="Your email" />
                </div>
                <div class="span8">
                  <label>Comment <span>*</span></label>
                  <textarea rows="9" class="input-block-level" placeholder="Your comment"></textarea>
                  <button class="btn btn-small btn-success" type="submit">Submit comment</button>
                </div>
              </div>
            </form>
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