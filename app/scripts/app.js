define([
    'backbone',
    'models/options',
    'mainpage'
    ], function(
        Backbone,
        optionsModel,
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
            console.log('index');
        },

        order: function(price, img) {
            if (price && img) {
              console.log('with price');
            } else {
              console.log('without price');
            }
            console.log('add order');
        },

        comment: function() {
            console.log('add comment');
        },

        catalog: function(name) {
            console.log('catalog ' + name);
        },

        gallery: function(name, id) {
            console.log('catalog ' + name + ' ' + id);
        }
    });

    return new App;

});
