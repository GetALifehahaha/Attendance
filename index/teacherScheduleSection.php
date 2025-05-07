<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="/styles/teacherPageStyle.css">
    <script defer src="/javascript/teacherScheduleSection.js"></script>
</head>

<body>
    <nav id="navbar">
        <h3>Attendance System</h3>
        <div>
            <span class="professor-name">Professor</span>
            <a href="teacherLogIn.html" id="signOut">SIGN OUT</a>
        </div>
    </nav>

    <div class="main">
        <aside class="sidebar">
            <ul class="options">
                <li>
                    <a href="teacherDashboard.html">Dashboard</a>

                </li>
                <li>
                    <span>
                        <a href="teacherSchedule.php">Schedules</a>
                    </span>
                </li>
                <li>
                    <span>
                        <a href="teacherAccount.html">Account</a>
                    </span>
                </li>
            </ul>
        </aside>

        <main>
            <div class="breadcrumbs">
                <h2 onclick="window.location.href='teacherSchedule.php'">Schedule</h2>
                <h2>></h2>
                <h2 id="schedulePageName"></h2>
            </div>

            <button>Set Attendance</button>

            <div class="page_header">
                <div class="schedule_information">
                    <div class="section sec1">
                        <h4 id="scheduleID"></h4>
                        <h4 id="scheduleName"></h4>
                    </div>
    
                    <div class="section sec2">
                        <div class="time">
                            <h4 id="scheduleStartTime"></h4>
                            <h4>-</h4>
                            <h4 id="scheduleEndTime"></h4>
                        </div>
                        <h4 id="scheduleDayOfTheWeek"></h4>
                    </div>
    
                    <div class="section sec3">
                        <h4 id="scheduleRoom"></h4>
                        <h4 id="scheduleCapacity"></h4>
                    </div>

                    <button>Edit</button>

                </div>
            </div>

            <div class="full_screen_container">
                <div class="add_schedule" style="overflow-y: auto;">
                    <div class="header">
                        <h3>Add Schedule</h3>
                        <span id="close_form">
                            <h3>EXIT</h3>
                            <h3>X</h3>
                        </span>
                    </div>

                    <div id="step-1" class="form-step active">
                        <h2>Schedule Name and Description</h2>
                        <div class="form" id="schedule-details-form">
                            <label for="scheduleID">Schedule ID</label>
                            <input type="text" id="scheduleID" name="scheduleID" placeholder="ex. IT221A" required minlength="6" maxlength="6">

                            <label for="scheduleName">Schedule Name</label>
                            <input type="text" id="scheduleName" name="scheduleName" placeholder="ex. IT Elective 2" required>

                            <label for="scheduleDepartment">Department</label>
                            <div class="radio_btns">
                                <input type="radio" name="scheduleDepartment" id="scheduleDepartment" value="IT">Information Technlogy
                                <input type="radio" name="scheduleDepartment" id="scheduleDepartment" value="CS">Computer Science
                            </div>

                            <label for="scheduleYear">Year</label>
                            <div class="radio_btns">
                                <input type="radio" name="scheduleYear" id="scheduleYear" value="1">1
                                <input type="radio" name="scheduleYear" id="scheduleYear" value="2">2
                                <input type="radio" name="scheduleYear" id="scheduleYear" value="3">3
                                <input type="radio" name="scheduleYear" id="scheduleYear" value="4">4
                            </div>
                            
                            <label for="scheduleSection">Section</label>
                            <div class="radio_btns">
                                <input type="radio" name="scheduleSection" id="scheduleSection" value="A">A
                                <input type="radio" name="scheduleSection" id="scheduleSection" value="B">B
                                <input type="radio" name="scheduleSection" id="scheduleSection" value="C">C
                            </div>
                            
                            <div class="navigation-buttons">
                                <button type="button" id="next-to-step-2">Next</button>
                            </div>
                        </div>
                    </div>

                    <div id="step-2" class="form-step">
                        <h2>Select Schedule Time and Day</h2>
                        <div class="form" id="schedule-time-form">
                            <label for="scheduleStartTime">Start Time:</label>
                            <input type="time" id="scheduleStartTime" name="scheduleStartTime" required>

                            <label for="scheduleEndTime">End Time:</label>
                            <input type="time" id="scheduleEndTime" name="scheduleEndTime" required>

                            <label for="scheduleDayOfTheWeek">Day of the Week:</label>
                            <select id="scheduleDayOfTheWeek" name="scheduleDayOfTheWeek" required>
                                <option value="">Select a day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>

                            <div class="navigation-buttons">
                                <button type="button" id="prev-to-step-1">Previous</button>
                                <button type="button" id="next-to-step-3">Next</button>
                            </div>
                        </div>
                    </div>

                    <div id="step-3" class="form-step">
                        <h2>Room and Capacity Details</h2>
                        <div class="form" id="room-form">
                            <label for="scheduleRoom">Room Number</label>
                            <input type="text" id="scheduleRoom" name="scheduleRoom" placeholder="ex. LR 1" required>

                            <label for="scheduleCapacity">Capacity</label>
                            <input type="number" id="scheduleCapacity" name="scheduleCapacity" placeholder="ex, 50" required>

                            <div class="navigation-buttons">
                                <button type="button" id="prev-to-step-2">Previous</button>
                                <button onclick="addSchedule()">Submit Schedule</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="full_screen_container">
                <div class="container add_students">
                    <div class="pending_class_list">
                        <table id="student_table">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                            <tr>
                                <td>202300049</td>
                                <td>Sencio, Ahlan-nour J.</td>
                                <td>Present</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> -->

            <!-- <div class="grid student_list">
                <div class="container student_list">
                    <table id="student_table">  
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>202300049</td>
                            <td>Sencio, Ahlan-nour J.</td>
                            <td>Present</td>
                        </tr>
                    </table>
                </div>

            </div> -->
            <!-- <div class="full_screen_container"> -->
                <!-- <div class="add_schedule">
                    <div class="header">
                        <h3>Add Schedule</h3>
                        <span id="close_schedule_form">
                            <h3>EXIT</h3>
                            <h3>X</h3>
                        </span>
                    </div>
                    <form action="">
                        <label for="schedule_name">Schedule Name</label>
                        <input type="text" id="schedule_name" name="schedule_name" placeholder="ex: IT Elective LAB">
                        
                        <label for="schedule_day">Schedule Day</label>
                        <input type="text" id="schedule_day" name="schedule_day" placeholder="ex: M, TH">
                        
                        <label for="schedule_start">Schedule Start</label>
                        <input type="text" id="schedule_start" name="schedule_start" placeholder="ex: 10:00">
                        
                        <label for="schedule_end">Schedule End</label>
                        <input type="text" id="schedule_end" name="schedule_end" placeholder="ex: 13:00">
                        
                        <button>Add Schedule</button>
                    </form>
                </div>
            </div> -->
            

            <table class="student_table">
                <thead>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance Status</th>
                </thead>
                <tbody id="studentTableBody">
                    
                </tbody>
            </table>
        
        
        </main>
    </div>

    <script>

    </script>
</body>

</html>