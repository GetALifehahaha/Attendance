<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="/styles/teacherPageStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script defer src="/javascript/teacherScheduleSection.js"></script>
</head>

<body>
    <nav id="navbar">
        <h3>Attendance System</h3>
        <div>
            <span class="professor-name">Professor</span>
            <a href="teacherLogIn.php" id="signOut">SIGN OUT</a>
        </div>
    </nav>

    <div class="main">
        <aside class="sidebar">
            <ul class="options">
                <li>
                    <a href="teacherDashboard.php">Dashboard</a>

                </li>
                <li>
                    <span>
                        <a href="teacherSchedule.php">Schedules</a>
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

            <div class="button_group">
                <button onclick="setAttendance()">Set Attendance</button>
                <button onclick="endAttendance()" style="display: none" id="endAttendance">End Attendance</button>
                <button onclick="showAttendanceHistory()">Show Attendance History</button>
            </div>

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

                    <button id="edit_schedule">Edit</button>

                </div>
            </div>

            <div class="full_screen_container">
                <div class="edit_schedule" style="overflow-y: auto;">
                    <div class="header">
                        <h3>Edit Schedule</h3>
                        <span id="close_form">
                            <h3>EXIT</h3>
                            <h3>X</h3>
                        </span>
                    </div>

                    <div id="editScheduleStep-1" class="form-step active">
                        <h2>Edit Schedule Name and Description</h2>
                        <div class="form" id="editScheduleDetailsForm">

                            <label for="editScheduleName">Edit Schedule Name</label>
                            <input type="text" id="editScheduleName" name="editScheduleName" placeholder="ex. IT Elective 2" required>

                            <label for="editScheduleDepartment">Edit Department</label>
                            <div class="radio_btns">
                                <input type="radio" name="editScheduleDepartment" id="editScheduleDepartment" value="IT">Information Technology
                                <input type="radio" name="editScheduleDepartment" id="editScheduleDepartment" value="CS">Computer Science
                            </div>

                            <label for="editScheduleYear">Edit Year</label>
                            <div class="radio_btns">
                                <input type="radio" name="editScheduleYear" id="editScheduleYear" value="1">1
                                <input type="radio" name="editScheduleYear" id="editScheduleYear" value="2">2
                                <input type="radio" name="editScheduleYear" id="editScheduleYear" value="3">3
                                <input type="radio" name="editScheduleYear" id="editScheduleYear" value="4">4
                            </div>

                            <label for="editScheduleSection">Edit Section</label>
                            <div class="radio_btns">
                                <input type="radio" name="editScheduleSection" id="editScheduleSection" value="A">A
                                <input type="radio" name="editScheduleSection" id="editScheduleSection" value="B">B
                                <input type="radio" name="editScheduleSection" id="editScheduleSection" value="C">C
                            </div>

                            <div class="navigation-buttons">
                                <button onclick="deleteSchedule()" id="delete">Delete Schedule</button>
                                <button type="button" id="next-to-step-2">Next</button>
                            </div>
                        </div>
                    </div>

                    <div id="editScheduleStep-2" class="form-step">
                        <h2>Edit Schedule Time and Day</h2>
                        <div class="form" id="editScheduleTimeForm">
                            <label for="editScheduleStartTime">Edit Start Time:</label>
                            <input type="time" id="editScheduleStartTime" name="editScheduleStartTime" required>

                            <label for="editScheduleEndTime">Edit End Time:</label>
                            <input type="time" id="editScheduleEndTime" name="editScheduleEndTime" required>

                            <label for="editScheduleDayOfTheWeek">Edit Day of the Week:</label>
                            <select id="editScheduleDayOfTheWeek" name="editScheduleDayOfTheWeek" required>
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

                    <div id="editScheduleStep-3" class="form-step">
                        <h2>Edit Room and Capacity Details</h2>
                        <div class="form" id="editScheduleRoomForm">
                            <label for="editScheduleRoom">Edit Room Number</label>
                            <input type="text" id="editScheduleRoom" name="editScheduleRoom" placeholder="ex. LR 1" required>

                            <label for="editScheduleCapacity">Edit Capacity</label>
                            <input type="number" id="editScheduleCapacity" name="editScheduleCapacity" placeholder="ex, 50" required>

                            <div class="navigation-buttons">
                                <button type="button" id="prev-to-step-2">Previous</button>
                                <button onclick="updateSchedule()">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="background">
                <div class="attendance_history">
                    <div class="header">
                        <h3>Attendance History</h3>
                        <span id="close_form" onclick="hideAttendanceHistory()">
                            <h3>EXIT</h3>
                            <h3>X</h3>
                        </span>
                    </div>
                    <div class="attendanceBody">
                    </div>
                </div>
            </div>
            

            <table class="student_table">
                <thead>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance Actions</th>
                </thead>
                <tbody id="studentTableBody">
                </tbody>
            </table>
        
        
        </main>

        <div class="feedback">
        </div>
    </div>

    <script>

    </script>
</body>

</html>