define([
  'backbone'
  ], function(Backbone) {

  var Catalog = Backbone.Model.extend({
      defaults: {
          open: false,
          loading: false
      }
  });

  return Catalog;

});
