define([
    'backbone',
    'mainpage'
    ], function(
        Backbone,
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
            console.log('init');
        },

        index: function() {
            console.log('index');
        },

        order: function(price, img) {
            console.log(price + ' ' + img)
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
