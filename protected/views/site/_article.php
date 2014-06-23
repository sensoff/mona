<?php 
if(isset($article)){
?>
<div class="conteiner">
		<div class="page_title"><?php echo $article->__get('name_lang'.$this->lang);
		// !todo: unhardcode lang
		?></div>
		<div class="article">
			<?php echo $article->__get('main_text_lang'.$this->lang);
			// !todo: unhardcode lang
			?>
		</div>
	</div>
<?php }?>