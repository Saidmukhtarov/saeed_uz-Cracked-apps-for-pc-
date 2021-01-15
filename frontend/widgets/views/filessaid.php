<?php 
/* @var $osfiles  */
use yii\helpers\Url;
?>
<?php foreach($osfiles as $osfile): ?>
<article class="blog-post">
            <div class="post-heading">
              <h3><a href="#"><?= $osfile->name; ?></a></h3>
            </div>
            <div class="row">
              <div class="span3">
                <div class="post-image">
                  <a href="#"><img src="<?= '/img/' . $osfile->image; ?>" alt="<?= $osfile->name; ?>" /></a>
                </div>
              </div>
              <div class="span5">
                <ul class="post-meta">
                  <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $osfile->created_at) ?></span></li>
                  <li><i class="icon-list-alt"></i><span><a href="#">3 comments</a></span></li>
                  <li class="last"><i class="icon-tags"></i><span><a href="#">Design</a>, <a href="#">Blog</a>, <a href="#">Tutorial</a></span></li>
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