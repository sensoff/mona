define([
    'backbone',
    'backbone-validation'
    ], function(Backbone, validation) {

    var Options = Backbone.Model.extend({
        defaults: {
            order: null,
            order_similar: null,
            gallery: null,
            comment: null
        }
    });

    return Options;

});
