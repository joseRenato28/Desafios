<?php
Class TextModel extends MainModel
{

	public function get_text(){
		$sql = 'SELECT t.*, u.name_user FROM main_text t inner join users u on u.id_user = t.create_by_user LIMIT 1';
		$statement = $this->conn->prepare($sql);

		if($statement->execute()){
			return $statement;
		}else{
			return false;
		}
		$this->conn = null;
	}


	public function create_text($text){
		try {
			$sql = 'UPDATE main_text set main_text = ?, color_text = ?, create_on_text = now(), create_by_user = ? WHERE id_main_text = 1';
			$statement = $this->conn->prepare($sql);

			$statement->bindParam(1, $text['text']);
			$statement->bindParam(2, $text['color']);
			$statement->bindParam(3, $text['id_user']);

			if($statement->execute()){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$this->conn = null;
	}
}
?>