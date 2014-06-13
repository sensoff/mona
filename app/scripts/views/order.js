define([
  'backbone',
  'underscore',
  'views/dropdown',
  'models/order'
  ], function(Backbone, _, DropDownView, OrderModel) {

  var order_template = '\
    <div class="b-order-form" style="display: none;">\
      <div class="line">\
        <div class="label">Ваше имя:</div>\
        <input class="name" type="text" name="user" value="" placeholder="Василий Васильевич" />\
        <div class="errors" data-user-error></div>\
      </div>\
      <div class="line">\
        <div class="label">Ваш номер телефона :</div>\
        <div data-drop-down></div>\
        <input class="phone" type="text" name="phone" value="" placeholder="1234567" />\
        <div class="errors" data-phone-error></div>\
      </div>\
      <div data-similar>\
        <% if (options) { %>\
        <div class="line">\
          <div class="similar">\
            Я хочу заказать похожее \
            <div class="similar-image">\
              <img src="images/slider/<%= options.img %>" />\
              <div class="price">~ <%= options.price %> $</div>\
            </div>\
          </div>\
        </div>\
        <% } %>\
      </div>\
      <div class="buttons">\
        <a href="#">Я передумал(а)</a>\
        <button>Готово!</button>\
      </div>\
    </div>\
  ';

  var similar_template = '\
      <div class="line">\
          <div class="similar">\
              Я хочу заказать похожее \
              <div class="similar-image">\
                <img src="images/slider/<%= options.img %>" />\
                <div class="price">~ <%= options.price %> $</div>\
              </div>\
          </div>\
      </div>\
  ';

  var OrderView = Backbone.View.extend({
      name: 'order',

      events: {
          'click .buttons a': 'closeOrder',
          'input input[name="user"]': 'setOrder',
          'input input[name="phone"]': 'setOrder',
          'click button': 'sendOrder'
      },

      initialize: function(options) {
          this.model = new OrderModel;
          this.params = options.params;
          this.start_validation = false;
          Backbone.Validation.bind(this);
          this.model.on('change:open', this.toggleOpen, this);
          this.model.on('change:img', this.renderSimilar, this);
          this.model.on('validated', this.formValidate, this);
      },

      render: function(options) {
          this.$el.append(_.template(order_template, {data: this.model.toJSON(), options: options}));
          var dropDown = new DropDownView(this.model);
          var values = [29, 33, 44, 25];
          this.$('[data-drop-down]').append(dropDown.render(values));
          return this.el;
      },

      renderSimilar: function() {
          if (this.model.get('similar')) {
              var options = {img: this.model.get('img'), price: this.model.get('price')};
              this.$('[data-similar]').empty().append(_.template(similar_template, {options: options}));
          } else {
              this.$('[data-similar]').empty();
          }

      },

      toggleOpen: function() {
          this.$('.b-order-form').slideToggle("fast");
      },

      closeOrder: function() {
          this.model.set({open: false});
      },

      setOrder: function() {
          this.model.set({
              user: this.$('[name="user"]').val(),
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
                  'url': '/add-order',
                  'success': function(data) {
                      if (data.res === 'ok') {
                          _this.$el.addClass('send_ok');
                          _this.$('.b-order-form').html('<p>Ваша заявка принята</p><p>Скоро мы с Вами свяжемся</p>');
                      } else {
                          _this.$el.addClass('send_error');
                          _this.$('.b-order-form').html('<p>Извените, произошла ошибка</p><p>Обновите страницу и попробуйте сново</p>');
                      }
                  }
              });
          }
      },

      formValidate: function(valid, model, errors) {
          if (this.start_validation) {
              if (errors.phone) {
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
      }

  });

  return OrderView;
});
