define([
    'jquery',
    'backbone',
    'models/options',
    'views/catalog',
    'views/comment',
    'views/order',
    'mainpage'
    ], function(
        $,
        Backbone,
        optionsModel,
        catalogView,
        commentView,
        orderView,
        mainpageModule
    ) {

    var App = Backbone.Router.extend({
        routes: {
            '': 'index',
            'add_order': 'order',
            'add_order/:price/:image': 'order',
            'add_comment': 'comment',
            'catalog/:name': 'catalog',
            'catalog/:name/:id': 'gallery'
        },

        initialize: function() {
            this.params = new optionsModel;
        },

        index: function() {
            this.catalog();
            console.log('index');
        },

        order: function(price, img) {
            if (price && img) {
                var options = {price: price, img: img};
            } else {
                var options = undefined;
            }
            if (this.params.get('order') === null) {
                this.params.set({order: new orderView({params: this.params})});
                $('[data-order-container]').append(this.params.get('order').render(options));
            }
            var order = this.params.get('order');
            if (options) {
                order.model.set({similar: true, img: options.img, price: options.price});
            } else {
                order.model.set({similar: false, img: undefined, price: undefined});
            }
            if (order.model.get('open') === false) {
                order.model.set({open: true});
            }
        },

        comment: function() {
            if (this.params.get('comment') === null) {
                this.params.set({comment: new commentView({params: this.params, app: this})});
                $('body').append(this.params.get('comment').render());
            }
            if (this.params.get('comment').model.get('open') === false) {
                this.params.get('comment').model.set({open: true});
            }
        },

        catalog: function(name) {
            if ($('#catalog') && this.params.get('catalog') === null ) {
                this.params.set({catalog: new catalogView({params: this.params, app: this})});
            }
            if (name) {
                this.params.get('catalog').selectCatalog(name);
            }
        },

        gallery: function(name, id) {
            console.log('catalog ' + name + ' ' + id);
        }
    });

    return new App;

});
