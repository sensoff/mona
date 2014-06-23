<div class="stat">
		<?php
    $i = 0;
		foreach ($elems as $elem){
//	!todom Отделить дополнительные каталоги
      if ($i==3){
        echo '<div class="conteiner" style="padding: 20px 0;"></div>';
      }
			$this->renderPartial("application.views.site._count", array('elem'=>$elem));
      $i++;
		}
		?>

				</div>
