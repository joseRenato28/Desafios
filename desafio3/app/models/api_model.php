<?php
Class ApiModel extends MainModel
{
	public function text(){
		$sql = 'SELECT main_text, color_text FROM main_text LIMIT 1';
		$statement = $this->conn->prepare($sql);

		if($statement->execute()){
			return $statement;
		}else{
			return false;
		}
		$this->conn = null;
	}

	public function images(){
		$sql = 'SELECT id_image, route_image, title_image FROM images';
		$statement = $this->conn->prepare($sql);

		if($statement->execute()){
			return $statement;
		}else{
			return false;
		}
		$this->conn = null;
	}
}
?>