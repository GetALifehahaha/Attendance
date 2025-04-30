<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AttendED - Sign Up</title>
        <link rel="stylesheet" href="../styles/StudentSignupStyles.css">
    </head>
    <body>

        <div class="container">
            <div class="left-section">

                <h1><span class="bold"> Attend</span><span class="ED">ED </span></h1>

            </div>

            <div class="right-section">
                <div class="signup-box">

                    <h2> Sign Up </h2>
                    <p class="welcome"> Welcome! Please provide the information below in order to create an account for use, thank you. </p>
                    
                    <form id="signupForm" action="../Form/StudentsignupForm.php" method="POST">
                    <input type="text" id="first-name" name="firstName" placeholder="FIRST NAME" required>
                    <input type="text" id="middle-name" name="middleName" placeholder="MIDDLE NAME">
                    <input type="text" id="last-name" name="lastName" placeholder="LAST NAME" required>
                    <input type="text" id="school-id" name="schoolId" placeholder="SCHOOL ID" required>
                    <input type="password" id="password" name="password" placeholder="PASSWORD" required>
                    <input type="password" id="confirm-password" name="confirmPassword" placeholder="CONFIRM PASSWORD" required>
                        <p> Do you have an account already? <a href="../index/studentLogin.php">Log in</a> instead!</p>
                        <button type="submit"> Sign Up </button>

                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
