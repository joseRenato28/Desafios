<?php

/**
* 
*/
class HomeController extends MainController
{
	
	public $title = 'DESAFIO #3 BACKEND';
	public $images;
	public $text;
	function __construct()
	{	
		
	}

	public function index(){
		$this->images = $this->load_model('home_model');
		$this->text = $this->load_model('home_model')->get_text();

		$this->load_view('template/header', 'index', 'template/footer');
	}
}

?>