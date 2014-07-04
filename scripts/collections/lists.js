define([
  'backbone',
  'models/list'
  ], function(Backbone, ListModel) {

  var json = [
    {
      "id":"kitchens",
      "title":"Кухни",
      "images":[
        {"img":"1.jpg","title":"222"},
        {"img":"2.jpg","title":"222"},
        {"img":"3.jpg","title":"222"},
        {"img":"4.jpg","title":"222"},
        {"img":"5.jpg","title":"222"},
        {"img":"6.jpg","title":"222"},
        {"img":"7.jpg","title":"222"},
        {"img":"8.jpg","title":"222"}
      ]
    },{
      "id":"cabinets",
      "title":"Горки",
      "images":[
        {"img":"5.jpg","title":"222"},
        {"img":"2.jpg","title":"222"},
        {"img":"3.jpg","title":"222"},
        {"img":"4.jpg","title":"222"},
        {"img":"5.jpg","title":"222"},
        {"img":"6.jpg","title":"222"},
        {"img":"7.jpg","title":"222"},
        {"img":"8.jpg","title":"222"}
      ]
    },{
      "id":"wardrobes",
      "title":"Шкафы-купе",
      "images":[
        {"img":"2.jpg","title":"222"},
        {"img":"2.jpg","title":"222"},
        {"img":"3.jpg","title":"222"},
        {"img":"4.jpg","title":"222"},
        {"img":"5.jpg","title":"222"},
        {"img":"6.jpg","title":"222"},
        {"img":"7.jpg","title":"222"},
        {"img":"8.jpg","title":"222"}
      ]
    }
  ];

  var ListsCollection = Backbone.Collection.extend({
      model: ListModel,
      url: 'get-catalog',

      initialize: function() {
          this.reset(json);
      }
  });

  return ListsCollection;

});
