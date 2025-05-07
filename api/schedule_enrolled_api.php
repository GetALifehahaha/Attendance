<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Content-Type');

    include '../Class/Database.php';
    include '../Class/Schedule_Enrolled.php';

    $database = new Database();
    $db = $database->getConnection();

    if (!$db){
        echo "Failed to Connect";
        exit;
    }

    $scheduleEnrolled = new ScheduleEnrolled($db);

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'GET':

            if (isset($_GET['schedule_ID'])){
                $students = $scheduleEnrolled->getAllStudentEnrolled($_GET['schedule_ID']);
                
                if ($students){
                    echo json_encode(["status" => "success", "students" => $students]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Schedule not found"]);
                }
            }
            if (isset($_GET['student_ID'])){
                $schedules = $scheduleEnrolled->getAllSchedule($_GET['student_ID']);

                if ($schedules){
                    echo json_encode(["status" => "success", "schedules" => $schedules]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Schedule not found"]);
                }
            }
            break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            $result = $scheduleEnrolled->enrollToSchedule($data['student_ID'], $data['schedule_ID']);

            if ($result){
                echo json_encode(["status" => "success", "message" => "Enrolled to schedule successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to add schedule"]);
            }
            break;

        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            $result = $scheduleEnrolled->deleteScheduleEnrolled($data['student_ID'], $data['schedule_ID']);

            if ($result){
                echo json_encode(["status" => "success", "message" => "Removed schedule successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to remove schedule"]);
            }
            break;
    }
?>