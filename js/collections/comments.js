define([
  'backbone',
  'models/comment'
  ], function(Backbone, CommentModel) {

  var CommentsCollection = Backbone.Collection.extend({
      model: CommentModel,
      url: 'get-comments'
  });

  return CommentsCollection;

});
