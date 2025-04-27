<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="../styles/teacherPageStyle.css">
    <script defer src="../javascript/teacherPage.js"></script>
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
                <li>
                    <span>
                        <a href="teacherAccount.php">Account</a>
                    </span>
                </li>
            </ul>
        </aside>

        <main>
            <div class="breadcrumbs">
                <h2>Schedule</h2>
            </div>
            <button id="add_schedule">Add Schedule</button>

            <div class="full_screen_container">
                <div class="add_schedule" style="overflow: scroll;">
                    <div class="header">
                        <h3>Add Schedule</h3>
                        <span id="close_form">
                            <h3>EXIT</h3>
                            <h3>X</h3>
                        </span>
                    </div>

                    <div id="step-1" class="form-step active">
                        <h2>Schedule Name and Description</h2>
                        <form id="schedule-details-form">
                            <label for="schedule_name">Schedule Name</label>
                            <input type="text" id="schedule_name" name="schedule_name" placeholder="Enter schedule name" required>

                            <label for="schedule_description">Description</label>
                            <textarea id="schedule_description" name="schedule_description" placeholder="Enter schedule description" required></textarea>

                            <div class="navigation-buttons">
                                <button type="button" id="next-to-step-2">Next</button>
                            </div>
                        </form>
                    </div>

                    <div id="step-2" class="form-step">
                        <h2>Select Schedule Time and Day</h2>
                        <form id="schedule-time-form">
                            <label for="schedule_start">Start Time:</label>
                            <input type="time" id="schedule_start" name="schedule_start" required>

                            <label for="schedule_end">End Time:</label>
                            <input type="time" id="schedule_end" name="schedule_end" required>

                            <label for="schedule_day">Day of the Week:</label>
                            <select id="schedule_day" name="schedule_day" required>
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
                        </form>
                    </div>

                    <div id="step-3" class="form-step">
                        <h2>Room and Capacity Details</h2>
                        <form id="room-form">
                            <label for="room_number">Room Number</label>
                            <input type="text" id="room_number" name="room_number" placeholder="ex: Room 101" required>

                            <label for="capacity">Capacity</label>
                            <input type="number" id="capacity" name="capacity" placeholder="ex: 30" required>

                            <div class="navigation-buttons">
                                <button type="button" id="prev-to-step-2">Previous</button>
                                <button type="submit">Submit Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="schedules_grid">
                <div onclick="window.location.href='teacherScheduleSection.php'" class="schedule_container">
                    <h4>IT Elective Lab</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>

                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
                <div class="schedule_container">
                    <h4>IT Elective</h4>
                    <div class="details">
                        <p>BSIT 2A</p>
                        <p>11:00 am - 12:30 pm</p>
                        <p>LAB 2</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>

    </script>
</body>

</html>