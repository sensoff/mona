define([
  'backbone',
  'collections/comments',
  'rating'
  ], function(Backbone, CommentsCollection) {

  var comment_template = '\
  <div class="e-one-comment">\
    <div class="e-comment">\
      <article>\
        <%= model.comment %>\
      </article>\
      <div class="footer">\
        <div class="left">\
          <%= model.date %>\
        </div>\
        <div class="right">\
          <% for(j=1; j<= model.rating; j++) { %>\
              <img src="images/star-on2.png"/>\
          <% } %>\
          <% for(; j< 6; j++) { %>\
            <img src="images/star-off2.png"/>\
          <% } %>\
        </div>\
      </div>\
    </div>\
    <% if (model.answer.length > 0) { %>\
      <div class="e-comment-answer">\
        <div class="e-comment-body">\
          <article>\
            <%= model.answer %>\
          </article>\
          <div class="footer">\
            <div class="left">\
              Администрация сайта\
            </div>\
          </div>\
        </div>\
      </div>\
    <% } %>\
  </div>\
  ';

  var close_template = '<a data-close-comments class="close-comments" href="#">Скрыть отзывы</a>';
  var Comments = Backbone.View.extend({
      name: 'comments',
      events: {
          'click [data-close-comments]': 'close'
      },

      initialize: function(options) {
          this.collection = new CommentsCollection;
          this.app = options.app;
          this.model = new Backbone.Model({open: true});
          this.setElement('[data-comments]');
          this.collection.on('sync', this.render, this);
          this.model.on('change:open', this.toggleOpen, this);
          this.collection.fetch();
      },

      render: function() {
          for (var i=1; i < this.collection.models.length; i++) {
              var model = this.collection.models[i];
              var temp = model.get('date');
              temp = temp.split('-');
              var date = {
                  y: temp[0],
                  m: temp[1],
                  d: temp[2]
              };
              this.$el.append(_.template(comment_template, {model: model.toJSON(), date:date}));
          }
          this.$el.append(_.template(close_template));

          return this;
      },

      close: function(e) {
          e.preventDefault();
          e.stopPropagation();
          this.model.set({open: false});
          this.app.navigate('c', {trigger: false});
      },

      toggleOpen: function() {
          this.$el.slideToggle(300);
      }

  });

  return Comments;
});
