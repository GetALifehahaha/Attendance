<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Content-Type');

    include '../Class/Database.php';
    include '../Class/Schedule.php';

    $database = new Database();
    $db = $database->getConnection();

    if (!$db){
        echo "Failed to Connect";
        exit;
    }

    $schedule = new Schedule($db);

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'GET':

            if (isset($_GET['schedule_ID'])){
                $scheduleData = $schedule->getScheduleByID($_GET['schedule_ID']);
                
                if ($scheduleData){
                    echo json_encode(["status" => "success", "schedule" => $scheduleData]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Schedule not found"]);
                }
            } else {
                $schedules = $schedule->getAllSchedules();
    
                if ($schedules) {
                    echo json_encode(["status" => "success", "schedules" => $schedules]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to get schedules"]);
                }
            }

            break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            $result = $schedule->addSchedule($data['schedule_ID'], $data['schedule_name'], $data['schedule_department'], $data['schedule_year'], $data['schedule_section'], $data['schedule_start_time'], $data['schedule_end_time'], $data['schedule_day_of_the_week'], $data['schedule_room'], $data['schedule_capacity']);

            if ($result){
                echo json_encode(["status" => "success", "message" => "Added new schedule successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to add new schedule"]);
            }

            break;

        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }

            $result = $schedule->editSchedule($data['schedule_ID'], $data['schedule_name'], $data['schedule_department'], $data['schedule_year'], $data['schedule_section'], $data['schedule_start_time'], $data['schedule_end_time'], $data['schedule_day_of_the_week'], $data['schedule_room'], $data['schedule_capacity']);

            if ($result){
                echo json_encode(["status" => "success", "message" => "Updated schedule successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to update schedule"]);
            }

            break;
        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data){
                echo json_encode(["status" => "error", "message" => "Invalid JSON Input"]);
                exit;
            }
            $result = $schedule->deleteSchedule($data['schedule_ID']);

            if ($result){
                echo json_encode(["status" => "success", "message" => "Deleted schedule successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to delete schedule"]);
            }
            break;

    }
?>