<?php
use common\models\Blog;
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\widgets\osfilesWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'IT Блог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
 <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666;"><?= $model->title ?></h3>
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
            <img src="<?= '/blog_img/' . $model->image ?>" alt="<?= $model->title ?>" />
            <ul class="post-meta">
              <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $model->created_at) ?></span></li>
              <li><i class="icon-list-alt"></i><span><a href="#">Comments</a></span></li>
              <li class="last"><i class="icon-tags"></i><span><a href="#">Category</a></span></li>
            </ul>
            <div class="clearfix">
            </div>
            <p>
              <?= $model->body ?>
            </p>
          </article>
          <!-- end article full post -->
          <h4>Comments</h4>
          <ul class="media-list">
            <li class="media">
              <a class="pull-left" href="#">
                <img class="media-object" src="assets/img/small-avatar.png" alt="" />
                </a>
              <div class="media-body">
                <h5 class="media-heading"><a href="#">John doe</a></h5>
                <span>3 March, 2013</span>
                <p>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </p>
                <a href="#">Reply</a>
                <!-- Nested media object -->
                <div class="media">
                  <a class="pull-left" href="#">
                        <img class="media-object" src="assets/img/small-avatar.png" alt="" />
                        </a>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="#">Tom slayer</a></h5>
                    <span>3 March, 2013</span>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </p>
                    <a href="#">Reply</a>
                    <!-- Nested media object -->
                    <div class="media">
                      <a class="pull-left" href="#">
                                <img class="media-object" src="assets/img/small-avatar.png" alt="" />
                                </a>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="#">Erick doe</a></h5>
                        <span>3 March, 2013</span>
                        <p>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </p>
                        <a href="#">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Nested media object -->
                <div class="media">
                  <a class="pull-left" href="#">
                        <img class="media-object" src="assets/img/small-avatar.png" alt="" />
                        </a>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="#">Jimmy doe</a></h5>
                    <span>3 March, 2013</span>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </p>
                    <a href="#">Reply</a>
                  </div>
                </div>
              </div>
            </li>
            <li class="media">
              <a class="pull-left" href="#">
                <img class="media-object" src="assets/img/small-avatar.png" alt="" />
                </a>
              <div class="media-body">
                <h5 class="media-heading"><a href="#">Mike sullivan</a></h5>
                <span>3 March, 2013</span>
                <p>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </p>
                <a href="#">Reply</a>
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
                <div class="span6">
                  <label>URL</label>
                  <input type="text" class="input-block-level" placeholder="Your website url" />
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
              <form class="form-search">
                <input placeholder="Введите что-либо" type="text" class="input-medium search-query">
                <button type="submit" class="btn btn-flat btn-color" style="color: #666;">Поиск</button>
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