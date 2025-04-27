/*
    include("config.php");
    include("dbconnect.php");

    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
    } else {
        header('LOCATION: login.php');
    }
?>*/

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
    <link rel="stylesheet" href="../styles/studentHomepageStyle.css">
    <script src="../javascript/studentPage.js" defer></script>
</head>
<body>
    <nav id="navbar">
        <h3>Attendance System</h3>
        
        <div class="right">
            <i class="fa-regular fa-bell"></i>
            <a href="studentLogin.php">LOG OUT</a>
        </div>
    </nav>
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

                <button type="button" id="add_subject">Add Subject</button>
                
                <div class="full_screen_container">
                    <div class="add_subject">        
                        <div class="form_background">
                            <form action="#">
                                <div class="header">
                                    <h3>Add Subject</h3>
                                    <span id="close_form">
                                        <h3>EXIT</h3>
                                        <h3>X</h3>
                                    </span>
                                </div>
        
            
                                <label for="subjectCode">Subject Code</label>
                                <input type="text" id="subjectCode" name="subjectCode" placeholder="Input a subject code" required>
                                <button type="button" id="submit" onclick="addSubject()">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="schedule_today">
                <table>
                    <tr>
                        <th>Time</th>
                        <th>Subject Name</th>
                        <th>Room</th>
                    </tr>
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

            <h3>Schedule: Week</h3>
            <div class="schedule_week">
                <table>
                    <tr>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>

                    <tr>
                        <td id="mon">
                            <h4>EPIC START 2-A</h4>
                            <p>8:30 AM – 10:00 AM</p>
                            <h4>Mobile Computing Lab</h4>
                            <p>3:00 PM – 5:00 PM</p>
                        </td>

                        <td id="tue">
                            <!-- <h4>IT Elective 2</h4>
                            <p>10:00 AM – 12:30 PM</p>
                            <h4>Ethics</h4>
                            <p>3:00 PM – 4:00 PM</p>
                            <h4>The Contemporary World</h4>
                            <p>4:00 PM – 5:30 PM</p> -->
                        </td>

                        <td id="wed">
                            <!-- <h4>IT Elective 2 Lab</h4>
                            <p>10:00 AM – 12:30 PM</p>
                            <h4>Advanced Database Systems</h4>
                            <p>1:00 PM – 3:00 PM</p>
                            <h4>Advanced Database Systems Lab</h4>
                            <p>3:00 PM – 5:00 PM</p> -->
                        </td>

                        <td id="thu">
                            <h4>EPIC START 2-A</h4>
                            <p>8:30 AM – 10:00 AM</p>
                            <h4>IT Elective 2 Lab</h4>
                            <p>10:00 AM – 12:30 PM</p>
                            <h4>Networking 1 Lab</h4>
                            <p>1:00 PM – 3:00 PM</p>
                            <h4>Mobile Computing</h4>
                            <p>3:00 PM – 5:00 PM</p>
                        </td>

                        <td id="fri">
                            <h4>Networking</h4>
                            <p>10:00 AM – 12:30 PM</p>
                            <h4>Outdoor and Adventure Activities</h4>
                            <p>1:00 PM – 3:00 PM</p>
                            <h4>Ethics</h4>
                            <p>3:00 PM – 5:00 PM</p>
                            <h4>The Contemporary World</h4>
                            <p>5:00 PM – 7:00 PM</p>
                        </td>

                        <td id="sat">
                            <h4>Integrative Programming and Technologies Lab</h4>
                            <p>8:30 AM – 10:00 AM</p>
                            <h4>Integrative Programming and Technologies</h4>
                            <p>3:00 PM – 5:00 PM</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>