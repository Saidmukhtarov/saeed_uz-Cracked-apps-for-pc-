<?php 
/* @var $osfiles  */
use yii\helpers\Url;
?>
<?php foreach($osfiles as $osfile): ?>
<li><a href="<?= Url::to(['filessaid/view', 'id' => $osfile->id]) ?>"><?= mb_substr($osfile->name, 0, 50)?></a>
    <div class="clear">
    </div>
    <span class="date"><i class="icon-calendar"></i> <?= date('d M Y', $osfile->created_at) ?></span>
    <span class="comment"><i class="icon-comment"></i>Comments</span>
</li>
<?php endforeach; ?>