define([
  'backbone',
  'models/gallery',
  'collections/lists',
  'views/list',
  'fotorama'
  ], function(Backbone, GalleryModel, ListsCollection, ListView, Fotorama) {

  var gallery_template = '\
  <div class="b-modal" style="display: none;">\
    <div class="m">\
      <div class="m_m">\
        <div class="m_m_m">\
          <div class="m_m_m_body">\
            <div class="m_m_m_header"></div>\
              <div class="m_m_m_content">\
                <div class="e-gallery">\
                  <div data-gallery-title class="header">\
                    <% for (i in collection) { \
                        if (collection[i].id === options.name) { \
                          print(collection[i].get("title"))\
                        }\
                    } %>\
                  </div>\
                  <div data-lists class="content"></div>\
                  <div class="footer">\
                    <menu>\
                      <% for (i in collection) { \
                        if (collection[i].id !== options.name) { %>\
                          <item><a data-item-name="<%= collection[i].id %>" data-item-show="true" href="#catalog/<%= collection[i].id %>/1"><%= collection[i].get("title") %></a></item>\
                        <% } else { %> \
                          <item><a style="display: none;" data-item-show="false" data-item-name="<%= collection[i].id %>" href="#catalog/<%= collection[i].id %>/1"><%= collection[i].get("title") %></a></item>\
                        <% } \
                      } %>\
                    </menu>\
                    <div class="close">\
                      <a href="#">Закрыть</a>\
                    </div>\
                  </div>\
                </div>\
              </div>\
            <div class="m_m_m_footer"></div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  ';

  var GalleryView = Backbone.View.extend({
      name: 'list',
      events: {
          'render': 'initGallery',
          'click .close': 'closeGallery',
          'click .m': 'closeAround'
      },

      initialize: function(options) {
          this.model = new GalleryModel;
          this.params = options.params;
          this.app = options.app;
          this.collection = new ListsCollection;
          this.model.on('change:open', this.toggleOpen, this);
      },

      render: function(options) {
          this.$el.append(_.template(gallery_template, {options: options, collection: this.collection.models}));
          return this.el;
      },

      selectGallery: function(name, id) {
          var position, title, model;
          for (var i=0, collection=this.collection.models; i<collection.length; i++) {
              if (collection[i].id === name) {
                  position = i;
                  title = collection[i].get('title');
                  model = collection[i]
              }
          }
          this.$('[data-gallery-title]').html(title);
          this.$('[data-item-show="false"]').css('display', 'block').attr('data-item-show', true);
          this.$('[data-item-name="' + name + '"]').css('display', 'none').attr('data-item-show', false);
          var lists = this.model.get('lists');
          if (!this.model.get('lists')[name]) {
              lists[name] = new ListView({model: model, app: this.app});
              $('[data-lists]').append(this.model.get('lists')[name].render());
          }

          if (this.model.get('active')) {
              lists[this.model.get('active')].model.set({open: false});
          }

          lists[name].model.set({open: true});
          lists[name].showPosition(id);
          this.model.set({active: name});
      },

      toggleOpen: function() {
          this.$('.b-modal').fadeToggle("fast");
          if ($('body').css('overflow') === 'hidden') {
              $('body').css('overflow', 'auto');
          } else {
              $('body').css('overflow', 'hidden');
          }
      },

      closeGallery: function() {
          this.model.set({open: false});
      },

      closeAround: function(e) {
          var target = this.$(e.target).attr('class');
          if (target === 'm' || target === 'm_m' || target === 'm_m_m') {
              this.app.navigate('');
              this.closeGallery();
          }
      }
  });

  return GalleryView;
});
