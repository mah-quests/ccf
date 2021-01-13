<?php

//action.php

if(isset($_POST["action"]))
{

	if($_POST["action"] == 'Register')
	{

		$form_data = array(
			'organization_name'	=>	$_POST['organization_name'],
			'net_structure'		=>	$_POST['net_structure'],
			'first_name'		=>	$_POST['first_name'],
			'surname'			=>	$_POST['surname'],
			'date_of_birth'		=>	$_POST['date_of_birth'],
			'idnumber'			=>	$_POST['idnumber'],
			'age'				=>	$_POST['age'],
			'cellnumber'		=>	$_POST['cellnumber'],
			'email'				=>	$_POST['email'],
			'race'				=>	$_POST['race'],
			'religion'			=>	$_POST['religion'],
			'sex'				=>	$_POST['sex'],
			'sexuality'			=>	$_POST['sexuality'],
			'gender'			=>	$_POST['gender'],
			'prefix'			=>	$_POST['prefix'],
			'pronouns'			=>	$_POST['pronouns'],				
			'mobaliser_address'	=>	$_POST['mobaliser_address'],
			'province'			=>	$_POST['List1'],
			'district'			=>	$_POST['List2'],
			'municipality'		=>	$_POST['List3'],
			'alternate_person'	=>	$_POST['alternate_person'],
			'alternate_number'	=>	$_POST['alternate_number']
		);
		
		$api_url = "http://localhost/cm/api/mobalizers/endPoint.php?action=Register";  //change this url as per your folder path for api folder
		
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

}


?>