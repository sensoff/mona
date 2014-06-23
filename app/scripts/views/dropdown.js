define([
  'backbone',
  'underscore'
  ], function(Backbone, _) {

  var dropdown_template = '\
      <div class="e-dropdown">\
          <input type="hidden" name="pre-phone" value="<%= data[0] %>" />\
          <div class="show">\
              <div class="value"><%= data[0] %></div>\
              <div class="list">\
                  <div class="e-dropdown__line" style="display: none;" data-val="<%= data[0] %>"><%= data[0] %></div>\
                  <% for (var i=1; i<data.length; i++) { %> \
                        <div class="e-dropdown__line" data-val="<%= data[i] %>"><%= data[i] %></div>\
                  <% } %>\
              </div>\
          </div>\
      </div>\
  ';

  var DropDownView = Backbone.View.extend({
      name: 'dropdown',

      events: {
          'click .value': 'toggleOpen',
          'click .e-dropdown__line': 'changeValue'
      },

      initialize: function(options) {
          this.model = options;
      },

      render: function(values) {
          this.$el.append(_.template(dropdown_template, {data: values}));
          return this.el;
      },

      toggleOpen: function() {
          this.$('.list').slideToggle("fast");
      },

      changeValue: function(e) {
          var old_value = this.$('input').val();
          var value = $(e.currentTarget).attr('data-val');
          this.model.set('pre', value);
          this.$('.value').html(value);
          this.$('input').val(value);
          this.$('[data-val="' + old_value +'"]').css('display', 'block');
          this.$('[data-val="' + value +'"]').css('display', 'none');
          this.toggleOpen();
      }

  });

  return DropDownView;
});
