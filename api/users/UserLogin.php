<?php

include '../../connect/properties.php';

//UserLogin.php

class UserLogin
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO(
			"mysql:host=localhost;dbname=app", 
			"app", 
			"app"
		);
	}

	function fetch_all()
	{
		$query = "SELECT * FROM 
				  user_authenticate_tbl 
				  ORDER BY user_login_id";
		$statement = $this->connect->prepare($query);
		
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{

		$hashedPassword = password_hash($_POST["passwrd"], PASSWORD_DEFAULT);
		$mobaliser_role = 'user';

		if(isset($_POST["username"]))
		{
			$form_data = array(
				':username'	=>	$_POST["username"],
				':password'	=>	$hashedPassword,
				':role'	=>	$mobaliser_role
			);

			$query = "
			INSERT INTO user_authenticate_tbl 
			(username, password, role) 
			VALUES 
			(:username, :password, :role)
			";

			$mobiliser_statement = $this->connect->prepare($query);

			if(	$mobiliser_statement->execute($form_data) )
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * 
				  FROM user_authenticate_tbl 
				  WHERE user_login_id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['username'] = $row['username'];
				$data['password'] = $row['password'];
				$data['role'] = $row['role'];

			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["username"]))
		{
			$form_data = array(
				':username'			=>	$_POST['username'],
				':password'			=>	$_POST['password'],
				':role'				=>	$_POST['role']
			);
			
			$query = "
			UPDATE user_authenticate_tbl 
			SET 
			username = :username, 
			password = :password, 
			role = :role
			WHERE user_login_id = :user_login_id";
			
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM user_authenticate_tbl 
				  WHERE user_login_id = '".$id."'";

		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>