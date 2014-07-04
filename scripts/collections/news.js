define([
  'backbone',
  'models/news'
  ], function(Backbone, NewsModel) {

  var json = [
    {
      "date":"22.06",
      "description":"Акция: “В добрые руки”, скидка молодым семьям с детьми - 15%! <br/>Время действия - март 2014 года."
    },
    {
      "date":"22.06",
      "description":"Акция: “В добрые руки”, скидка молодым семьям с детьми - 15%! <br/>Время действия - март 2014 года."
    }
  ];

  var NewsCollection = Backbone.Collection.extend({
      model: NewsModel,
      url: '/get-news',

      initialize: function() {
          this.on('all', this.test, this);
      },

      test: function(a,b,c) {
          console.log(a);
          console.log(b);
          console.log(c);
      },

      nextPage: function(id) {
          this.fetch({reset: false, data: {id: id}});
      }
  });

  return NewsCollection;

});
