<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'config/database.php';
    include_once 'class/surveys.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Survey($db);

    $stmt = $items->getSurveys();
    $itemCount = $stmt->rowCount();


//    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $surveyArr = array();
        $surveyArr["body"] = array();
        $surveyArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "summary_id" => $summary_id,
                "mobiliser_id" => $mobiliser_id,
                "unique_code" => $unique_code,                
                "respondant_name" => $respondant_name,
                "respondant_surname" => $respondant_surname,
                "respondant_email" => $respondant_email,
                "completed_datetime" => $completed_datetime,
                "respondant_phone" => $respondant_phone,
                "province" => $province,
                "district" => $district,
                "municipality" => $municipality,
                "project_name" => $project_name,
                "comments" => $comments                
            );

            array_push($surveyArr["body"], $e);
        }
        echo json_encode($surveyArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No surveys found.")
        );
    }
?>