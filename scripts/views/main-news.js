define([
  'backbone',
  'collections/news',
  'views/one-news'
  ], function(Backbone, newsCollection, OneNewsView) {

  var MainNews = Backbone.View.extend({
      el: '#main-news',

      initialize: function(options) {
          this.collection = new newsCollection([{id: 0}]);
          this.model = new Backbone.Model({open: false});
          this.collection.on('sync', this.addNews, this);
          this.app = options.app;
          this.collection_views = [];
          var opts = {};
          opts.el = '[data-first-news]';
          opts.model = new Backbone.Model({open: true, read: true});
          opts.app = this.app;
          this.collection_views.push(new OneNewsView(opts));
          console.log(this.collection_views)
      },

      toggleShow: function() {
          console.log(123)
      },

      closeAllNews: function() {

      },

      addNews: function() {
          var news = new OneNewsView({
              app: this.app,
              model: this.collection.models[this.collection.models.length - 1]
          });
          this.collection_views.push(news);
          this.$el.append(news.render());
          news.model.set({open: true});
      }

  });

  return MainNews;
});
