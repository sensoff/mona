<?php
class Pager extends CWidget{
	
	public $pagecount;
	public $selectedpage;
	public $link;
	
	function run(){
		if(!$this->selectedpage){
			$this->selectedpage=1;
		}
		$this->render('pager/pager', array('pager'=>$this));
	}
	
	static function printPage($pager, $page){
		$link=$pager->link;
		$html="\n".'<a href="'.$link.'/'.$page.'" class="';
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