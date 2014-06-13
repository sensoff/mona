define([
  'backbone'
  ], function(Backbone) {

  var MainNews = Backbone.View.extend({
      el: '#main-news',

      events: {
          'click .close': 'close',
      },

      close: function() {
          this.$el.slideUp("fast");
      }

  });

  return MainNews;
});
