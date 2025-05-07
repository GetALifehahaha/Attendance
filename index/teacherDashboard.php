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
    <script defer src="/javascript/teacherDashboard.js"></script>
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
                <h2>Dashboard</h2>
            </div>

            <div class="grid dashboard">
                <div class="grid student_status">
                    <div class="container dashboard_card card1">
                        <h5>Student Count</h5>
                        <h3 id="studentCount"></h3>
                    </div>
                    <div class="container dashboard_card card2">
                        <h5>Schedules Created</h5>
                        <h3 id="scheduleCount"></h3>
                    </div>
                </div>

                <div class="weekly_calendar">
                    <div class="direction">
                        <p></p>
                        Weekly Calendar
                        <p>></p>
                    </div>
                    <table>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td id="current">8</td>
                            <td>9</td>
                            <td>20</td>
                        </tr>
                    </table>
                </div>

                <div class="topAbsents">
                    <div class="direction">
                        <p>
                        Frequently Absent Students
                        </p>
                    </div>

                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Recorded Absences</th>
                        </tr>
                        <tbody id="absentList"></tbody>
                    </table>
                </div>

                <div class="profSchedule">
                    <div class="direction">
                        <p>
                        Todays Schedule
                        </p>
                    </div>

                    <table>
                        <tr>
                            <th>Subject</th>
                            <th>Section</th>
                            <th>Time</th>
                            <th>Room</th>
                        </tr>

                        <tbody id="scheduleList"></tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="container"></div> -->

            
        </main>
    </div>

    <script>

    </script>
</body>

</html>