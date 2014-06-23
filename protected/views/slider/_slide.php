<div class="slide <?php if($i==0) echo 'show'; ?>" style="left: <?php echo $left ?>">
	<a href="#" class="some_slide"> <img
		src="<?php echo Yii::app()->baseUrl.'/images/slider/'.$slide->file?>" alt="name"> <span class="text">
			<span> <?php echo $slide->__get('text_lang'.$this->lang);
			// !todo: languages change hardcode
			?></span>
	</span>
	</a>
</div>
