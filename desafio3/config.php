<?php
	/**
 	*  Carrega a aplicação
 	*/

 	// Url base
 	define( 'BASE_URL', dirname( __FILE__ ));

 	// Url base views
 	define( 'VIEWS', BASE_URL.'/app/views/');

 	// Url base controllers
 	define( 'CONTROLLERS', BASE_URL.'/app/controllers/');

 	// Url base models
 	define( 'MODELS', BASE_URL.'/app/models/');

 	// Url base herpers
 	define( 'HELPERS', BASE_URL.'/helpers/');


 	// Debug
 	$debug = true;
 	if ($debug) {
 		error_reporting(E_ALL);
 		ini_set("display_errors", 1);
 	}else{
 		error_reporting(0);
 		ini_set("display_errors", 0);
 	}

 	$file = BASE_URL.'/app/class/main_controller.class.php';

 	if (!file_exists($file)) {
 		require_once BASE_URL.'/includes/error_404.php';
 		return;
 	}else{
 		require_once $file;
 		$main = new MainController();
 	}



?>