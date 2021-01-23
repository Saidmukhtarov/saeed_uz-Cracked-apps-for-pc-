<?php
/* @var $wallpapers  */
use yii\helpers\Url;

?>
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
<!-- end article 1 -->