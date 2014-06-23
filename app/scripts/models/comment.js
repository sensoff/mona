define([
  'backbone',
  'backbone-validation'
  ], function(Backbone, validation) {

  var CommentModel = Backbone.Model.extend({
      defaults: {
          user: '',
          comment: '',
          date: '',
          rating: '',
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
          comment: [{
            required: true,
            msg: 'Введите текст отзыва'
          },{
            rangeLength: [10, 600],
            msg: 'Длина отзыва может быть от 10 до 600 символов'
          }]
      }

  });

  return CommentModel;

});
