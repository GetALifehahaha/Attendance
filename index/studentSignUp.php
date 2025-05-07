<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AttendED - Sign Up</title>
        <link rel="stylesheet" href="/styles/StudentSignupStyles.css">
        <script src="/javascript/studentSignup.js" defer></script>
    </head>
    <body>
        <div id="feedback"></div>


        <div class="container">
            <div class="left-section">

                <h1><span class="bold"> Attend</span><span class="ED">ED </span></h1>

            </div>

            <div class="right-section">
                <div class="signup-box">

                    <h2> Sign Up </h2>
                    <p class="welcome"> Welcome! Please provide the information below in order to create an account for use, thank you. </p>
                    
                    <div id="signupForm">
                        <input type="text" id="firstName" placeholder="FIRST NAME" required>
                        <input type="text" id="middleName" placeholder="MIDDLE NAME" required>
                        <input type="text" id="lastName" placeholder="LAST NAME" required>
                        <input type="text" id="studentID" placeholder="STUDENT ID" required>
                        <input type="password" id="password" placeholder="PASSWORD" required>
                        <input type="password" id="confirmPassword" placeholder="CONFIRM PASSWORD" required>
                        <p> Do you have an account already? <a href="/assets/studentLogin.php">Log in</a> instead!</p>
                        <button type="button" onclick="signup()">Sign Up</button>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
