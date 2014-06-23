define([
  'backbone',
  'models/comment',
  'rating'
  ], function(Backbone, CommentModel, rating) {

  var add_comment_template = '\
  <div class="m">\
    <div class="m_m">\
      <div class="m_m_m">\
        <div class="add_comm m_m_m_body">\
          <div class="add_comm m_m_m_header">\
            <div class="m_close2"></div>\
          </div>\
          <div class="add_comm m_m_m_content">\
            <div class="add_comment">\
              <div class="form_line">\
                <div class="label">Ваше имя:</div>\
                <input type="text" name="user" placeholder="Например: Антонина Алексеевна" />\
                <div data-user-error class="error"></div>\
              </div>\
              <div class="form_line rat">\
                <div class="label rat">Оцените нашу работу:</div>\
                <div data-rating class="rating"></div>\
              </div>\
              <div class="form_line">\
                <div class="label">Ваш отзыв:</div>\
                <textarea name="comment" placeholder="Текст отзыва"></textarea>\
                <div data-comment-error class="error"></div>\
              </div>\
            </div>\
          </div>\
          <div class="add_comm m_m_m_footer">\
            <button>Оставить отзыв</button>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>';

  var AddComment = Backbone.View.extend({
      name: 'add_comment',
      open: null,

      events: {
          'click .m_close': 'closeWindow',
          'click .m_close2': 'closeWindow',
          'click button': 'sendComment',
          'input input[name="user"]': 'setComment',
          'input textarea[name="comment"]': 'setComment'
      },

      initialize: function(options) {
          this.app = options.app;
          this.model = new CommentModel();
          this.start_validation = false;
          Backbone.Validation.bind(this);
          this.model.on('validated', this.formValidate, this);
      },

      render: function() {
          if (this.open === null ) {
              this.app.page.$el.append(this.$el.append(_.template(add_comment_template)));
              this.open = true;
              this.initRating();
          } else {
              this.$el.css('display', 'block');
              this.open = true;
          }
      },

      closeWindow: function() {
          this.$el.css('display', 'none');
          this.open = false;
          this.app.navigate('/');
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
                          _this.$('.add_comm .m_m_m_content').addClass('no_bg').html('<div class="send_ok">Спасибо за Ваш отзыв<br /> Нам очень важно Ваше мнение</div>');
                      } else {
                          _this.$('.add_comm .m_m_m_content').addClass('no_bg').html('<div class="send_ok">Извените, произошла ошибка<br /> Обновите страницу и попробуйте сново</div>');
                      }
                  }
              });
          }
      },

      initRating: function() {
          this.$('[data-rating]').raty({
              starOff: 'images/star-off.png',
              starOn : 'images/star-on.png',
              score: 5,
              width: 150
          });
      },

      formValidate: function(valid, model, errors) {
          console.log(errors)
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

  return AddComment;
});
