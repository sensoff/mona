define([
  'backbone',
  'mainpage',
  'views/gallery-window',
  'views/order',
  'views/comment',
  'views/comments-add',
  'collections/comments'
  ], function(
    Backbone,
    mainpageModule,
    GalleryWindow,
    Order,
    CommentView,
    AddComment,
    CommentsCollection
  ) {

  var vent = _.extend({}, Backbone.Events);

  var App = Backbone.Router.extend({
      routes: {
          'catalog/:name/:image': 'catalog',
          'catalog/:name': 'catalog',
          'comments/add': 'addComment',
          'comments/show': 'showComments',
          'add_order': 'addOrder'
      },

      initialize: function() {
          var view = Backbone.View.extend();
          this.page = new view({el: 'body', name: 'page'});
          this.initOrder();
      },

      index: function() {

      },

      catalog: function(name, image) {
          if (!this.galleryWindow) {
              this.galleryWindow = new GalleryWindow({app: this});
          }
          this.galleryWindow.render({name: name, active: image});
      },

      initOrder: function() {
          if ($('#order').length > 0) {
             options = {};
             options.app = this;
             this.order = new Order(options);
          }
      },

      showComments: function() {
          if (!this.comments) {
              var view = Backbone.View.extend();
              this.comments = new view({
                  el: '[data-comments]',
                  name: 'comments',
                  collection: new CommentsCollection()
              });
          }
          var comments = this.comments;
          this.comments.collection.fetch().complete(function(collection, response, options) {
              comments.$('.comments').html('');
              for (var i=0; i<comments.collection.models.length; i++) {
                  var comment = new CommentView({model: comments.collection.models[i]});
                  comments.$('.comments').append(comment.render().el);
              }
              comments.$('.all-comments').html('').css({'height': '1px', 'width': '100%'});
          });
      },

      addComment: function() {
          console.log('route Add comment')
          if (!this.comments) {
              var view = Backbone.View.extend();
              this.comments = new view({
                  el: '[data-comments]',
                  name: 'comments',
                  collection: new CommentsCollection()
              });
          }
          if (!this.comments.add_comment) {
              this.add_comment = new AddComment({app: this});
          }
          this.add_comment.render();
      },

      addOrder: function() {
        $('#add-order').css('display', 'block');
      }

  });

  return new App;

});
