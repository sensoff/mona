

<div class="conteiner">
	<img alt="logo" src="../images/logo.png" width="200" />
</div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<div class="conteiner">
		<div class="form">
			<div class="line">
				<div class="label">Логин:</div>
				<div class="input">
					<?php echo $form->textField($model,'username'); ?>
				</div>
			</div>
			<div class="line">
				<div class="label">Пароль:</div>
				<div class="input">
					<?php echo $form->passwordField($model,'password', array('class'=>'block2')); ?>
				</div>
			</div>
			<div class="line">
				<?php echo $form->checkBox($model,'rememberMe', array('id'=>'check1')); ?>
				<label for="check1">Запомнить меня</label>
			</div>
			<div class="line">
				<button>Авторизация</button>
			</div>

		</div>
	</div>

	<?php $this->endWidget(); ?>
