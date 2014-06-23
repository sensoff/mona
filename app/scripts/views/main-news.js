define([
  'backbone',
  'collections/news',
  'views/one-news'
  ], function(Backbone, newsCollection, OneNewsView) {

  var MainNews = Backbone.View.extend({
      el: '#main-news',

      initialize: function() {
          this.collection = new newsCollection;
          this.model = new Backbone.Model({open: false});
          //this.model.on('change:open', toggleShow, this);
          //console.log(this);
          //this.showAllNews();
      },

      toggleShow: function() {
          console.log(123)
      },

      closeAllNews: function() {

      },

      showAllNews: function() {
          for (var i=0; i<this.collection.models.length; i++) {
              var options = {};
              options.model = this.collection.models[i];
              var one_news = new OneNewsView(options);
              this.$el.append(one_news.render());
          }
          var _openNews = function(model, i) {
              return setTimeout(function() {
                  return model.set({open: true});
            }, 0);
          };
          for (var i=0; i<this.collection.models.length; i++) {
              _openNews(this.collection.models[i])
          }
      }

  });

  return MainNews;
});
