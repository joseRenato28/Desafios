<?php

/**
* 
*/
class AdminController extends MainController
{
	
	public $title = 'DESAFIO #3 BACKEND ADMIN';
	public $get_image;
	public $get_details_image;
	public $date;
	function __construct()
	{	
		session_start();
		if(!isset($_SESSION['id_user'])){
			Header("Location:".$this->site_url('login'));
		}
		$this->load_library('wideimage/WideImage.php');
		$this->date = $this->load_helper('date_helper');
	}

	public function index(){
		$this->load_view('admin/template/header', 'admin/index', 'admin/template/footer');
	}

	public function imagens(){
		$this->get_image = $this->load_model('image_model')->get_image();
		$this->load_view('admin/template/header', 'admin/imagens/index', 'admin/template/footer');
	}
	public function detalhesimagem(){
		$id_image = $_POST['id_image'];
		$this->get_details_image = $this->load_model('image_model')->get_details($id_image);
		if($this->get_details_image->rowCount() > 0){
			echo json_encode($this->get_details_image->fetch(PDO::FETCH_ASSOC));
		}else{
			echo 'Nenhum registro encontrado';
		}
	}
	public function upload(){
		if(isset($_FILES['image']['tmp_name'])){
			$file = $_FILES['image']['tmp_name'];
			$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			$ext = strtolower($ext);
			if (strstr('jpg;jpeg;png;', $ext)){
				$new_name = uniqid(time ()).".".$ext;

				if(WideImage::load($file)->resize(380, 380)->saveToFile(BASE_URL.'/uploads/'.$new_name)){
					echo "Não foi possível realizar o upload da imagem";
				}else{
					echo "true|".$this->site_url('uploads/'.$new_name);
				}
			}else{
				echo "Formato de arquivo invalido";
			}
		}else{
			echo "Não foi possivel recuperar o arquivo";
		}
	}
	public function saveimage(){
		$data = array('id_image' => $_POST['id_image'],
						'route_image' => $_POST['route_image'],
						'title' => $_POST['title_image'],
						'id_user' => 1);
		if($this->load_model('image_model')->create_image($data)){
			echo "Imagem alterada com sucesso";
		}else{
			echo "Ocorreu algum problema para alterar a imagem";
		}
	}

	public function text(){
		$result = $this->load_model('text_model')->get_text();
		if($result){
			if($result->rowCount() > 0){
				echo json_encode($result->fetch(PDO::FETCH_ASSOC));
			}else{
				echo 'Nenhum registro encontrado';
			}
		}else{
			echo "Não foi possivel recuperar os dados do texto";
		}
	}

	public function savetext(){
		$data = array('text' => $_POST['text'],
					'color' => $_POST['color_text'],
					'id_user' => 1);
		if($this->load_model('text_model')->create_text($data)){
			echo "Texto alterada com sucesso";
		}else{
			echo "Ocorreu algum problema para alterar o texto";
		}
	}
}

?>