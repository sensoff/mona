define([
    'backbone'
  ], function(Backbone) {

  var ListModel = Backbone.Model.extend({
      defaults: {
          open: false,
          loading: false
      }
  });

  return ListModel;

});
