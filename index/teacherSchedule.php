<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="/styles/teacherPageStyle.css">
    <script defer src="/javascript/teacherPage.js"></script>
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
                        <a href="teacherSchedule.html">Schedules</a>
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
                <h2>Schedule</h2>
            </div>
            <div class="page_header">
                <button id="add_schedule">Add Schedule</button>
                <div class="filter_group">
                    <input type="text" id="filterByName" placeholder="Enter the name of the schedule" onkeyup="filterSchedules()">

                    <select name="filterByDepartment" id="filterByDepartment" onclick="filterSchedules()">
                        <option value="">Department</option>
                        <option value="IT">IT</option>
                        <option value="CS">CS</option>
                    </select>

                    <select name="filterByYear" id="filterByYear" onchange="filterSchedules()">
                        <option value="">Year</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <select name="filterBySection" id="filterBySection" onchange="filterSchedules()">
                        <option value="">Section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
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

            <div class="schedules_grid">
            </div>
        </main>

        <div class="feedback">
        </div>
    </div>


    <script>

    </script>
</body>

</html>