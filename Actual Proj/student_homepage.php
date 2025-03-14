<?php
    include("config.php");
    include("dbconnect.php");

    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
    } else {
        header('LOCATION: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <link rel="stylesheet" href="student_homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="app.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Student Attendance</h2>
        
        <div class="qr_section">
            <div class="qr_code_details">
                <img id="qr_code" src="">
                <h3 id="schoolId">202300049</h3>
            </div>
        </div>
        <div class="studentInformation">
            <h3 id="studentName">Ahlan-nour J. Sencio</h3>
        </div>
    </div>

    
</body>
</html>