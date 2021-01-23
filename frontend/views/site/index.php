<?php

/* @var $this yii\web\View */
use frontend\widgets\osfilesWidget;
use yii\helpers\Url;


$this->title = 'Saeed_UZ';
?>
   <section id="intro">
    <div class="jumbotron masthead">
      <div class="container">
        <!-- slider navigation -->
        <div class="sequence-nav">
          <div class="prev">
            <span></span>
          </div>
          <div class="next">
            <span></span>
          </div>
        </div>
        <!-- end slider navigation -->
        <div class="row">
          <div class="span12">
            <div id="slider_holder">
              <div id="sequence">
                <ul>
                  <!-- Layer 1 -->
                  <li>
                    <div class="info animate-in">
                      <h2>Saeed_UZ</h2>
                      <br>
                      <h3>От Света исходит Тьма, а от Тьмы - Свет!</h3>
                      <p>
                        Цсссс про версии каждого приложения
                      </p>
                      <a  class="btn btn-success" href="<?= Url::to(['filessaid/index']) ?>">Подробнее &raquo;</a>
                    </div>
                    <img class="slider_img animate-in" src="assets1/ico/favicon.png" alt="">
                  </li>
                  <!-- Layer 2 -->
                 <!--  <li>
                    <div class="info">
                      <h2>Smart and fresh</h2>
                      <br>
                      <h3>Rich of features</h3>
                      <p>
                        Lorem ipsum dolor sit amet, munere commodo ut nam, quod volutpat in per. At nec case iriure, consul recteque nec et.
                      </p>
                      <a class="btn btn-success" href="#">Learn more &raquo;</a>
                    </div>
                    <img class="slider_img" src="assets1/img/slides/sequence/img-2.png" alt="">
                  </li>
                  Layer 3
                  <li>
                    <div class="info">
                      <h2>Far from ugly</h2>
                      <br>
                      <h3>Latest technology</h3>
                      <p>
                        Lorem ipsum dolor sit amet, munere commodo ut nam, quod volutpat in per. At nec case iriure, consul recteque nec et.
                      </p>
                      <a class="btn btn-success" href="#">Learn more &raquo;</a>
                    </div>
                    <img class="slider_img" src="assets1/img/slides/sequence/img-3.png" alt="">
                  </li> -->
                </ul>
              </div>
            </div>
            <!-- Sequence Slider::END-->
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="maincontent">
    <div class="container">
      <marquee behavior="scroll" direction="left"><b style="font-size: 30px; color: red;">Объявление! Этот сайт работает в тестовом режиме.</b></marquee>
      <div class="row">
        <div class="home-posts">
          <div class="span12">
            <h3 style="padding-top: 15px;">Последние софты для компа</h3>
          </div>
<!--  -->
              <?= osfilesWidget::widget(); ?>

          <!--  -->

        </div>

      </div>
      <div style="margin-bottom: 20px;" class="col-md-4 text-center"> 
          <a href="<?= Url::to(['filessaid/index']) ?>" id="singlebutton" name="singlebutton" class="btn btn-success">Все софты &raquo;</a> 
      </div>
    </div>
  </section>