          <div class="container">
            <div class="top_menu">
              <ul>
                <?php for($i=0;$i<count($slides);$i++){ ?>
                <li <?php if ($this->url === $slides[$i]->url){ ?> class="active" <? } ?> >
                  <a href="<?php echo Yii::app()->baseUrl.'/catalog/'.$slides[$i]->url?>"><?php echo $slides[$i]->name_lang1 ?></a>
                  <span class="bg"></span>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="container">
            <div class="page_gallery">
            <?php
              for ($i=0; $i<count($photos); $i++) {
            ?>
              <a href ="#catalog/<?php echo $this->url.'/'.($i+1) ?>">
              <img src="<?php echo Yii::app()->baseUrl.'/images/products/medium/'.$photos[$i]->image?>" alt="<?php $photos[$i]->name_lang1?>" />
              </a>
            <?php } ?>

              </div>
            <div class="order3">
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
