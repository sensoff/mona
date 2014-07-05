define([
  'backbone',
  'models/news'
  ], function(Backbone, NewsModel) {

  var NewsCollection = Backbone.Collection.extend({
      model: NewsModel,
      url: 'get-news',

      nextPage: function(id) {
          this.url = 'get-news/' + id
          this.fetch({remove: false});
      }
  });

  return NewsCollection;

});
