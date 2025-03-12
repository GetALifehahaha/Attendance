<?php
    include("dbconnect.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $middleName = filter_input(INPUT_POST, 'middleName', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        $schoolId = filter_input(INPUT_POST, 'schoolId', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);  

        
        if (empty($firstName) || empty($middleName) || empty($lastName) || empty($schoolId) || empty($password)) {
            die("Empty fields detected, user will be destroyed!");
        } else {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $select =  $conn->prepare("SELECT schoolId FROM Students where schoolID = ?;");
            $select->bind_param('i', $schoolId);
            $select->execute();
            $select->store_result();
            $rnum = $select->num_rows;

            
            if ($rnum == 0) {
                $select->close();
                
                $insert = "INSERT INTO Students VALUES ($schoolId, '$firstName', '$middleName', '$lastName', '$hashPassword');";
                mysqli_query($conn, $insert);

                $_SESSION['user']=[
                    'firstName' => $firstName,
                    'middleName'=> $middleName,
                    'lastName'=> $lastName,
                    'schoolId'=> $schoolId
                ];
                
                header("Location: student_homepage.php");

            } else {
                die("SchoolID is already taken");
            }
        }
    }
    $conn->close();
