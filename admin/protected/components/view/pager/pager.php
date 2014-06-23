<div class="conteiner">
<?php
/*
 * @var Pager $pager
 */ 
$html='';
$html.="\n".'<div class="postr">';
if($pager->pagecount<9){
	for ($i=1;$i<$pager->pagecount+1;$i++){
		$html.=Pager::printPage($pager, $i);
	}
} else {
	if($pager->selectedpage<6){
		for($i=1;$i<8;$i++){
			$html.=Pager::printPage($pager,$i);
		}
		$html.=Pager::spandotdotdot();
		$html.=Pager::printPage($pager, $pager->pagecount);
	} else {
		if($pager->selectedpage>5 && $pager->selectedpage<$pager->pagecount-4){
			$html.=Pager::printPage($pager, 1);
			$html.=Pager::spandotdotdot();
			for($i=$pager->selectedpage-2;$i<$pager->selectedpage+3;$i++){
				$html.=Pager::printPage($pager, $i);
			}
			$html.=Pager::spandotdotdot();
			$html.=Pager::printPage($pager, $pager->pagecount);
		} else {
			if($pager->selectedpage>$pager->pagecount-5){
				$html.=Pager::printPage($pager, 1);
				$html.=Pager::spandotdotdot();
				for($i=$pager->pagecount-6;$i<$pager->pagecount+1;$i++){
					$html.=Pager::printPage($pager,$i);
				}
			}
		}
	}
}
$html.="\n".'</div>';
echo $html;
?>
					</div>	