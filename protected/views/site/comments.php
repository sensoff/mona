          <div class="container">
            <div class="top_menu">
              <ul>
                <?php for($i=0;$i<count($slides);$i++){ ?>
                <li>
                  <a href="<?php echo Yii::app()->baseUrl.'/catalog/'.$slides[$i]->url?>"><?php echo $slides[$i]->name_lang1 ?></a>
                  <span class="bg"></span>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="container">
            <div class="comments3">
              <div class="comments-title">
                <div class="title">Отзывы наших клиентов</div>
                <div class="add-comment">
                  <a href="#comments/add">Оставить отзыв</a>
                </div>
              </div>
              <div class="comments">
                <?php for($i=0; $i<count($comments); $i++) {?>
                <div class="comment">
                  <div class="text">
                    <?php if(isset($comments[$i])) echo $comments[$i]->comment ?>
                  </div>
                  <div class="container" style="margin-top: 20px;">

                    <span class="user"><?php if(isset($comments[$i])) echo $comments[$i]->user ?></span>
                    <span class="date"><?php if(isset($comments[$i])) echo $comments[$i]->date ?></span>
                    <span class="rating">
                      <?php
                        if(isset($comments[$i]))
                          for($j=1; $j<= $comments[$i]->rating; $j++) {
                      ?>
                          <img src="<?php echo Yii::app()->baseUrl ?>/images/star-on.png"/>
                      <?php } ?>
                      <?php for(; $j< 6; $j++) { ?>
                          <img src="<?php echo Yii::app()->baseUrl ?>/images/star-off.png"/>
                      <?php } ?>
                    </span>
                  </div>

                </div>

              <?php } ?>

              </div>
            </div>
          </div>
