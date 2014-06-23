define([
  'backbone',
  'backbone-validation'
  ], function(Backbone, validation) {

  var OrderModel = Backbone.Model.extend({
      defaults: {
          user: '',
          phone: '',
          pre: '29'
      },

      validation: {
          user: [{
            required: true,
            msg: 'Введите ваше имя, например Иван'
          },{
            rangeLength: [3, 20],
            msg: 'Имя должно быть от 3 до 20 символов'
          }],
          phone: [{
            required: true,
            msg: 'Введите ваш номер, например 1234567'
          },{
            pattern: /^\d+$/,
            msg: 'Номер может состоять только из цифр'
          },{
            length: 7,
            msg: 'Номер должен быть из 7 цифр'
          }],
          pre: {
            required: true,
            length: 2
          }
      }

  });

  return OrderModel;

});
