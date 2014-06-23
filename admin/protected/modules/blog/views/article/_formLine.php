<?php 
?>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name"><?php 
									$lable=$model->attributeLabels();
									echo $lable[$elem]; ?><span class="form_title_marker">*</span></span>
									
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<?php 
										if($elemtype=='textfield'){
											echo $form->textField($model,$elem,array('size'=>50,'maxlength'=>50)); 
										}
										if($elemtype=='textedit'){
											$this->widget('application.extensions.cleditor.ECLEditor', array(
												'model'=>$model,
												'attribute'=>$elem, //Model attribute name. Nome do atributo do modelo.
												'options'=>array(
														'width'=>'800',
														'height'=>'200',
														'useCSS'=>true,
												),
												'value'=>'', //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
										));
										}
										if($elemtype=='checkbox'){
											echo $form->checkBox($model,$elem); 
										}
										?>
										<span class="error">
											<?php echo $form->error($model,$elem); ?> 
										</span>
									</span>
								</div>
							</div>
						</div>