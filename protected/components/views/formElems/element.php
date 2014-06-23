<div class="line" <?php if($lineId!=null){?>
id="<?php echo $lineId ?>"
<?php }?>
>
										<div class="title">
											<div class="m_text"><?php echo $lable?></div>
                                        	<?php if($dop_text){?>
                                        		<div class="dop_text"><?php echo $dop_text?></div>
                                        	<?php }?>
										</div>
										<div class="value">
											<div class="item">
												<?php echo $elem?>
											</div>
											<div class="error">
												<?php echo $error?>
											</div>
										</div>
									</div>