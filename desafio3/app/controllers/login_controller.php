<?php
Class LoginController extends MainController{
	public $title = 'Area restrita';
	public $error;
	function __construct(){
		session_start();
		if(isset($_SESSION['id_user'])){
			Header("Location:".$this->site_url('admin'));
		}
	}

	public function index(){
		$this->load_view(null, 'admin/login', null);
	}

	public function logar(){
		if(!isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['email']) || empty($_POST['password'])){
			$this->error = "Todos os campos são obrigatórios";
			$this->load_view(null, 'admin/login', null);
			return;
		}
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$this->error = "E-mail invalido";
			$this->load_view(null, 'admin/login', null);
			return;
		}

		$data = array('email' => $_POST['email'],
						'password' => $_POST['password']);

		$result = $this->load_model('login_model')->logar($data);
		if($result != false){
			if($result->rowCount() > 0){
				while($row = $result->fetch(PDO::FETCH_ASSOC)){
					$_SESSION['id_user'] = $row['id_user'];
					$_SESSION['name_user'] = $row['name_user'];
					Header("Location:".$this->site_url('admin'));
				}
			}else{
				$this->error =  "Usuário não encontrado";
				$this->load_view(null, 'admin/login', null);
			}
			
		}else{
			$this->error = "Ocorreu algum erro para efetuar o login";
			$this->load_view(null, 'admin/login', null);
		}
	}

	public function logout(){
		session_destroy();
	}

}
?>