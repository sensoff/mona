<div class="back_to_top"></div>
<div id="content">
	<div class="conteiner">
		<nav class="filters">

			<a <?php if(empty($type)) echo 'class="active"'?> href="<?php echo Yii::app()->baseUrl?>/what-we-do/"><span>all</span> </a>
			<a <?php if(!empty($type) && $type==1) echo 'class="active"'?> href="<?php echo Yii::app()->baseUrl?>/what-we-do/tatoo/"><span>tatoo</span></a>
			<a <?php if(!empty($type) && $type==2) echo 'class="active"'?> href="<?php echo Yii::app()->baseUrl?>/what-we-do/permanent/"><span>permanent</span></a>
			<a <?php if(!empty($type) && $type==3) echo 'class="active"'?> href="<?php echo Yii::app()->baseUrl?>/what-we-do/flash/"><span>flash</span></a>
		</nav>
	</div>

	<div class="conteiner">
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/libs/underscore/underscore.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/libs/backbone/backbone.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/pictures2.js"></script>
	<script type="text/javascript"  src="<?php echo Yii::app()->baseUrl?>/js/backtotop.js"></script>
	<?php $this->renderPartial('_templatejs');?>

		<div class="images sens_pictures">
			<script type="text/javascript">
				$(document).ready(function($) {

					window.Page = new window.App.Models.Page({ scrollbottom_render: true });
					window.PageView = new App.Views.Page({ model: window.Page });

					window.MastersCollection = new window.App.Collections.Master();
					window.MastersCollection.reset(<?php echo CJSON::encode($masters); ?>);
					window.MastersView = new App.Views.Masters({ collection: window.MastersCollection });

					window.PicturesCollection = new window.App.Collections.Picture();
					window.PC = <?php
									if (empty($products)){
										echo '[{"empty":"true"}]';
									}else{
										echo CJSON::encode($products);
									}
								?>;

					if ( window.PC[0]['empty'] != 'true' ){
						window.PicturesCollection.reset( window.PC  );
					    window.PicturesView = new App.Views.Pictures({ collection: window.PicturesCollection });
              window.ModalHeader = new App.Views.ModalHeader({ collection: window.PicturesCollection });
					    window.ModalContent = new App.Views.ModalContents({ collection: window.PicturesCollection });
					    window.ModalFooter = new App.Views.ModalFooter({ collection: window.PicturesCollection });
					}else{
						var html = '<div class="conteiner" style="padding: 50px 0; font: bold 30px Verdana, Tahoma, Arial; color: #9d9d9d; text-align: center; ">';
						if( window.PageView.model.get('lang') == 1 ) {
							html = html + ' Нет фото';
						}
						if( window.PageView.model.get('lang') == 2 ) {
							html = html + ' No foto';
						}
						if( window.PageView.model.get('lang') == 3 ) {
							html = html + ' Няма фотаздымкаў';
						}
						window.PageView.$el.append(html);
					}
					console.log('Разрабока сайта dr.sensoff@yandex.ru & soad2003@gmail.com')
   					//console.log(window.PageView);
   					//console.log(window.PicturesView);
				});

			</script>
			<?php
/*				for($i=0;$i<count($products);$i++){
					$this->renderPartial('_photo', array('product'=>$products[$i]));
				}*/
			?>

		</div>
	</div>

</div>
