<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AttendED - Sign Up</title>
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
                    
                    <form id="signupForm">
                        <input type="text" id="school-id" placeholder="SCHOOL ID" required>
                        <input type="password" id="password" placeholder="PASSWORD" required>
                        <p> Don't have an account? <a href="studentSignUp.php">Sign Up</a> instead!</p>
                    </form>
                    <button type="button"><a href="studentHomepage.php">Log In</a></button>
                </div>
            </div>

        </div>
    </body>
</html>
