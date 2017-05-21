<?php
	Class MainController
{
	
	private $controller;
	private $method;
	private $parameter;
	private $not_found = '/includes/error_404.php';

	public function __construct(){
		
		$this->get_url_data();

		if (!$this->controller){
			require_once CONTROLLERS.'home_controller.php';
			
			$this->controller = new HomeController();
			
			$this->controller->index();
			
			return;
		
		}
		
		if (!file_exists(CONTROLLERS.$this->controller.'.php')){
			require_once BASE_URL.$this->not_found;
			return;
		}

		require_once CONTROLLERS.$this->controller.'.php';
		
		$this->controller = preg_replace('/[^a-zA-Z]/i', '', $this->controller);

		if (!class_exists($this->controller)){

			require_once BASE_URL.$this->not_found;
			return;
		} 
		
		$this->controller = new $this->controller($this->parameter);
		
		$this->method = preg_replace('/[^a-zA-Z]/i', '', $this->method);
		

		if (method_exists($this->controller, $this->method)){
			$this->controller->{$this->method}( $this->parameter);
			
			return;
		} 
		
		if (!$this->method && method_exists($this->controller, 'index')){
			$this->controller->index($this->parameter);		
			
			return;
		}
		
		require_once BASE_URL.$this->not_found;
		return;
	}

	public function chk_array($array, $key){
		if(isset($array[$key]) && !empty($array[$key])){
			return $array[$key];
		}
		return null;
	} 
	// Cara os models
	public function load_model($model_name = null){

		if ($model_name == null) return;
		
		$model_path = MODELS.$model_name.'.php';
		if (file_exists($model_path)){
			// vem mamae
			require_once BASE_URL.'/app/class/main_model.class.php';
			$oloc = new MainModel();
			require_once $model_path;
			
			$model_name = explode('/', $model_name);
			$model_name = end($model_name);
			$model_name = preg_replace('/[^a-zA-Z]/i', '', $model_name);
			if (class_exists($model_name)){

				return new $model_name();
			}
			return;
		}
	}
	// Carrega as view
	public function load_view($template_header = null, $view_path, $template_footer = null){
		if(!$view_path) return;

		if(isset($template_header)){
			$path_header = VIEWS.$template_header.'.php';
			if(file_exists($path_header)){
				require_once $path_header;
			}
		}

		$path = VIEWS.$view_path.'.php';

		if(file_exists($path)){
			require_once $path;
		}else{
			require_once BASE_URL.$this->not_found;
		}

		if(isset($template_footer)){
			$path_footer = VIEWS.$template_footer.'.php';
			if(file_exists($path_footer)){
				require_once $path_footer;
				return;
			}
		}
	}
	// Carrega os helpers
	public function load_helper($helper_name = null){
		if ($helper_name == null) return;
		
		$helper_path = HELPERS.$helper_name.'.php';
		if (file_exists($helper_path)){
			require_once $helper_path;
			
			$helper_name = explode('/', $helper_name);
			$helper_name = end($helper_name);
			
			$helper_name = preg_replace('/[^a-zA-Z]/i', '', $helper_name);
			if (class_exists($helper_name)){
				return new $helper_name();
			}
			return;
		}
	}
	// Pega a rota
	public function get_url_data(){
		if(isset($_GET['path'])){
			$path = $_GET['path'];

			$path = rtrim($path, '/');
			$path = filter_var($path, FILTER_SANITIZE_URL);

			$path = explode('/', $path);

			$this->controller = self::chk_array($path, 0);
			$this->controller .= '_controller';
			$this->method = self::chk_array($path, 1);

			if(self::chk_array($path, 2)){
				unset($path[0]);
				unset($path[1]);

				$this->parameter = array_values($path);
			}	
		}
	}
	// Carrega as lib
	public function load_library($lib_path){
		if ($lib_path == null) return;
		
		$path = BASE_URL.'/libs/'.$lib_path;
		if (file_exists($path)){
			require_once $path;
		}
	}
	public function site_url($url = null){
		return 'http://'.$_SERVER['SERVER_NAME'].'/trampo/desafio3/'.$url;
	}
}

	
?>