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
                <h2>Account</h2>
            </div>

            <div class="grid account">
                <div class="container profile">
                    <div class="profile_picture">
                        <img src="../assets/Sample_Images/profile.jpg" alt="" id="picture">
                    </div>
                    <div class="info_frame">
                        <h5>Name</h5>
                        <h4>Professor Name</h4>
                    </div>
                    <div class="info_frame">
                        <h5>Role</h5>
                        <h4>Professor</h4>
                    </div>
                    <div class="info_frame">
                        <h5>Department</h5>
                        <h4>Department of Information Technology</h4>
                    </div>
                    <div class="info_frame">
                        <h5>Contact Number</h5>
                        <h4>0987-654-3210</h4>
                    </div>
                </div>

                <div class="container">
                    <div class="info_frame">
                        <h5>Assigned Classes</h5>
                        <div class="horizontal_info">
                            <h4>BSIT - 2A</h4>
                            <h4>BSIT - 2B</h4>
                            <h4>BSIT - 2C</h4>
                        </div>
                    </div>
                    <div class="info_frame">
                        <h5>Office Hours</h5>
                        <h4>8:00 am - 5:00 pm</h4>
                    </div>
                    <div class="info_frame">
                        <Button>Edit</Button>
                    </div>
                </div>
            </div>

            
        </main>
    </div>

    <script>

    </script>
</body>

</html>