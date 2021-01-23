<?php
/* @var $blogs  */
use yii\helpers\Url;

?>
<?php foreach($blog as $blogs): ?>
<li><a href="<?= Url::to(['blog/view', 'id' => $blogs->id]) ?>"><?= mb_substr($blogs->title, 0, 40) . '...' ?></a></li>
<?php endforeach; ?>