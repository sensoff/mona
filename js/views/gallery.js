define([
  'backbone',
  'fotorama',
  'scroll',
  'models/catalog'
  ], function(Backbone, fotorama, scroll, Catalog) {

  var gallery_template = '\
  <% if(data.model.images.length !== 0 ){ %>\
    <div class="gallery_content">\
      <div class="arrow left"></div>\
      <div class="fotorama_container">\
          <div class="fotorama">\
          </div>\
      </div>\
      <div class="arrow right"></div>\
    </div>\
    <div class="gallery_navigate">\
      <div class="viewport images_container">\
        <div class="overview images" style="width: <%= data.model.images.length*220+20 %>px;">\
          <% for (var i=0; i< data.model.images.length; i++) { %>\
              <a href="#" <% if (data.active == i+1) { %> class="active" <% } %> data-imgcount="<%= i %>">\
                <img src="images/products/small/<%= data.model.images[i].img %>">\
              </a>\
          <% } %>\
        </div>\
      </div>\
      <div class="scrollbar">\
        <div class="track">\
          <div class="thumb">\
            <div class="end"></div>\
          </div>\
        </div>\
      </div>\
    </div>\
    <div class="gallery_footer">\
      <span>1</span> из <%= data.model.images.length %>\
    </div>\
  <% } else { %>\
  <div class="gallery_content no-bg">\
      <p>В данном каталоге пока нету изображений</p>\
  </div>\
  <% } %>\
  ';

  var Gallery = Backbone.View.extend({
      open: null,
      model: Catalog,
      className: 'gallery',

      events: {
          'click .arrow.right': 'next',
          'click .arrow.left': 'last',
          'click [data-imgcount]': 'custom'
      },

      initialize: function(options) {
          this.name = this.model.id;
          this.model.on('change:open', this.show, this);
      },

      render: function(options) {
          this.model.set({open: true});
          this.model.set({loading: true});
          var params = {};
          params.model = this.model.toJSON();
          if (!options) {
              options = {};
              options.active = 1;
          }
          params.active = options.active;
          this.$el.append(this.$el.append(_.template(gallery_template, {data: params})));
          return this;
      },

      show: function() {
          for (var i=0; i< this.gallerys.length; i++) {
              if (this.gallerys[i].model.get('open') === true && this.gallerys[i].name !== this.name) {
                  this.gallerys[i].model.set({open: false}, {silent: true});
                  this.gallerys[i].$el.css('display', 'none');
              }
          }
          this.$el.css('display', 'block');
          if (this.fotorama){
              this.$('.fotorama').data('fotorama').resize({width: 580, height: 360});
          }
      },

      initComponents: function(options) {
          this.$('.gallery_navigate').tinyscrollbar({ axis: 'x'});
          var images = [];
          for (var i=0; i<this.model.get('images').length; i++) {
              images.push({img: 'images/products/medium/' + this.model.get('images')[i].img});
          }
          fotorama_options = {
              width: '100%',
              ratio: '580/360',
              nav: false,
              arrows: false,
              click: true,
              swipe: true,
              loop: true,
              data: images
          };
          this.fotorama = this.$('.fotorama').fotorama(fotorama_options).data('fotorama');
          var _this = this;
          this.$('.fotorama').on('fotorama:showend ', function (e, fotorama, extra) {
              _this.setActiveImage(fotorama.activeFrame.i)
          });
          if (options) {
              if (options.active) {
                  this.$('.fotorama').data('fotorama').show(options.active-1);
                  this.$('.gallery_footer span').html(options.active);
              } else {
                  this.setActiveImage(1);
              }
          }
      },

      next: function() {
          this.$('.fotorama').data('fotorama').show('>');
      },

      last: function() {
          this.$('.fotorama').data('fotorama').show('<');
      },

      custom: function(e) {
          e.preventDefault();
          e.stopPropagation();
          var custom_image = this.$(e.currentTarget).data('imgcount');
          this.$('.fotorama').data('fotorama').show(custom_image);
      },

      setActiveImage: function(count) {
          if (this.$('.gallery_navigate .active')[0]) {
              this.$('.gallery_navigate .active')[0].className = '';
          }
          this.$('.gallery_navigate a')[count-1].className = 'active';
          this.$('.gallery_footer span').html(count);
          if (this.model.get('images').length > 4) {
              this.setScroll(count);
          }
          this.app.navigate('catalog/' + this.model.id + '/' + count , {trigger: false, replace: true});
      },

      setScroll: function(count) {
          var left = parseInt(this.$('.gallery_navigate .thumb').css('left'));
          var scroll_width = parseInt(this.$('.gallery_navigate .thumb').css('width'));
          var navigate_width = parseInt(this.$('.gallery_navigate .overview').css('width'));
          var width = 900;
          /*console.log(left)
          console.log(scroll_width)
          console.log(navigate_width)*/
          //this.$('.gallery_navigate').tinyscrollbar_update(50);
          //TODO анимация для навигации
      }

  });

  return Gallery;
});
