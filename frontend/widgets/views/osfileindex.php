<?php
/* @var $osfiles  */
use yii\helpers\Url;

?>
<?php foreach($osfiles as $osfile): ?>
<div style="height: 350px;" class="span3">
    <div class="post-image">
        <a href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>">
          <img src=<?= "/img/" . $osfile->image ?> alt="<?= $osfile->name ?>">
        </a>
    </div>
    <div class="entry-meta">
        <i style="cursor: default;" class="icon-square icon-48 icon-picture left"></i>
        <span style="font-size: 10px;" class="date"><?= date('d M Y', $osfile->created_at) ?>
      	</span>
    </div>
    <!-- end .entry-meta -->
    <div class="entry-body">
        <a href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>">
            <h4 class="title" style="font-weight: bolder; word-break: break-all;"><?= mb_substr($osfile->name, 0, 20) . ' ...'; ?></h4>
        </a>
        <p>
           	<?= mb_substr($osfile->description, 0, 50).' ...'; ?>
        </p>
        <div style="margin-bottom: 20px;">
            <a class="btn btn-success pull-right" href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>">Читать больше &raquo;</a>
        </div>            
    </div>
    <!-- end .entry-body -->
    <div class="clear">
    </div>
</div>
<?php endforeach; ?>
