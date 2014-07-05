define([
  'backbone',
  'models/comment',
  'rating'
  ], function(Backbone, CommentModel, Rating) {

  var comment_template = '\
  <div class="b-modal" style="display: none;">\
    <div class="m">\
      <div class="m_m">\
        <div class="m_m_m">\
          <div class="m_m_m_body">\
            <div class="m_m_m_header"></div>\
              <div class="m_m_m_content">\
                <div class="e-comment-form">\
                  <div class="line">\
                    С помощью этой формы Вы можете оставить отзыв о работе нашей команды, высказать свои замечания и предложения. Доверие наших клиентов - это то, чем мы дорожим! Спасибо что выбрали нас.\
                  </div>\
                  <div class="line">\
                    <div class="label">Ваш отзыв:</div>\
                    <textarea name="comment"></textarea>\
                    <div data-comment-error class="errors"></div>\
                  </div>\
                  <div class="line">\
                    <div class="e-comment-form__left">\
                      <div class="label">Ваше имя:</div>\
                      <input type="text" name="user" />\
                      <div data-user-error class="errors"></div>\
                    </div>\
                    <div class="e-comment-form__right">\
                      <div class="label">Ваша оценка:</div>\
                      <div data-rating class="rating"></div>\
                    </div>\
                  </div>\
                  <div class="buttons">\
                    <a href="#"></a>\
                    <button>Опубликовать</button>\
                  </div>\
                </div>\
              </div>\
            <div class="m_m_m_footer"></div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  ';
  var Comment = Backbone.View.extend({
      name: 'add_comment',
      events: {
          'click .buttons a': 'closeComment',
          'click .m': 'closeAround',
          'click button': 'sendComment',
          'input input[name="user"]': 'setComment',
          'input textarea[name="comment"]': 'setComment'
      },

      initialize: function(options) {
          this.model = new CommentModel;
          this.params = options.params;
          this.app = options.app;
          this.start_validation = false;
          this.model.on('change:open', this.toggleOpen, this);
          this.model.on('validated', this.formValidate, this);
          Backbone.Validation.bind(this);
      },

      render: function(options) {
          this.$el.append(_.template(comment_template));
          this.initRating();
          return this.el;
      },

      toggleOpen: function() {
          this.$('.b-modal').fadeToggle("fast");
          if ($('body').css('overflow') === 'hidden') {
              $('body').css('overflow', 'auto');
          } else {
              $('body').css('overflow', 'hidden');
          }
      },

      closeComment: function() {
          this.model.set({open: false});
      },

      closeAround: function(e) {
          var target = this.$(e.target).attr('class');
          if (target === 'm' || target === 'm_m' || target === 'm_m_m') {
              this.app.navigate('');
              this.closeComment();
          }
      },

      initRating: function() {
          this.$('[data-rating]').raty({
              starOff: 'images/star-off.png',
              starOn : 'images/star-on.png',
              score: 5,
              width: 200
          });
      },

      setComment: function() {
          this.model.set({
              user: this.$('[name="user"]').val(),
              comment: this.$('[name="comment"]').val(),
              rating: this.$('[name="score"]').val(),
          }, {validate: true});
      },

      sendComment: function() {
          if (!this.start_validation) {
              this.start_validation = true;
          }
          this.setComment();
          if (!this.model.validationError) {
              var _this = this;
              jQuery.ajax({
                  'type':'POST',
                  'dataType':'json',
                  'data': {'Comment': this.model.toJSON()},
                  'url': 'add-comment',
                  'success': function(data) {
                      if (data.res === 'ok') {
                          _this.$('.e-comment-form').html('<div class="send_ok" style="text-align: center;" >Спасибо за Ваш отзыв<br /> Нам очень важно Ваше мнение</div>');
                      } else {
                          _this.$('.e-comment-form').html('<div class="send_ok">Извените, произошла ошибка<br /> Обновите страницу и попробуйте сново</div>');
                      }
                  }
              });
          }
      },

      formValidate: function(valid, model, errors) {
          if (this.start_validation) {
              if (errors.comment) {
                  if (this.$('[name="comment"]').hasClass('ok')) {
                      this.$('[name="comment"]').removeClass('ok');
                  }
                  this.$('[name="comment"]').addClass('error');
                  this.$('[data-comment-error]').html(errors.comment);
              } else {
                  if (this.$('[name="comment"]').hasClass('error')) {
                      this.$('[name="comment"]').removeClass('error');
                  }
                  this.$('[data-comment-error]').html('');
                  this.$('[name="comment"]').addClass('ok');
              }

              if (errors.user) {
                  if (this.$('[name="user"]').hasClass('ok')) {
                      this.$('[name="user"]').removeClass('ok');
                  }
                  this.$('[name="user"]').addClass('error');
                  this.$('[data-user-error]').html(errors.user);
              } else {
                  if (this.$('[name="user"]').hasClass('error')) {
                      this.$('[name="user"]').removeClass('error');
                  }
                  this.$('[data-user-error]').html('');
                  this.$('[name="user"]').addClass('ok');
              }
          }
      }
  });

  return Comment;
});
