<section id="slider">
  <div class="b-slider">
    <div class="fotorama"
        data-arrows="true"
        data-click="false"
        data-swipe="true"
        data-loop="true"
    >
      <?php for($i = 0; $i < count($slides); $i++){ ?>
          <img src="<?php echo Yii::app()->baseUrl.'/images/app/'.$slides[$i]->file ?>"
                data-caption="~ <?php echo $slides[$i]->text_lang1 ?>$<a href='#add_order/<?php echo $slides[$i]->text_lang1 ?>/<?php echo $slides[$i]->file; ?>' class='slider-order'>Заказать похожий</a>"
                alt=""
          />
      <?php } ?>
    </div>
  </div>
  <div class="clearfix"></div>
</section>

<section id="main-news">
  <?php
    echo $news->id;
  ?>
  <div class="b-main-news">
    <div class="left">
      <?php
        list($y, $m, $d) = split('[/.-]', $news->create_date);
        echo $d.'.'.$m;
      ?>
    </div>
    <div class="right">
      <div class="close"></div>
      <article>
        <?php echo $news->main_text_lang1; ?>
      </article>
      <a data-all-news href="#news/1" class="all-news">
        Читать все новости
      </a>
      <a data-clear-news href="#">Скрыть новости</a>
    </div>
  <div class="clearfix"></div>
  </div>
</section>

<section id="catalog">
  <div class="b-catalog">
    <menu>
      <?php for ($i=0; $i<count($categories); $i++) { ?>
          <item>
            <a data-menu="<?php echo $categories[$i]->url ?>"
              class="<?php if($i === 0) echo 'active'; ?>"
              href="#catalog/<?php echo $categories[$i]->url ?>">
              <?php echo $categories[$i]->name_lang1 ?>
            </a>
          </item>
      <?php } ?>
    </menu>
    <div class="fotorama"
      data-width="960"
      data-height="420"
      data-arrows="false"
      data-nav="false"
      data-swipe="true"
      data-click="false"
    >
      <?php for ($i=0; $i<count($categories); $i++) { ?>
        <div class="b-catalog-content" data-catalog-kitchens>
          <div class="description">
            <div class="time">
              Изготовление от
              <span>
                <?php echo $categories[$i]->description_lang1; ?>
              </span>
              дней
            </div>
            <div class="price">
              Цена от
              <span class="value">
                <?php echo $categories[$i]->description_meta_lang1; ?>
              </span>
              <span class="currency">y.e.</span> за м. пг.
            </div>
          </div>
          <div class="gallery">
            <?php
              for ($j=0, $n=0; $j<count($products); $j++) {
                if ($categories[$i]->id === $products[$j]->category_id) {
                  $n++; ?>
                  <a href="#catalog/<?php echo $categories[$i]->url; ?>/<?php echo $n;?>">
                    <img src="images/app/small/<?php echo $products[$j]->image; ?>" alt="" />
                  </a>
                <?php }
              }
            ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="clearfix"></div>
  </div>
</section>

<section id="main-comments">
  <div class="b-main-comments">
    <h2>Вот что говорят наши клиенты:</h2>
    <div class="header">
      <h3>Отзывы</h3>
      <menu>
        <item><a class="write-comment" href="#add_comment">Оставить отзыв</a></item>
        <item><a class="read-comments" href="#comments">Читать все отзывы</a></item>
      </menu>
    </div>
    <div class="comments">
      <div class="e-comment">
        <article>
          <?php echo $comment->comment?>
        </article>
        <div class="footer">
          <div class="left">
            <?php
              list($y, $m, $d) = split('[/.-]', $comment->date);
              echo $comment->user.', ';
              echo $d.'.'.$m.'.'.$y;
            ?>
          </div>
          <div class="right">
            <?php
              if(isset($comment)) {
                for($j=1; $j<= $comment->rating; $j++) { ?>
                  <img src="<?php echo Yii::app()->baseUrl ?>/images/star-on2.png"/>
                <?php } ?>
                <?php for(; $j< 6; $j++) { ?>
                  <img src="<?php echo Yii::app()->baseUrl ?>/images/star-off2.png"/>
                <?php }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
