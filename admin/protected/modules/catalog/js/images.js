jQuery(function($) {
	$('#add_image_field').click(function() {
		jQuery.ajax({'type':'POST','data':{
			'id': last=$('.dop_images').last().attr('id'),	
		},
			'url':'/anastasia/admin/index.php?r=catalog/product/AjaxImages',
			'success':function(data) {
         	try{
         		 $("#dop_images").html($("#dop_images").html()+data);
         	}catch(ex){
         		alert("error"+ex.description);
         	}
         },'cache':false});return false;
	})
});