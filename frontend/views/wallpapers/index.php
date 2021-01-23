<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WallpapersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обои';
$this->params['breadcrumbs'][] = 'Обои';
?>
<section id="subintro" width="100%">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666">Обои</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
          <?php foreach($wallpapers as $wallpaper): ?>
        <!-- start article 1 -->
        <article class="blog-post">
          <div class="post-heading">
            <h3><a href="<?= "/wallpapers/" . $wallpaper->image; ?>"><?= $wallpaper->name ?></a></h3>
          </div>
          <div class="row">
            <div class="span8">
              <div class="post-image">
                <a href="<?= "/wallpapers/" . $wallpaper->image;?>"><img  width="100%" src="<?= "/wallpapers/" . $wallpaper->image ?>" alt="" /></a>
              </div>
            </div>
            <div class="span12">
              <ul class="post-meta">
                <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $wallpaper->created_at)?></span></li>
              </ul>
              <div class="clearfix">
              </div>
              <div style="margin-bottom: 20px;">
                    <a class="btn btn-success pull-left" href="<?= "/wallpapers/" . $wallpaper->image ?>">Полный размер &raquo;</a>
                </div>  
            </div>
          </div>
        </article>
        <?php endforeach; ?>
          <div class="pagination">
            <!-- <ul>
              <li><a href="#">Prev</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">Next</a></li>
            </ul> -->
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
          </div>
        </div>
    </div>
</div>
</section>