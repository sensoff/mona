
$(window).load(function() {
	lang = new language();
});



$('.stat.language').on('click', '.line.btn', function(){
	lang.setActive( $(this).attr('atr') );
});

$('.form').on('click', '.form_title.asbutton', function(){
	lang.setActive( $(this).attr('atr') );
});


function language(){
	this.active = 'rus';
	
	this.setActive = function(active_new){
		if (this.active != active_new){
			$('.stat.language .line.btn.' + this.active).removeClass('active');
			$('.stat.language .line.btn.' + active_new).addClass('active');
			
			$('.conteiner.tactions.cell8.form_title.asbutton.' + this.active).removeClass('active');
			$('#' + this.active).slideToggle(500);
			
			$('.conteiner.tactions.cell8.form_title.asbutton.' + active_new).addClass('active');
			$('#' + active_new).slideToggle(500);
			this.active = active_new;
		}else{
			$('.stat.language .line.btn.' + this.active).removeClass('active');
			$('.conteiner.tactions.cell8.form_title.asbutton.' + this.active).removeClass('active');
			$('#' + this.active).slideToggle(500);
			this.active = 0;
		}
		//alert(lang.active);
	};
}