		<div class="conteiner">
			<div class="left_sidebar">
				<div class="page_title">
					Настройки
				</div>
			</div>
			<div class="center">
			<?php if(isset($status)){
				if($status==1){
			?>
				<div class="flash ok cell8">
					<div class="text">
						Данные усрешно сохранены
					</div>
					<div class="close"></div>
				</div>
				<?php }}?>
			</div>
		</div>
		<div class="conteiner">

			<div class="center">
			<form action="<?php echo CHtml::normalizeUrl(array('/site/saveuser'))?>" method="post">
				<div class="tactions cell8">
					<div class="form_title">
						Системные настройки
					</div>
				</div>
				<div class="tactions cell8">

					<div class="preform">
						Поля отмеченные <span class="form_title_marker">*</span> обязательны для заполнения
					</div>
				</div>
				<div class="table cell8 prosmotr">

					<div class="tbody">
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Имя:<sup class="form_title_marker">*</sup></span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="login" type="text" value="<?php echo $user['name']?>">
										<span class="error">

										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Пароль:<sup class="form_title_marker">*</sup></span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="password" type="password">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Новый пароль:</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="newpassword" type="password">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Подтвердите новый пароль:</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="newpasswordconf" type="password">
									</span>
								</div>
							</div>
						</div>

					</div>

				</div>

				<div class="tactions cell8">
					<button class="block2 btn ok"><span>Сохранить</span></button>
				</div>
			</form>
			</div>



			<div class="center">
			<form action="<?php echo CHtml::normalizeUrl(array('/site/SaveContacts'))?>" method="post">
				<div class="tactions cell8">
					<div class="form_title">
						Контакты
					</div>
				</div>
				<div class="tactions cell8">

					<div class="preform">
						Поля отмеченные <span class="form_title_marker">*</span> обязательны для заполнения
					</div>
				</div>
				<div class="table cell8 prosmotr">
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Название фирмы</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="firm" value="<?php echo $params[0]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">УНП</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="unp" value="<?php echo $params[1]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Контактный телефон</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" value="<?php echo $params[2]['value']?>" name="phone" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Контактный email</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" value="<?php echo $params[3]['value']?>" name="email" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Вконтакте</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="vk" value="<?php echo $params[4]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Однокласники</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="odn" value="<?php echo $params[5]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Facebook</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="fb" value="<?php echo $params[6]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Instagram</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="instagram" value="<?php echo $params[7]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Слоган</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<input class="block2" name="slogan" value="<?php echo $params[8]['value']?>" type="text">
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Текст в слайдере</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<textarea class="block2" name="main_text"><?php echo $params[9]['value']?></textarea>
									</span>
								</div>
							</div>
						</div>


					</div>
					<div class="tactions cell8">
					<button class="block2 btn ok"><span>Сохранить</span></button>
				</div>

			</form>
			</div>
<!--
			<div class="center">
			<form action="<?php echo CHtml::normalizeUrl(array('/site/saveDays'))?>" method="post">
				<div class="tactions cell8">
					<div class="form_title">
						График работы
					</div>
				</div>
				<div class="tactions cell8">
					<div class="preform">
						Если день не будет заполнен, или одно из 2-х полей "с" и "по" не заполнены, то день считается Выходным<span class="form_title_marker">*</span>
					</div>
				</div>
			<div class="table cell8 prosmotr">
			<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Понедельник</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span> <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[one_day_start]" value="<?php echo $days['one_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span><input class="block2" style="width: 70px;" name="Days[one_day_end]" value="<?php echo $days['one_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Вторник</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span>  <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[thow_day_start]" value="<?php echo $days['thow_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span> <input class="block2" style="width: 70px;" name="Days[thow_day_end]" value="<?php echo $days['thow_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Среда</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span> <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[three_day_start]" value="<?php echo $days['three_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span> <input class="block2" style="width: 70px;" name="Days[three_day_end]" value="<?php echo $days['three_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Четверг</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span>  <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[four_day_start]" value="<?php echo $days['four_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span> <input class="block2" style="width: 70px;" name="Days[four_day_end]" value="<?php echo $days['four_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Пятница</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span>  <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[five_day_start]" value="<?php echo $days['five_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span> <input class="block2" style="width: 70px;" name="Days[five_day_end]" value="<?php echo $days['five_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Суббота</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span>  <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[six_day_start]" value="<?php echo $days['six_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span> <input class="block2" style="width: 70px;" name="Days[six_day_end]" value="<?php echo $days['six_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="tablecell cell2">
								<div class="tcontent">
									<span class="cell_name">Воскресенье</span>
								</div>
							</div>
							<div class="tablecell cell6">
								<div class="tcontent">
									<span class="cell_value">
										<span style="float:left; padding-right: 10px;">С</span>  <input class="block2" style="width: 70px; margin-right: 10px;" name="Days[seven_day_start]" value="<?php echo $days['seven_day_start']?>" type="text">
										<span style="float:left; padding-right:10px;">По </span> <input class="block2" style="width: 70px;" name="Days[seven_day_end]" value="<?php echo $days['seven_day_end']?>" type="text">
									</span>
								</div>
							</div>
						</div>
						</div>
						<div class="tactions cell8">
					<button class="block2 btn ok"><span>Сохранить</span></button>
				</div>
			</form>

		</div>-->
	</div>
