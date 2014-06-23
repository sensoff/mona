define([
  'backbone',
  'models/catalog'
  ], function(Backbone, Catalog) {

  var Catalogs = Backbone.Collection.extend({
      model: Catalog,
      url: 'get-catalog'
  });

  return Catalogs;

});
