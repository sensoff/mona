<div id="content">
	<div class="conteiner">
<?php $this->renderPartial('/slider/_slider', array('masters'=>$masters, 'act'=>'masters'))?>
	</div>
		<script language="javascript">
							$(window).load(function() {
								myslider = new slider('slider1',906, 302, 3, 700, 0);
							});
						</script>
	<div class="conteiner">
		<div class="artist_custom_text">
			<div class="title">are you tatoo artist?</div>
			<div class="text">send portfolio to us</div>
			<div class="mail">ci8ty@mail.ru</div>
		</div>
	</div>
</div>
