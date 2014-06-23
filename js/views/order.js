define([
  'backbone',
  'models/order'
  ], function(Backbone, OrderModel) {

  var Order = Backbone.View.extend({
      name: 'order',
      el: '#order',

      events: {
          'click button': 'sendOrder',
          'click .m_close2': 'closeWindow',
          'input input[name="user"]': 'setOrder',
          'input input[name="phone"]': 'setOrder',
      },

      initialize: function(options) {
          $('#order-select').customSelect();
          this.app = options.app;
          this.model = new OrderModel();
          this.start_validation = false;
          Backbone.Validation.bind(this);
          this.model.on('validated', this.formValidate, this);
      },

      setOrder: function() {
          this.model.set({
              user: this.$('[name="user"]').val(),
              pre: this.$('[name="pre"]').val(),
              phone: this.$('[name="phone"]').val()
          }, {validate: true});
      },

      sendOrder: function() {
          if (!this.start_validation) {
              this.start_validation = true;
          }
          this.setOrder();
          if (!this.model.validationError) {
              var _this = this;
              jQuery.ajax({
                  'type':'POST',
                  'dataType':'json',
                  'data': {'Order': this.model.toJSON()},
                  'url': 'add-order',
                  'success': function(data) {
                      if (data.res === 'ok') {
                          _this.$el.addClass('send_ok');
                          _this.$('#order_content').html('<p>Ваша заявка принята</p><p>Скоро мы с Вами свяжемся</p>');
                      } else {
                          _this.$el.addClass('send_error');
                          _this.$('#order_content').html('<p>Извените, произошла ошибка</p><p>Обновите страницу и попробуйте сново</p>');
                      }
                  }
              });
          }
      },

      formValidate: function(valid, model, errors) {
          if (this.start_validation) {
              if (errors.phone) {
                  if (this.$('[name="phone"]').hasClass('ok')) {
                      this.$('[name="phone"]').removeClass('ok');
                  }
                  this.$('[name="phone"]').addClass('error');
                  this.$('[data-phone-error]').html(errors.phone);
              } else {
                  if (this.$('[name="phone"]').hasClass('error')) {
                      this.$('[name="phone"]').removeClass('error');
                  }
                  this.$('[data-phone-error]').html('');
                  this.$('[name="phone"]').addClass('ok');
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
      },
      closeWindow: function() {
        this.$el.parents('.m').css('display', 'none');
        this.app.navigate('/')
      }

  });

  return Order;
});
