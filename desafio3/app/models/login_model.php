<?php
Class LoginModel extends MainModel
{
	public function logar($user){
		$sql = 'SELECT * FROM users WHERE email_user = :email AND password_user = :password';
		$statement = $this->conn->prepare($sql);

		$statement->bindParam(':email', $user['email']);
		$statement->bindParam(':password', $user['password']);

		if($statement->execute()){
			return $statement;
		}else{
			return false;
		}
		$this->conn = null;
	}
}
?>