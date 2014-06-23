define([
  'backbone',
  'collections/catalogs',
  'views/gallery'
  ], function(Backbone, Catalogs, Gallery) {

  var galleryWindow = '\
  <div class="m">\
    <div class="m_m">\
      <div class="m_m_m">\
        <div class="gall m_m_m_body">\
          <div class="gall m_m_m_header">\
            <div class="m_menu">\
              <ul>\
                <% for (i=0; i<data.gallery.length; i++) { %>\
                  <% if (data.options.name == data.gallery[i].id) { %>\
                    <li class="active">\
                  <% } else { %>\
                    <li>\
                  <% } %>\
                    <a href="#catalog/<%= data.gallery[i].id %>"><%= data.gallery[i].title %></a>\
                  </li>\
                <% } %>\
              </ul>\
            </div>\
            <div class="m_close"></div>\
          </div>\
          <div class="gall m_m_m_content">\
          </div>\
        </div>\
      </div>\
    </div> \
  </div>';

  var GalleryWindow = Backbone.View.extend({
      name: 'galleryWindow',
      open: null,
      data: [],
      loading: false,

      events: {
        'click .m_close': 'closeWindow',
        'click .m': 'closeAround'
      },

      initialize: function(options) {
          this.app = options.app;
          this.gallerys = [];
          this.collection = new Catalogs();
          var _this = this;
          this.collection.fetch().complete(function(collection, response, options){
              _this.generateData(_this);
              _this.loading = true;
              _this.render(_this.temp);
          });


      },

      closeAround: function(e) {
        var target = this.$(e.target).attr('class');
        if (target === 'm' || target === 'm_m' || target === 'm_m_m') {
          this.closeWindow()
        }
      },

      render: function(options) {
          this.temp = options;
          if (this.loading) {
              if (this.open === null ) {
                  if(!options) {
                      options = {};
                      options.name = '';
                  }
                  var params = {};
                  params.gallery = this.data;
                  params.options = options;
                  this.app.page.$el.append(this.$el.append(_.template(galleryWindow, {data: params})));
                  this.open = true;
              } else {
                  this.$el.css('display', 'block');
                  this.open = true;
                  this.setActive(options);
              }
              if (this.collection.get(options.name)) {
                  for (var i=0; i < this.gallerys.length; i++) {
                      if (this.gallerys[i].model.id == options.name) {
                          var load = this.gallerys[i];
                      }
                  }
                  if (!load) {
                      var g = new Gallery({model: this.collection.get(options.name)});
                      this.gallerys.push(g);
                      g.gallerys = this.gallerys;
                      g.app = this.app;
                      this.$('.m_m_m_content').append(g.render(options).el);
                      g.initComponents(options);
                  }
                  this.collection.get(options.name).set({open: true});
              }
          }

      },

      closeWindow: function() {
          this.$el.css('display', 'none');
          this.open = false;
          this.app.navigate('/');
      },

      generateData: function(_this) {
          for (var i=0; i<_this.collection.length; i++) {
              _this.data.push(_this.collection.models[i].toJSON())
          }
      },

      setActive: function(options) {
          this.$('.m_menu ul li.active').removeClass('active');
          this.$('[href="#catalog/' + options.name + '"]').parent().addClass('active');
      }

  });

  return GalleryWindow;
});
