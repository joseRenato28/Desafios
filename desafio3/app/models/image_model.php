<?php
Class ImageModel extends MainModel
{
	public function get_image(){
		$sql = 'SELECT * FROM images';
		$statement = $this->conn->prepare($sql);

		if($statement->execute()){
			return $statement;
		}else{
			return false;
		}
		$this->conn = null;
	}

	public function get_details($id){
		$statement = $this->conn->prepare('SELECT i.*, u.name_user FROM images i inner join users u on u.id_user = i.create_by_user WHERE i.id_image = :id');
		$statement->bindParam(':id', $id); 

		if($statement->execute()){
			return $statement;
		}else{
			return false;
		}
		$this->conn = null;
	}

	public function create_image($image){
		try {
			$sql = 'UPDATE images set route_image = ?, title_image = ?, create_on_image = now(), create_by_user = ? WHERE id_image = ?';
			$statement = $this->conn->prepare($sql);

			$statement->bindParam(1, $image['route_image']);
			$statement->bindParam(2, $image['title']);
			$statement->bindParam(3, $image['id_user']);
			$statement->bindParam(4, $image['id_image']);

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