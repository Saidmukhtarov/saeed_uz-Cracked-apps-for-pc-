<?php
/* @var $cat7  */
use yii\helpers\Url;
use common\models\FilesSaid;

?>
<?php foreach($category7 as $osfile): ?>
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