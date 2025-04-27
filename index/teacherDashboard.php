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
                <h2>Dashboard</h2>
            </div>

            <div class="grid dashboard">
                <div class="grid student_status">
                    <div class="container dashboard_card card1">
                        <h5>Student Count</h5>
                        <h3>200</h3>
                    </div>
                    <div class="container dashboard_card card2">
                        <h5>Schedules Created</h5>
                        <h3>20</h3>
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
                            <td>16</td>
                            <td>17</td>
                            <td id="current">18</td>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
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
                            <th>Remarks</th>
                        </tr>
                        
                        <tr>
                            <td>Jilian</td>
                            <td>5</td>
                            <td>Drop</td>
                        </tr>
                        <tr>
                            <td>Fatima</td>
                            <td>4</td>
                            <td>Warning</td>
                        </tr>
                        <tr>
                            <td>Taylor</td>
                            <td>4</td>
                            <td>Warning</td>
                        </tr>
                        <tr>
                            <td>Jenna</td>
                            <td>3</td>
                            <td>Warning</td>
                        </tr>
                        <tr>
                            <td>Zayne</td>
                            <td>3</td>
                            <td>Warning</td>
                        </tr>
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

                        <tr>
                            <td>Computer Programing</td>
                            <td>1A</td>
                            <td>8:00 AM-10:00 AM</td>
                            <td>Lab1</td>
                        </tr>

                        <tr>
                            <td>IT Elective</td>
                            <td>2A</td>
                            <td>11:00 AM-1:00 PM</td>
                            <td>LR1</td>
                        </tr>
                        
                        <tr>
                            <td>IT Elective</td>
                            <td>2C</td>
                            <td>2:00 PM-5:00 PM</td>
                            <td>LR1</td>
                        </tr>
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