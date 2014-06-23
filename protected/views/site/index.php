			<div class="content">
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
          <div class="slider">
            <?php $this->renderPartial('/slider/_slider', array('slides'=>$slides)) ?>
            <div class="order2">
              <div class="top_text">
                <?php //echo $this->slider_text ?>
                <span style="font: 20px/30px Verdana, Arial; color: #fff; ">
                  До 23 февраля 2014 года
                </span>
                <span style="font:bold 90px/90px Verdana, Arial; color: #fff;">
                  5% <br />
                </span>
                <span style="font:bold 30px/30px Verdana, Arial; color: #fff; ">
                  скидка на кухни
                </span>
              </div>
              <div class="button_bottom">
                <a href="#add_order">Оставить заявку</a>
              </div>
              <div class="m" id="add-order" style="display:none;">
                  <div class="m_m">
                    <div class="m_m_m">
                      <div class="ord m_m_m_body" id="order">
                        <div class="ord m_m_m_header">
                          <div class="m_close2"></div>
                        </div>
                        <div class="m_m_m_content" id="order_content">
                        <div class="top_order">
                        Все подробности по заказу <br />
                        Вам расскажет наш<br />
                        оператор по телефону
                        </div>
                          <div class="order">
                            <div class="top">
                              <div class="form-line">
                                <input type="text" name="user" style="width: 200px;" placeholder="Ваше имя" />
                                <div data-user-error class="error"></div>
                              </div>
                              <div class="form-line">
                                <div class="form-select">
                                  <select id="order-select" class="order-select" name="pre" >
                                    <option value="29">29</option>
                                    <option value="25">25</option>
                                    <option value="33">33</option>
                                    <option value="44">44</option>
                                  </select>
                                </div>
                                <div class="input">
                                  <input type="text" name="phone" style="width: 126px;" placeholder="Телефон" />
                                </div>
                                <div data-phone-error class="error"></div>
                              </div>
                              <div class="bottom-form">
                                Мы гарантируем безопастность Ваших данных
                              </div>
                            </div>
                            <div class="bottom">
                              <button>Заказать звонок</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      </div>
                    </div>
                </div>
            </div>
          </div>

        </div>


        <div class="container">
            <div class="promo">
              <div class="block">
                <div class="image">
                  <img src="<?php echo Yii::app()->baseUrl?>/images/dostavka.png" alt="Доставка" />
                </div>
                <div class="title">Бесплатно</div>
                <div class="about">
                  Доставка не может быть платной, работает для Вас
                </div>
              </div>
              <div class="block">
                <div class="image">
                  <img src="<?php echo Yii::app()->baseUrl?>/images/sborka.png" alt="Сборка" />
                </div>
                <div class="title">Бесплатно</div>
                <div class="about">
                  Мы осуществляем сборку совершенно бесплатно
                </div>
              </div>
              <div class="block">
                <div class="image">
                  <img src="<?php echo Yii::app()->baseUrl?>/images/sroki.png" alt="Изготовление" />
                </div>
                <div class="title">от 3-х дней</div>
                <div class="about">
                  Изготовление заказов занимает от 3-х до 20 дней
                </div>
              </div>
              <div class="block">
                <div class="image">
                  <img src="<?php echo Yii::app()->baseUrl?>/images/garanty.png" alt="Гарантия" />
                </div>
                <div class="title">2 года</div>
                <div class="about">
                  Гарантия на продукцию приятно удивит Вас!
                </div>
              </div>
            </div>
        </div>



        <div class="container">
            <div class="comments2">
              <?php for($i=0; $i<3; $i++) {?>
              <div class="comment">
                <div class="text">
                  <?php if(isset($comments[$i])) echo $comments[$i]->comment ?>
                </div>
                <div class="container" style="margin-top: 20px;">
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
                  <span class="user"><?php if(isset($comments[$i])) echo $comments[$i]->user ?></span>
                  <span class="date"><?php if(isset($comments[$i])) echo $comments[$i]->date ?></span>
                </div>
              </div>

            <?php } ?>
            </div>
            <div class="comments2_actions">
              <div class="block">
                <div class="show">
                  <a href="<?php echo Yii::app()->baseUrl.'/comments' ?>">Просмотреть все</a>
                </div>
                <div class="add">
                  <a href="#comments/add">Оставить отзыв</a>
                </div>
              </div>
            </div>
        </div>


      </div>
