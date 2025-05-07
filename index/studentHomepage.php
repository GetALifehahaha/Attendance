<!-- <?php
    // include("config.php");
    // include("dbconnect.php");

    // if (isset($_SESSION["user"])) {
        // $user = $_SESSION["user"];
    // } else {
        // header('LOCATION: login.php');
    // }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/studentHomepageStyle.css">
    <script src="/javascript/studentPage.js" defer></script>
</head>
<body>
    <nav id="navbar">
        <h3>AttendED</h3>
        
        <div class="right">
            <h4 onclick="showNotification()">
                <i class="fa-regular fa-bell"></i>0
            </h4>
            <a href="studentLogin.html">LOG OUT</a>
        </div>
    </nav>

    <div class="notification_box">
        <h4 class="notification">You have been absent in IT Elective for 5 days</h4>
    </div>
    <main>
        
        <div class="container">
            <h2>Student Attendance</h2>
            
            <div class="qr_section">
                <img id="qr_code" src="">
                <h3 id="schoolId">202300049</h3>
            </div>
            <div class="studentInformation">
                <h3 id="studentName">Ahlan-nour J. Sencio</h3>
                <h4 id="course_year_section">BSIT 2A</h4>
                <h5 id="college">College of Computing Studies</h4>
            </div>
        </div>

        <div class="container">
            <div class="head">
                <h3>Schedule: Today</h3>

                <div class="button_group">
                    <button onclick="openForm()">Add Subject</button>
                    <button id="edit" onclick="deleteSchedules(this)">Delete</button>
                </div>
                
                <div class="full_screen_container">
                    <div class="add_subject">        
                        <div class="form_background">
                            <div class="form">
                                <div class="header">
                                    <h3>Add Subject</h3>
                                    <span id="close_form" onclick="closeForm()">
                                        <h3>EXIT</h3>
                                        <h3>X</h3>
                                    </span>
                                </div>
        
            
                                <label for="scheduleID">Schedule ID</label>
                                <input type="text" id="scheduleID" name="scheduleID" placeholder="Input a schedule ID" required>
                                <button type="button" onclick="addSchedule()">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="full_screen_container" id="remove_schedule">
                    <div class="remove_schedule">
                        <div class="form_background">
                            <div class="form">
                                <h3>Are you sure you want to remove this schedule?</h3>
                                <div class="button_group">
                                    <button id="deleteSchedule">Delete</button>
                                    <button onclick="closeDeleteConfirmation()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="schedule_today">
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Subject Name</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTodayBody">

                    </tbody>
                    <!-- <tr>
                        <td>11:00 am - 12:30 pm</td>
                        <td>IT Elective 2</td>
                        <td>Lab 2</td>
                    </tr> -->
                    <!-- <tr>
                        <td>2:00 pm - 4:00 pm</td>
                        <td>Advanced Database Systems</td>
                        <td>LR 1</td>
                    </tr>
                    <tr>
                        <td>4:00 pm - 7:00 pm</td>
                        <td>Advanced Database Systems - Lab</td>
                        <td>Lab 2</td>
                    </tr> -->
                </table>    
            </div>

            <div class="schedule_week">
                <div class="head">
                    <h3>Schedule: Week</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>
                        </tr>
                    </thead>

                    <tbody id="scheduleWeekBody">
                        <tr>
                            <td id="Monday">
                                
                            </td>
    
                            <td id="Tuesday">
                                
                            </td>
    
                            <td id="Wednesday">
                                
                            </td>
    
                            <td id="Thursday">
                                
                            </td>
    
                            <td id="Friday">
                                
                            </td>
    
                            <td id="Saturday">
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="feedback">
        </div>
</body>
</html>