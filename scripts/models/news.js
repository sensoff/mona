define([
    'backbone'
  ], function(Backbone) {

  var NewsModel = Backbone.Model.extend({
      defaults: {
          main_text_lang1: undefined,
          create_date: undefined,
          open: false,
          read: true
      }

  });

  return NewsModel;

});
