define([
  'backbone',
  'models/comment'
  ], function(Backbone, CommentsModel) {

  var CommentsCollection = Backbone.Collection.extend({
      model: CommentsModel,
      url: 'get-comments'
  });

  return CommentsCollection;

});
