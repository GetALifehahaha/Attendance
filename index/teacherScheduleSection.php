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
                <h2 onclick="window.location.href='teacherSchedule.php'">Schedule</h2>
                <h2>></h2>
                <h2>IT Elective LAB</h2>
            </div>

            <button>Set Attendance</button>

            <div class="full_screen_container">
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
            </div>
            <div class="grid student_list">
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

            </div>
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
                
        
        
        </main>
    </div>

    <script>

    </script>
</body>

</html>