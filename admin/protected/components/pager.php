<?php
class Pager extends CWidget{
	
	public $pagecount;
	public $selectedpage;
	public $link;
	
	function run(){
		if(!$this->selectedpage){
			$this->selectedpage=1;
		}
		$this->render('application.components.view.pager.pager', array('pager'=>$this));
	}
	
	static function printPage($pager, $page){
		$link=$pager->link;
		$link['page']=$page;
		$html="\n".'<a href="'.CHtml::normalizeUrl($link).'" class="';
		if($page==$pager->selectedpage){
			$html.="a ";
		}
		$html.='str_a">'.$page.'</a>';
		return $html;
	}
	
	static function spandotdotdot(){
		$html='<span>...</span>';
		return $html;
	}
	
}