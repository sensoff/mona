define([
    'backbone'
  ], function(Backbone) {

  var NewsModel = Backbone.Model.extend({
      defaults: {
          description: undefined,
          date: undefined,
          open: false
      }

  });

  return NewsModel;

});
