<?php

//Mobalizer.php

class Mobalizer
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO(
			"mysql:host=localhost;dbname=cm_db", 
			"cm_db", 
			"cm_db"
		);
	}

	function fetch_all()
	{
		$query = "SELECT * FROM mobiliser_tbl ORDER BY mobiliser_id";
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

		if(isset($_POST["idnumber"]))
		{
			$form_data = array(
				':organization_name'	=>	$_POST["organization_name"],
				':net_structure'		=>	$_POST["net_structure"],
				':first_name'			=>	$_POST["first_name"],
				':surname'				=>	$_POST["surname"],
				':date_of_birth'		=>	$_POST["date_of_birth"],
				':idnumber'				=>	$_POST["idnumber"],
				':age'					=>	$_POST["age"],
				':cellnumber'			=>	$_POST["cellnumber"],
				':email'				=>	$_POST["email"],
				':race'					=>	$_POST["race"],
				':religion'				=>	$_POST["religion"],
				':sex'					=>	$_POST["sex"],
				':sexuality'			=>	$_POST["sexuality"],
				':gender'				=>	$_POST["gender"],
				':prefix'				=>	$_POST["prefix"],
				':pronouns'				=>	$_POST["pronouns"],				
				':mobaliser_address'	=>	$_POST["mobaliser_address"],
				':province'				=>	$_POST["List1"],
				':district'				=>	$_POST["List2"],
				':municipality'			=>	$_POST["List3"],
				':alternate_person'		=>	$_POST["alternate_person"],
				':alternate_number'		=>	$_POST["alternate_number"]
			);
			
			$mobiliser_tbl_query = 
			"INSERT INTO mobiliser_tbl 
			(organization_name, net_structure, first_name, surname, date_of_birth, idnumber, age, cellnumber, email, race, religion, sex, sexuality, gender, prefix, pronouns, mobaliser_address, province, district, municipality, alternate_person, alternate_number) 
			VALUES 
			(:organization_name, :net_structure, :first_name, :surname, :date_of_birth, :idnumber, :age, :cellnumber, :email, :race, :religion, :sex, :sexuality, :gender, :prefix, :pronouns, :mobaliser_address, :province, :district, :municipality, :alternate_person, :alternate_number )";

			$mobiliser_statement = $this->connect->prepare($mobiliser_tbl_query);

			if(	
				$mobiliser_statement->execute($form_data) 
			  )
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
		$query = "SELECT * FROM mobiliser_tbl WHERE mobiliser_id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['mobiliser_id'] = $row['mobiliser_id'];
				$data['organization_name'] = $row['organization_name'];
				$data['net_structure'] = $row['net_structure'];
				$data['first_name'] = $row['first_name'];
				$data['surname'] = $row['surname'];
				$data['date_of_birth'] = $row['date_of_birth'];
				$data['idnumber'] = $row['idnumber'];
				$data['age'] = $row['age'];
				$data['cellnumber'] = $row['cellnumber'];
				$data['email'] = $row['email'];
				$data['race'] = $row['race'];
				$data['religion'] = $row['religion'];
				$data['sex'] = $row['sex'];
				$data['sexuality'] = $row['sexuality'];
				$data['gender'] = $row['gender'];
				$data['prefix'] = $row['prefix'];
				$data['pronouns'] = $row['pronouns'];
				$data['mobaliser_address'] = $row['mobaliser_address'];
				$data['province'] = $row['province'];
				$data['district'] = $row['district'];
				$data['municipality'] = $row['municipality'];
				$data['alternate_person'] = $row['alternate_person'];
				$data['alternate_number'] = $row['alternate_number'];
				$data['project_id'] = $row['project_id'];

			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["idnumber"]))
		{
			$form_data = array(
				':organization_name'	=>	$_POST["organization_name"],
				':net_structure'		=>	$_POST["net_structure"],
				':first_name'			=>	$_POST["first_name"],
				':surname'				=>	$_POST["surname"],
				':date_of_birth'		=>	$_POST["date_of_birth"],
				':idnumber'				=>	$_POST["idnumber"],
				':age'					=>	$_POST["age"],
				':cellnumber'			=>	$_POST["cellnumber"],
				':email'				=>	$_POST["email"],
				':race'					=>	$_POST["race"],
				':religion'				=>	$_POST["religion"],
				':sex'					=>	$_POST["sex"],
				':sexuality'			=>	$_POST["sexuality"],
				':gender'				=>	$_POST["gender"],
				':prefix'				=>	$_POST["prefix"],
				':pronouns'				=>	$_POST["pronouns"],				
				':mobaliser_address'	=>	$_POST["mobaliser_address"],
				':province'				=>	$_POST["List1"],
				':district'				=>	$_POST["List2"],
				':municipality'			=>	$_POST["List3"],
				':alternate_person'		=>	$_POST["alternate_person"],
				':alternate_number'		=>	$_POST["alternate_number"],
				':id'					=>	$_POST["id"]
			);
			
			$query = "
			UPDATE mobiliser_tbl 
			SET 
			organization_name = :organization_name, 
			net_structure = :net_structure, 
			first_name = :first_name, 
			surname = :surname, 
			date_of_birth = :date_of_birth, 
			idnumber = :idnumber,
			age = :age, 
			cellnumber = :cellnumber, 
			email = :email, 
			race = :race, 
			religion = :religion,
			sex = :sex, 
			sexuality = :sexuality, 
			gender = :gender, 
			prefix = :prefix, 
			pronouns = :pronouns,
			mobaliser_address = :mobaliser_address, 
			province = :province, 
			district = :district, 
			municipality = :municipality, 
			alternate_person = :alternate_person,
			alternate_number = :alternate_number,
			project_id = :project_id 
			WHERE mobiliser_id = :id";
			
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
		$query = "DELETE FROM mobiliser_tbl WHERE mobiliser_id = '".$id."'";
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