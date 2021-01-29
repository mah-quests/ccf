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

    $item = new Mobiliser($db);

    $data = json_decode(file_get_contents("php://input", true));

    $item->first_name = $data->first_name;
    $item->email = $data->email;
    $item->age = $data->age;
    $item->net_structure = $data->net_structure;
    $item->created_date = $data->created_date;
    $item->surname = $data->surname;
    $item->date_of_birth = $data->date_of_birth;
    $item->cellnumber = $data->cellnumber;
    $item->race = $data->race;
    $item->religion = $data->religion;
    $item->sex = $data->sex;
    $item->gender_id = $data->gender_id;
    $item->gender = $data->gender;
    $item->prefix = $data->prefix;
    $item->pronouns = $data->pronouns;
    $item->mobaliser_address = $data->mobaliser_address;
    $item->province = $data->province;
    $item->district = $data->district;
    $item->municipality = $data->municipality;
    $item->alternate_person = $data->alternate_person;
    $item->alternate_number = $data->alternate_number;
    $item->disable = $data->disable;
    $item->disability_type = $data->disability_type;
    $item->school_level = $data->school_level;                
    
    if($item->createMobilisers()){
        echo 'Mobiliser created_date successfully.';
    } else{
        echo 'Mobiliser could not be created_date.';
    }
?>