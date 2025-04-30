<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AttendED - Log In</title>
        <link rel="stylesheet" href="../styles/studentLoginStyle.css">
    </head>
    <body>

        <div class="container">
            <div class="left-section">

                <h1><span class="bold"> Attend</span><span class="ED">ED </span></h1>

            </div>

            <div class="right-section">
                <a href="Option.php"><img src="../assets/Goback.png" alt=""></a>
                <div class="signup-box">

                    <h2> Log In </h2>
                    <p class="welcome"> Welcome! Please provide the information below in order to log in. </p>
                    
                    <form id="studentLogInForm" action="../Form/StudentloginForm.php" method="POST">
                        <input type="text" id="schoolId" name="schoolId" placeholder="SCHOOL ID" required>
                        <input type="password" id="password" name="password" placeholder="PASSWORD" required>
                        <p> Don't have an account? <a href="studentSignUp.php">Sign Up</a> instead!</p>
                        <button type="submit">Log In</button>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
