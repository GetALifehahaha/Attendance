<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Content-Type');

    include '../Class/Database.php';
    include '../Class/Attendance.php';

    $database = new Database();
    $db = $database->getConnection();

    if (!$db){
        echo "Failed to Connect";
        exit;
    }

    $attendance = new Attendance($db);

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'GET':
            if (isset($_GET['schedule_ID'])){
                $attendanceHistory = $attendance->getAttendanceHistory($_GET['schedule_ID']);

                if ($attendanceHistory){
                    echo json_encode(["status" => "success", "attendanceHistory" => $attendanceHistory]);
                } else {
                    echo json_encode(["status" => "error", "message" => "No Attendance History Found"]);
                }
            }

            break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            $result = $attendance->setAttendance($data['schedule_ID']);

            if ($result){
                echo json_encode(["status" => "success", "message" => "Starting Attendance"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to start attendance"]);
            }

            break;

        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            if (isset($data['student_ID']) && isset($data['schedule_ID'])){
                $result = $attendance->setPresent($data['student_ID'], $data['schedule_ID']);
                
                if ($result) {
                    echo json_encode(["status" => "success", "message" => "Student marked as present"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to set attendance"]);
                }

                break;
            }

            if (isset($data['schedule_ID'])){
                $result = $attendance->endAttendance($data['schedule_ID']);
                
                if ($result){
                    echo json_encode(["status" => "success", "message" => "Ending Attendance"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to end attendance"]);
                }

                break;
            }


    }
?>