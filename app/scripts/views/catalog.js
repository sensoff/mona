define([
  'backbone'
  ], function(Backbone) {

  var CatalogView = Backbone.View.extend({
      el: '#catalog',

      initialize: function(options) {
          this.params = options.params;
          this.app = options.app;
          this.fotoramaEvents();
      },
      fotoramaEvents: function() {
          var _this = this;
          this.$('.fotorama').on('fotorama:showend ', function (e, fotorama, extra) {
              _this.selectMenu(fotorama.activeFrame.i);
              var $active = _this.$('menu item:nth-child(' + fotorama.activeFrame.i + ') a');
              _this.app.navigate('catalog/' + $active.attr('data-menu'))
          });
      },

      selectMenu: function(position) {
          var $active = this.$('menu item:nth-child(' + position + ') a');
          var $last_active = this.$('menu item a.active');
          $last_active.removeClass('active');
          $active.addClass('active');

      },

      selectCatalog: function(name) {
          var item = this.$('menu item [data-menu="'+ name +'"]');
          var position = this.$('menu item [data-menu]').index(item) + 1;
          this.selectMenu(position);
          this.$('.fotorama').data('fotorama').show(position-1);
      }

  });

  return CatalogView;
});
