<?php $img=Yii::app()->baseUrl.'/images/language/'.$lang->img?>
<div class="conteiner tactions cell8 form_title asbutton <?php echo $lang->name;if($lang->id == 1){echo ' active';}?>" atr="<?php echo $lang->name; ?>">
						<span class="image"><img src="<?php echo $img?>"></span>
						Параметры на <?php echo $lang->description2 ?> языке
				</div>
				<div class="conteiner" id="<?php echo $lang->name; ?>" style="<?php echo $style ?>">

					<div class="table cell8 prosmotr">
						
						<div class="tbody">
							<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'req'=>$req, 'model'=>$model, 'elem'=>'name_lang'.$lang->id, 'elemtype'=>'textfield'))?>
							<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'description_lang'.$lang->id, 'elemtype'=>'textedit'))?>						
						</div>	
							
					</div>
				<?php if($act=='u'){?>
					<div class="conteiner tactions block8 form_title">
							Параметры для CEO на <?php echo $lang->description2 ?> языке
					</div>
					<div class="table cell8 prosmotr">
						
						<div class="tbody">
							<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'title_lang'.$lang->id, 'elemtype'=>'textfield'))?>
	<?php $this->renderPartial('application.views.site._formLine', array('form'=>$form, 'model'=>$model, 'elem'=>'description_meta_lang'.$lang->id, 'elemtype'=>'textarea'))?>
							
						</div>	
							
					</div>
					<?php }?>
				</div>