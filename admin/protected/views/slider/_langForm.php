<?php $img=Yii::app()->baseUrl.'/images/language/'.$lang->img?>
<div class="conteiner tactions cell8 form_title asbutton <?php echo $lang->name;if($lang->id == 1){echo ' active';}?>" atr="<?php echo $lang->name; ?>">
						<span class="image"><img src="<?php echo $img?>"></span>
						Параметры на <?php echo $lang->description2 ?> языке
				</div>
				<div class="conteiner" id="<?php echo $lang->name; ?>" style="<?php echo $style ?>">

					<div class="table cell8 prosmotr">
						
						<div class="tbody">
							<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'req'=>$req, 'elem'=>'text_lang'.$lang->id, 'elemtype'=>'textedit'))?>						
						</div>	
							
					</div>
				</div>