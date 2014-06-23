define([
  'backbone',
  'backbone-validation'
  ], function(Backbone, validation) {

  var CommentModel = Backbone.Model.extend({
      defaults: {
          user: '',
          comment: '',
          date: '',
          rating: ''
      },

      validation: {
          user: [{
            required: true,
            msg: 'Введите ваше имя, например Иван'
          },{
            rangeLength: [3, 20],
            msg: 'Имя должно быть от 3 до 20 символов'
          }],
          comment: [{
            required: true,
            msg: 'Введите текст отзыва'
          },{
            rangeLength: [20, 600],
            msg: 'Длина отзыва может быть от 20 до 600 символов'
          }]
      }

  });

  return CommentModel;

});
