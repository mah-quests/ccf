<?php

//action.php

	if($_POST["action"] == 'Register')
	{

		$hashedPassword = password_hash($_POST["passwrd"], PASSWORD_DEFAULT);

		$form_data = array(
			'username'	=>	$_POST['idnumber'],
			'password'	=>	$hashedPassword,
			'role'		=>	'user'
		);
		
		$api_url = "http://localhost/app/dev/api/users/endPoint.php?action=Register";  
		//change this url as per your folder path for api folder
		
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				header('location:../../index.php');
			}
			else
			{
				header('location:../../register.php');
			}
		}
	}


?>