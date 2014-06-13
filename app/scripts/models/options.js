define([
    'backbone',
    'backbone-validation'
    ], function(Backbone, validation) {

    var Options = Backbone.Model.extend({
        defaults: {
            order: null,
            gallery: null,
            comment: null,
            catalog: null
        }
    });

    return Options;

});
