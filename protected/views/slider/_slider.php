
<div class="slider-container">
    <div class="slider-wrapper">
      <div id="slider" class="nivoSlider">
     		<?php for($i=0;$i<count($slides);$i++){ ?>
         	<img src="<?php echo Yii::app()->baseUrl.'/images/catalog/'.$slides[$i]->image1 ?>"
         			data-thumb="<?php echo Yii::app()->baseUrl.'/images/slider/'.$slides[$i]->image1 ?>"
         			alt="<?php $slides[$i]->name_lang1 ?>"
         			title="#htmlcaption<?php echo $i+1 ?>"
         	/>
        <?php } ?>
 			</div>

 			<?php for($i=0;$i<count($slides);$i++) { ?>
        <div id="htmlcaption<?php echo $i+1 ?>" class="nivo-html-caption">
        		<?php echo $slides[$i]->name_lang1 ?>
            <a href="#catalog/<?php echo $slides[$i]->url ?>"></a>
        </div>
      <?php  } ?>

		</div>
</div>
