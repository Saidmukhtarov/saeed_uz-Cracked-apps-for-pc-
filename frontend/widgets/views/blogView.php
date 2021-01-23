<?php
/* @var $blogs  */
use yii\helpers\Url;

?>
<?php foreach($blog as $blogs): ?>
<li><a href="<?= Url::to(['blog/view', 'id' => $blogs->id]) ?>"><?= mb_substr($blogs->title, 0, 50) . '...' ?></a>
    <div class="clear">
    </div>
    <span class="date"><i class="icon-calendar"></i> <?= date('d M Y', $blogs->created_at) ?></span>
    <span class="comment"><i class="icon-comment"></i>Comments</span>
</li>


<?php endforeach; ?>