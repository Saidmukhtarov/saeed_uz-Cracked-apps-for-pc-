<?php 
use yii\helpers\Url;
use common\models\FilesSaid;

$this->title = $model->name;
\yii\web\YiiAsset::register($this);

 ?>
 <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <h3 style="color: #666;"><?= $model->name ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span8">
          <!-- start article full post -->
          <article class="blog-post">
            <div class="post-heading">
              <h3></h3>
            </div>
            <div class="clearfix">
            </div>
            <img src="<?= '/img/' . $model->image ?>" alt="<?= $model->name ?>" />
            <ul class="post-meta">
              <li class="first"><i class="icon-calendar"></i><span><?= date('d/M/Y H:i:s', $model->created_at) ?></span></li>
              <li><i class="icon-list-alt"></i><span><a href="#">3 comments</a></span></li>
              <li class="last"><i class="icon-tags"></i><span><a href="#">Design</a>, <a href="#">Blog</a>, <a href="#">Tutorial</a></span></li>
            </ul>
            <div class="clearfix">
            </div>
            <p>
              <?= $model->description ?>
            </p>
            <a style="font-weight: bolder;" class="btn btn-success" href="<?= Url::to(['filessaid/download/' . $model->id]) ?>">Скачать &DownArrowBar;</a>
          </article>
          <!-- end article full post -->
          <h4>Comments</h4>
          <ul class="media-list">
            <li class="media">
              <a class="pull-left" href="#">
				<img class="media-object" src="assets/img/small-avatar.png" alt="" />
				</a>
              <div class="media-body">
                <h5 class="media-heading"><a href="#">John doe</a></h5>
                <span>3 March, 2013</span>
                <p>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </p>
                <a href="#">Reply</a>
                <!-- Nested media object -->
                <div class="media">
                  <a class="pull-left" href="#">
						<img class="media-object" src="assets/img/small-avatar.png" alt="" />
						</a>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="#">Tom slayer</a></h5>
                    <span>3 March, 2013</span>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </p>
                    <a href="#">Reply</a>
                    <!-- Nested media object -->
                    <div class="media">
                      <a class="pull-left" href="#">
								<img class="media-object" src="assets/img/small-avatar.png" alt="" />
								</a>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="#">Erick doe</a></h5>
                        <span>3 March, 2013</span>
                        <p>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </p>
                        <a href="#">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Nested media object -->
                <div class="media">
                  <a class="pull-left" href="#">
						<img class="media-object" src="assets/img/small-avatar.png" alt="" />
						</a>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="#">Jimmy doe</a></h5>
                    <span>3 March, 2013</span>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </p>
                    <a href="#">Reply</a>
                  </div>
                </div>
              </div>
            </li>
            <li class="media">
              <a class="pull-left" href="#">
				<img class="media-object" src="assets/img/small-avatar.png" alt="" />
				</a>
              <div class="media-body">
                <h5 class="media-heading"><a href="#">Mike sullivan</a></h5>
                <span>3 March, 2013</span>
                <p>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </p>
                <a href="#">Reply</a>
              </div>
            </li>
          </ul>
          <div class="comment-post">
            <h4>Leave a comment</h4>
            <form action="#" method="post" class="comment-form" name="comment-form">
              <div class="row">
                <div class="span3">
                  <label>Name <span>*</span></label>
                  <input type="text" class="input-block-level" placeholder="Your name" />
                </div>
                <div class="span3">
                  <label>Email <span>*</span></label>
                  <input type="text" class="input-block-level" placeholder="Your email" />
                </div>
                <div class="span6">
                  <label>URL</label>
                  <input type="text" class="input-block-level" placeholder="Your website url" />
                </div>
                <div class="span8">
                  <label>Comment <span>*</span></label>
                  <textarea rows="9" class="input-block-level" placeholder="Your comment"></textarea>
                  <button class="btn btn-small btn-success" type="submit">Submit comment</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="span4">
          <aside>
            <div class="widget">
              <form class="form-search">
                <input placeholder="Type something" type="text" class="input-medium search-query">
                <button type="submit" class="btn btn-flat btn-color" style="color: #666;">Search</button>
              </form>
            </div>
            <div class="widget">
              <h4>Categories</h4>
              <ul class="cat">
                <li><a href="#">Web design (114)</a></li>
                <li><a href="#">Internet news (15)</a></li>
                <li><a href="#">Tutorial and tips (20)</a></li>
                <li><a href="#">Design trends (15)</a></li>
                <li><a href="#">Online business (10)</a></li>
              </ul>
            </div>
            <div class="widget">
              <h4>Recent posts</h4>
              <ul class="recent-posts">
                <li><a href="#">Lorem ipsum dolor sit amet munere commodo ut nam</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 4 Comments</span>
                </li>
                <li><a href="#">Sea nostrum omittantur ne mea malis nominavi insolens</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 2 Comments</span>
                </li>
                <li><a href="#">Eius graece recusabo no pri odio tale quo id, mea at saepe</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 4 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 12 Comments</span>
                </li>
                <li><a href="#">Malorum deserunt at nec usu ad graeco elaboraret at rebum</a>
                  <div class="clear">
                  </div>
                  <span class="date"><i class="icon-calendar"></i> 3 March, 2013</span>
                  <span class="comment"><i class="icon-comment"></i> 3 Comments</span>
                </li>
              </ul>
            </div>
            <div class="widget">
              <h4>Tags</h4>
              <ul class="tags">
                <li><a href="#" class="btn">Tutorial</a></li>
                <li><a href="#" class="btn">Tricks</a></li>
                <li><a href="#" class="btn">Design</a></li>
                <li><a href="#" class="btn">Trends</a></li>
                <li><a href="#" class="btn">Online</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>