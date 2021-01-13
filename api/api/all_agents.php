<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'config/database.php';
    include_once 'class/mobiliser.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Mobiliser($db);

    $stmt = $items->getMobilisers();
    $itemCount = $stmt->rowCount();


//    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $mobiliserArr = array();
        $mobiliserArr["body"] = array();
        $mobiliserArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "mobiliser_id" => $mobiliser_id,
                "net_structure" => $net_structure,
                "first_name" => $first_name,
                "surname" => $surname, 
                "date_of_birth" => $date_of_birth,
                "age" => $age,
                "cellnumber" => $cellnumber,
                "email" => $email,
                "race" => $race,
                "religion" => $religion,
                "sex" => $sex,        
                "gender_id" => $gender_id,
                "gender" => $gender,        
                "prefix" => $prefix,
                "pronouns" => $pronouns,
                "mobaliser_address" => $mobaliser_address,
                "province" => $province,      
                "district" => $district,
                "municipality" => $municipality,  
                "alternate_person" => $alternate_person,
                "alternate_number" => $alternate_number,
                "disable" => $disable,
                "disability_type" => $disability_type,
                "school_level" => $school_level,                
                "created_date" => $created_date
            );

            array_push($mobiliserArr["body"], $e);
        }
        echo json_encode($mobiliserArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No mobilisers found.")
        );
    }
?>