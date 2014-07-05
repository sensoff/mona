define([
  'backbone',
  'models/news',
  'underscore'
  ], function(Backbone, NewsModel, _) {

var news_template = '\
<div class="left"><%= date.d %>.<%= date.m %></div>\
<div class="right">\
    <div class="close"></div>\
    <article><%= model.main_text_lang1 %></article>\
    <% if (model.alias) { %>\
        <a data-next-news href="#news/<%= count %>" class="all-news">\
            Читать следующую новость\
        </a>\
    <% } %>\
</div>\
';

    var NewsView = Backbone.View.extend({
        name: 'b-main-news',
        className: 'b-main-news',

        events: {
            'click .close': 'close'
        },

        initialize: function(options) {
            if (_.isString(options.el)) {
                this.setElement(options.el);
            }
            this.model = options.model;
            console.log(this.model)
            this.app = options.app;
            this.model.on('change:open', this.toggleOpen, this);
            //this.model.on('change:read', this.toggleRead, this);
            this.model.on('all:test', this.test, this)
            console.log(this.model.get('read'))
            console.log(this.model.set('test', 222))
        },

        render: function() {
            this.collection = this.app.params.get('news').collection;
            var count = this.collection.models.length;
            var temp = this.model.get('create_date');
            temp = temp.split('-');
            var date = {
                y: temp[0],
                m: temp[1],
                d: temp[2]
            };
            this.$el.append(_.template(news_template, {model: this.model.toJSON(), count: count, date:date}));
            this.$el.css('display', 'none');
            this.changeLast();
            return this.el;
        },

        close: function() {
            this.model.set({open: false});
            this.model.set({read: false});
            this.changeLast();
        },

        toggleRead: function() {
            this.$('[data-next-news]').slideToggle(0);
        },

        toggleOpen: function() {
            this.$el.slideToggle(300);
        },

        changeLast: function() {
            if (this.model.id > 0) {
                var prev = parseInt(this.model.id) - 1;
                if (this.collection.get(prev)) {
                    var read = this.collection.get(prev).get('read');
                    this.collection.get(prev).set({read: !read});
                    this.app.params.get('news').collection_views[prev].$('[data-next-news]').slideToggle(0);
                }
            }
        }


  });

  return NewsView;
});
