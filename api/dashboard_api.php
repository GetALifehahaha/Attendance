<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Content-Type');

    include '../Class/Database.php';
    include '../Class/Dashboard.php';

    $database = new Database();
    $db = $database->getConnection();

    if (!$db){
        echo "Failed to Connect";
        exit;
    }

    $dashboard = new Dashboard($db);

    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'GET':
            $countStudents = $dashboard->getCountStudents();
            $countSchedules = $dashboard->getCountSchedules();
            $absences = $dashboard->getTopAbsences();
            $schedules = $dashboard->getCurrentSchedules();

            echo json_encode(["countStudents" => $countStudents, "schedules" => $schedules, "countSchedules" => $countSchedules, "topAbsences" => $absences]);
    }
?>