<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Контакты';
?>
 <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666;">Контакты</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Свяжись с нами</h4>
              <ul>
                <li><label><strong>Телефон : </strong></label>
                  <p>
                    +998 90 941 85 66
                  </p>
                </li>
                <li><label><strong>Email : </strong></label>
                  <p>
                    saidmukhtarovsaid@gmail.com
                  </p>
                </li>
                <li><label><strong>Адресс : </strong></label>
                  <p>
                    Узбекистан, г.Ташкент, Сергелийский р-н
                  </p>
                </li>
              </ul>
            </div>
            <div class="widget">
              <h4>Social network</h4>
              <ul class="social-links">
                <li><a href="https://twitter.com/SaidmahkamS" title="Twitter"><i class="icon-rounded icon-32 icon-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/saidmahkam.saidmuxtorov" title="Facebook"><i class="icon-rounded icon-32 icon-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/saidmahkam-s-646aa31a8/" title="Linkedin"><i class="icon-rounded icon-32 icon-linkedin"></i></a></li>
                <li><a href="https://www.pinterest.com/saidmukhtarov/_saved/" title="Pinterest"><i class="icon-rounded icon-32 icon-pinterest"></i></a></li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="span8">
          <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe> -->

          <div style="position:relative;overflow:hidden;"><a href="https://yandex.uz/maps/10335/tashkent/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ташкент</a><a href="https://yandex.uz/maps/10335/tashkent/geo/1563084752/?ll=69.258743%2C41.232029&utm_medium=mapframe&utm_source=maps&z=13" style="color:#eee;font-size:12px;position:absolute;top:14px;">Сергелийский район — Яндекс.Карты</a><iframe src="https://yandex.uz/map-widget/v1/-/CCUIVOtvdD" width="100%" height="380" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe></div>

          <div class="spacer30"></div>

          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="row">
              <div class="span4 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>

              <div class="span4 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email"
                  data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="span8 form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4"
                  data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="span8 form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"
                  placeholder="Message"></textarea>
                <div class="validation"></div>
                <div class="text-center">
                  <button style="color: #666;" class="btn btn-color btn-rounded" type="submit">Send message</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>