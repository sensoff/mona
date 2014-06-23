(function() {
  require.config({
    paths: {
      backbone: '../js/components/backbone/backbone',
      'backbone-validation': '../js/components/backbone-validation/backbone-validation',
      fotorama: '../js/components/fotorama/fotorama',
      jquery: '../js/components/jquery/jquery',
      underscore: '../js/components/underscore/underscore',
      slider: '../js/components/slider/slider',
      customSelect: '../js/components/customSelect/customSelect',
      scroll: '../js/components/scroll/scroll',
      rating: '../js/components/rating/rating'
    },
    shim: {
      underscore: {
        exports: '_'
      },
      backbone: {
        deps: ['underscore', 'jquery'],
        exports: 'Backbone'
      },
      'backbone-validation': {
        deps: ['underscore', 'jquery', 'backbone'],
        exports: 'validation'
      },
      fotorama: {
        deps: ['jquery'],
        exports: 'fotorama'
      },
      slider: {
        deps: ['jquery'],
        exports: 'slider'
      },
      customSelect: {
        deps: ['jquery'],
        exports: 'customSelect'
      },
      scroll: {
        deps: ['jquery'],
        exports: 'scroll'
      },
      rating: {
        deps: ['jquery'],
        exports: 'rating'
      }
    }
  });

  require(['app'], function(app) {
    Backbone.history.start();
  });

}).call(this);
