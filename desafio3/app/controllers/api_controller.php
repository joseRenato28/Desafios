<?php
Class ApiController extends MainController
{
	
	function __construct()
	{	
		header('Content-Type: application/json');
	}

	public function index(){
		echo json_encode("olar");
	}

	public function text(){
		echo "[".json_encode($this->load_model('api_model')->text()->fetch(PDO::FETCH_ASSOC))."]";
	}

	public function images(){
		$result = $this->load_model('api_model')->images();
		$response = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = array(
					'id_image' => $row['id_image'],
					'route_image' => $row['route_image'],
					'title_image' => $row['title_image']
				);

		}
		echo json_encode($response);
	}
}
?>