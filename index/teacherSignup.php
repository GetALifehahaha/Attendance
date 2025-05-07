<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AttendED - Sign Up</title>
        <link rel="stylesheet" href="/styles/teacherSignupStyles.css">
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
                    
                    <form id="signupForm">
                        <input type="text" id="first-name" placeholder="FIRST NAME" required>
                        <input type="text" id="middle-name" placeholder="MIDDLE NAME" required>
                        <input type="text" id="last-name" placeholder="LAST NAME" required>
                        <input type="text" id="Email" placeholder="EMAIL" required>
                        <input type="password" id="password" placeholder="PASSWORD" required>
                        <input type="password" id="confirm-password" placeholder="CONFIRM PASSWORD" required>
                        <p> Do you have an account already? <a href="teacherLogIn.html">Log in</a> instead!</p>
                        <button type="submit"> Sign Up </button>

                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
