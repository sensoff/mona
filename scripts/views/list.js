define([
  'backbone',
  'fotorama'
  ], function(Backbone, Fotorama) {

var list_template = '\
<div class="content">\
    <a class="arrow-left"></a>\
    <div class="fotorama-container">\
        <div class="fotorama"\
            data-arrows="false"\
            data-nav="false"\
            data-swipe="true"\
            data-auto="false"\
            data-loop="true"\
        >\
        <% for (var i=0; i<model.images.length; i++)  { %>\
            <img src="images/app/<%= model.images[i].img %>" data-caption="<span>~ <%= model.images[i].title %>$ </span><a data-list-a class=' + "list-add-order" + ' href='+"#add_order/<%= model.images[i].title %>/<%= model.images[i].img %>"+'>Заказать похожий</a>" />\
        <% } %>\
        </div>\
    </div>\
    <a class="arrow-right"></a>\
</div>\
<div class="counter"><span>1</span> из <%= model.images.length %></div>\
';

    var ListView = Backbone.View.extend({
        name: 'list',

        events: {
            'click .arrow-left': 'showLast',
            'click .arrow-right': 'showNext',
            'click [data-list-a]': 'createOrder'
        },

        initialize: function(options) {
            this.model = options.model;
            this.app = options.app;
            this.model.set({open: false});
            this.model.on('change:open', this.toggleOpen, this);
        },

        fotoramaEvents: function() {
            var _this = this;
            this.$('.fotorama').on('fotorama:showend ', function (e, fotorama, extra) {
                _this.app.navigate('catalog/' + _this.model.id + '/' + fotorama.activeFrame.i);
                _this.$('.counter span').html(fotorama.activeFrame.i);
            });
            this.$('.fotorama').on('fotorama:ready ', function (e, fotorama, extra) {
                _this.app.navigate('catalog/' + _this.model.id + '/' + fotorama.activeFrame.i);
                _this.$('.counter span').html(fotorama.activeFrame.i);
                if (_this.first) {
                    fotorama.show(_this.first_position - 1);
                    fotorama.first = null;
                }
            });
        },

        render: function() {
            this.$el.append(_.template(list_template, {model: this.model.toJSON()}));
            this.$('.fotorama').fotorama();
            this.fotoramaEvents();
            this.$el.css('display', 'none');
            return this.el;
        },

        toggleOpen: function() {
            this.$el.toggle(0);
        },

        showLast: function() {
            this.$('.fotorama').data('fotorama').show('<');
        },

        showNext: function() {
            this.$('.fotorama').data('fotorama').show('>');
        },

        showPosition: function(position) {
            if (this.$('.fotorama').data('fotorama')) {
                this.$('.fotorama').data('fotorama').show(position-1);
            } else {
                this.first_position = position;
                this.first = true;
            }

        },

        createOrder: function() {
            this.model.set({open: false});
            this.app.params.get('gallery').model.set({open: false});
        }


  });

  return ListView;
});
