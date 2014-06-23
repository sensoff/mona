define([
    'backbone',
    'backbone-validation'
  ], function(Backbone, validation) {

  var OrderModel = Backbone.Model.extend({
      defaults: {
          user: '',
          phone: '',
          pre: '29',
          similar: false,
          img: undefined,
          price: undefined,
          open: false
      },

      validation: {
          user: [{
              required: true,
              msg: 'Напишите Ваше имя'
          },{
              rangeLength: [2, 50],
              msg: 'Имя должно быть от 2 до 50 символов'
          }],
          phone: [{
              required: true,
              msg: 'Введите ваш номер, например 1234567'
          },{
              pattern: /^[\d]*$/,
              msg: 'Номер может состоять только из цифр'
          },{
              length: 7,
              msg: 'Номер должен быть из 7 цифр'
          }],
          pre: [{
              length: 2
          },{
              required: true
          }],
          similar: {
              required: true,
          },
          price: [{
              pattern: /^[\d]*$/,
          },{
              required: false
          }]
      }

  });

  return OrderModel;

});
