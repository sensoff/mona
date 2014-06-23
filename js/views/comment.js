define([
  'backbone',
  'models/comment'
  ], function(Backbone, CommentModel) {

  var comment_template = '\
    <div class="text">\
      <%= data.comment %>\
    </div>\
    <div class="container" style="margin-top: 20px;">\
      <span class="user"><%= data.user %></span>\
      <span class="date"><%= data.date %></span>\
      <span class="rating">\
        <% for(var j=1; j<= data.rating; j++) { %>\
            <img src="images/star-on.png"/>\
        <% } %>\
        <% for(; j< 6; j++) { %>\
            <img src="images/star-off.png"/>\
        <% } %>\
      </span>\
    </div>';

  var CommentView = Backbone.View.extend({
      name: 'comment',
      className: 'comment',
      model: CommentModel,

      initialize: function(options) {

      },

      render: function() {
          this.$el.append(_.template(comment_template, {data: this.model.toJSON()}));
          return this;
      }

  });

  return CommentView;
});
