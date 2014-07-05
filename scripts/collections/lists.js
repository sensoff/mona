define([
  'backbone',
  'models/list'
  ], function(Backbone, ListModel) {

  var ListsCollection = Backbone.Collection.extend({
      model: ListModel,
      url: 'get-catalog'
  });

  return ListsCollection;

});
