<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'config/database.php';
    include_once 'class/surveys.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Survey($db);

    $item->summary_id = isset($_GET['summary_id']) ? $_GET['summary_id'] : die();
  
    $item->getSingleSurveys();

    if($item->unique_code != null){
        // create array
        $emp_arr = array(
            "mobiliser_id" => $item->mobiliser_id,
            "summary_id" =>  $item->summary_id,
            "unique_code" => $item->unique_code,
            "respondant_name" => $item->respondant_name,
            "respondant_surname" => $item->respondant_surname,
            "respondant_email" => $item->respondant_email,
            "respondant_phone" =>  $item->respondant_phone,
            "province" => $item->province,
            "district" => $item->district,
            "municipality" => $item->municipality,
            "project_name" => $item->project_name,
            "comments" => $item->comments,
            "completed_datetime" => $item->completed_datetime
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Survey not found.");
    }
?>