<?php
    include("dbconnect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $schoolId = filter_input(INPUT_POST, 'schoolId', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($schoolId) || empty($password)){
            die("Empty fields detected, please don't be a retard...");
        } else {
            $accountQuery = "SELECT * FROM Students where schoolId = ?;";

            $stmt = $conn->prepare($accountQuery);
            $stmt->bind_param("i", $schoolId);
            $stmt->execute();
            $stmt->bind_result($schoolId, $firstName, $middleName, $lastName, $storedPassword);
            
            if($stmt->fetch()){
                if (password_verify($password, $storedPassword)){
                    header("Location: student_homepage.html");
                } else {
                    die("wrong pass");
                }
            } else {
                //wrong acc
                die("no acc found");
            }
        }
    }