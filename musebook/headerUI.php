<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/nav-style.css">
</head>
<body onload="zoom()">
    <div class="menubar">
        <ul class="menu">
            <li>
                <a href="index.php">HOME</a>
            </li>
            <li>
                <a href="artist.php">ARTIST</a>
            </li>
            <li>
                <a href="about.php">ABOUT</a>
            </li>
        </ul>
        <ul class="logOn">
            <?php
                if (isset($_SESSION['userName'])) {
                    if($_SESSION['userType'] == 1) {
                        echo '  <div class="dropdown">
                                    <button class="dropbtn"> '.$_SESSION['userName'].' </button>
                                    <div class="dropdown-content">
                                        <a href="booking-history.php">Booking History</a>
                                        <a href="view-booking.php">View Booking</a>
                                        <a href="edit-schedule.php">Edit Schedule</a>
                                        <a href="edit-profile.php">Edit Profile</a>
                                        <a href="logout-process.php">Log Out</a>
                                    </div>
                                </div> ';
                    }else{
                        echo '  <div class="dropdown">
                                    <button class="dropbtn"> '.$_SESSION['userName'].' </button>
                                    <div class="dropdown-content">
                                        <a href="booking-history.php">Booking History</a>
                                        <a href="logout-process.php">Log Out</a>
                                    </div>
                                </div> ';
                    }
                }else{
                    echo '  <li>
                                <a href="login.php?error=no">
                                    <button class="logbtn" href="login.php?error=no"> LOG IN </button>
                                </a>
                            </li> ';
                }
            ?>
        </ul>
    </div>
</body>
</html>