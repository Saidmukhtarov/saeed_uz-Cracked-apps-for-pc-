<?php
/* @var $oscatHeader  */
use yii\helpers\Url;
?>
<?php foreach($oscatHeader as $oscategoryHeader): ?>
<li><a style="color: #666;" href="<?= Url::to(['filessaid/category-def?cat_id=' . $oscategoryHeader->id]) ?>"><?= $oscategoryHeader->title ?></a></li>
<?php endforeach; ?>