<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\blogWidget;
use common\models\OsCategory;
use frontend\widgets\oscategoryWidget;
use frontend\controllers\FilessaidController;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- fav and touch icons -->
  <link rel="shortcut icon" href="../../assets1/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets1/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets1/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets1/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets1/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<?php $this->beginBody() ?>

<!-- ======= Header ======= -->
<header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          <a class="brand logo" href="/"><img src="../../assets1/ico/favicon.png" style="width: 70px;" alt=""></a>
          <!-- end logo -->
          <!-- top menu -->

          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <li class="dropdown">
                  <a style="color: #666;" href="/">Главная</a>
                </li>
                <li>
                  <a style="color: #666;" href="<?= Url::to(['wallpapers/index']) ?>">Обои</a>
                </li>
                <li class="dropdown">
                  <a style="color: #666;" href="<?= Url::to(['filessaid/index']); ?>">Проги для ПК</a>
                  <ul class="dropdown-menu">
                    <?= oscategoryWidget::widget() ?>                                        
                  </ul>
                </li>
                <li>
                  <a style="color: #666;" href="<?= Url::to(['blog/index']) ?>">IT-Блог</a>
                </li>
                <li>
                  <a href="<?= Url::to(['filessaid/category13']) ?>">Веб Шаблоны</a>
                </li>
                <li>
                  <a style="color: #666;" href="<?= Url::to(['site/contact']) ?>">Контакты</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>
 <!-- End Header -->



        <?= $content ?>


        
<!-- ======= Footer ======= -->

<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget">
            <h5>Менью</h5>
            <ul class="regular">
              <li><a href="/">Главная</a></li>
              <li><a href="<?= Url::to(['wallpapers/index']) ?>">Обои</a></li>
              <li><a href="<?= Url::to(['filessaid/index']); ?>">Проги для ПК</a></li>
              <li><a href="<?= Url::to(['blog/index']) ?>">IT-Блог</a></li>
              <li><a href="<?= Url::to(['filessaid/category13']) ?>">Веб Шаблоны</a></li>
              <li><a href="<?= Url::to(['site/contact']) ?>">Контакты</a></li>
            </ul>
          </div>
        </div>
        <div class="span4">
          <div class="widget">
            <h5>Последние посты в блоге</h5>
            <ul class="regular">
              <?= blogWidget::widget(['layoutType' => 'footer', 'postCount' => 5]) ?>
            </ul>
          </div>
        </div>
        <div class="span4">
          <div class="widget">
            <!-- logo -->
            <a class="brand logo" href="/">
              <img style="width: 70px;" src="../../assets1/ico/favicon.png" alt="">
            </a>
            <!-- end logo -->
            <address>
              <strong>Saeed_UZ</strong><br>
               Узбекистан, г.Ташкент, Сергелийский р-н<br>
              <abbr title="Телефон">Т:</abbr> +998 90 941 85 66
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              &copy; Saeed_UZ <?= date('Y') ?>
            </p>
          </div>
          <div class="span6">
            <div class="credits">
              @Saidmukhtarov_Official  
           </div>
          </div>
        </div>
      </div>
    </div>
  </footer>




  <!-- End Footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
