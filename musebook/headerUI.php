<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
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
                                        <a href="booking-history.php">BOOKING HISTORY</a>
                                        <a href="view-booking.php">VIEW BOOKING</a>
                                        <a href="edit-profile.php">EDIT PROFILE</a>
                                        <a href="logout-process.php">LOG OUT</a>
                                    </div>
                                </div> ';
                    }else{
                        echo '  <div class="dropdown">
                                    <button class="dropbtn"> '.$_SESSION['userName'].' </button>
                                    <div class="dropdown-content">
                                        <a href="booking-history.php">BOOKING HISTORY</a>
                                        <a href="logout-process.php">LOG OUT</a>
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