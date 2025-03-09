<?php
    $name = $_POST['name'];
    $school_id = $_POST['school_id'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'testdb');
    if ($conn->connect_error) {
        die('Connection Failed: '. $conn->connect_error);
    } else {

        if ($name == null || $school_id == null || $password == null){
            die('Invalid Input');
        } else {
            $getstmt = $conn->prepare('SELECT school_id FROM student WHERE school_id = ?;');
            $getstmt->bind_param('i',$school_id);
            $getstmt->execute();
            $getstmt->bind_result($school_id);
            $getstmt->store_result();
            $rnum = $getstmt->num_rows;

            if ($rnum == 0){
                $getstmt->close();

                $stmt = $conn->prepare('INSERT INTO student (name, school_id, password) VALUES (?, ?, ?);');
                $stmt->bind_param('sis', $name, $school_id, $password);
                $stmt->execute();
                $stmt->close();
                $conn->close();
            } else {
                die('Account already used');
            }
        }
        die("Success");

    }


