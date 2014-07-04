define([
  'backbone',
  'models/news'
  ], function(Backbone, NewsModel) {

var news_template = '\
<div class="left"><%= model.date %></div>\
<div class="right">\
    <div class="close"></div>\
    <article><%= model.description %></article>\
</div>\
';

    var NewsView = Backbone.View.extend({
        name: 'b-main-news',
        className: 'b-main-news',

        events: {
            'click .close': 'close',
        },

        initialize: function(options) {
            this.model = options.model;
            this.app = options.app;
            this.model.on('change:open', this.toggleOpen, this);
        },

        render: function() {
            console.log(this.model)
            this.$el.append(_.template(news_template, {model: this.model.toJSON()}));
            this.$el.css('display', 'none');
            return this.el;
        },

        close: function() {
            this.model.set({open: false});
        },

        toggleOpen: function() {
            this.$el.slideToggle(300);
        },

  });

  return NewsView;
});
