<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Content-Type');

    include '../Class/Database.php';
    include '../Class/Student.php';

    $database = new Database();
    $db = $database->getConnection();

    if (!$db){
        echo "Not Connected";
    }

    $student = new Student($db);

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method){
        case 'GET':

            // if (isset($data['student_id'], $data['password'])){
            //     $result = $student->verify($data['student_id'], $data['password']);
            //     if ($result){
            //         echo json_encode(["status" => "success", "message" => "Account Accessed Successfully"]);
            //     } else {
            //         echo json_encode(["status" => "error", "message" => "Password incorrect"]);
            //     }
            // } else {
            //     echo json_encode(["status" => "error", "message" => "Invalid Input"]);
            // }

            break;
        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            if (isset($data['first_name'], $data['middle_name'], $data['last_name'], $data['student_ID'], $data['password'])){
                $result = $student->createAccount($data['student_ID'], $data['first_name'], $data['middle_name'], $data['last_name'],  $data['password']);

                if ($result){
                    echo json_encode(["status" => "success", "message" => "Account registered successfully"]);
                } else {
                    echo json_encode(["status" => "success", "message" => "Failed to register account"]);
                }
                
            } else if (isset($data['student_ID'], $data['password'])){
                $result = $student->verify($data['student_id'], $data['password']);
                
            } else {
                
                echo json_encode(["status" => "success", "message" => "Account Added Successfully"]);
            }
            
            break;
    }
?>