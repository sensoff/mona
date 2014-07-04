define([
    'backbone'
  ], function(Backbone) {

  var GalleryModel = Backbone.Model.extend({
      defaults: {
          open: false,
          lists: {},
          active: null
      }
  });

  return GalleryModel;

});
