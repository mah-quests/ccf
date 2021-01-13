<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'config/database.php';
    include_once 'class/mobiliser.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new mobiliser($db);

    $item->cellnumber = isset($_GET['cellnumber']) ? $_GET['cellnumber'] : die();
  
    $item->getMobiliserByCellphone();

    if($item->first_name != null){
        // create array
        $mobiliserArr = array(
            "mobiliser_id" =>  $item->mobiliser_id,
            "first_name" => $item->first_name,
            "email" => $item->email,
            "age" => $item->age,
            "net_structure" => $item->net_structure,
            "created_date" => $item->created_date,
            "surname" =>  $item->surname,
            "date_of_birth" => $item->date_of_birth,
            "cellnumber" => $item->cellnumber,
            "race" => $item->race,
            "religion" => $item->religion,
            "sex" => $item->sex,
            "gender_id" =>  $item->gender_id,
            "gender" => $item->gender,
            "prefix" => $item->prefix,
            "pronouns" => $item->pronouns,
            "mobaliser_address" => $item->mobaliser_address,
            "province" => $item->province,
            "district" =>  $item->district,
            "municipality" => $item->municipality,
            "alternate_person" => $item->alternate_person,
            "alternate_number" => $item->alternate_number,
            "disable" => $item->disable,
            "disability_type" => $item->disability_type,
            "school_level" => $item->school_level

        );
      
        http_response_code(200);
        echo json_encode($mobiliserArr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Given Mobiliser Cell Number does not exist, are you sure it's correct? Eg, +27712345678");
    }
?>