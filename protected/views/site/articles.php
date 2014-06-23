				<div class="back_to_top">
					back to top
				</div>
				<div id="content">
				<?php for ($i=0;$i<count($articles);$i++){
					if($articles[$i]->id!=1){
					?>
					<div class="conteiner articles">
						<div class="page_title">
							<h2><?php echo $articles[$i]->__get('name_lang'.$this->lang)?></h2>
						</div>
						<div class="article">
							<?php echo $articles[$i]->__get('main_text_lang'.$this->lang)?>
						</div>
					</div>
				<?php }}?>
				</div>