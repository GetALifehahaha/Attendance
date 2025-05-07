<?php
    include '../Class/Database.php';

    $database = new Database();
    $db = $database->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AttendED - Sign Up</title>
        <link rel="stylesheet" href="/styles/studentLoginStyle.css">
        <script src="/javascript/student_login.js" defer></script>
    </head>
    <body>

        <div class="container">
            <div class="left-section">

                <h1><span class="bold"> Attend</span><span class="ED">ED </span></h1>

            </div>

            <div class="right-section">
                <a href="Option.html"><img src="/assets/Goback.png" alt=""></a>
                <div class="signup-box">

                    <h2> Log In </h2>
                    <p class="welcome"> Welcome! Please provide the information below in order to log in. </p>
                    
                    <div id="signupForm">
                        <input type="text" id="student_id" placeholder="STUDENT ID" required>
                        <input type="password" id="password" placeholder="PASSWORD" required>
                        <p> Don't have an account? <a href="StudentSignUp.php">Sign Up</a> instead!</p>
                    </div>
                    <button type="button" onclick="login()">Log In</a></button>
                    <!-- <a href="studentHomepage.html"></a> -->
                </div>
            </div>

        </div>
    </body>
</html>
