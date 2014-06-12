define([
    'backbone',
    'backbone-validation'
    ], function(Backbone, validation) {

    var Options = Backbone.Model.extend({
        defaults: {
            order: null,
            gallery: null,
            comment: null
        }
    });

    return Options;

});
