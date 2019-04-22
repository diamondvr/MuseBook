<?php
    require 'header.php';
    require 'headerUI.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $_SESSION['userRealName']." | Booking Detail" ?> </title>
    <link rel="stylesheet" href="css/bookDetail-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body onload="zoom()">
    <?php
        if(!isset($_SESSION['userName'])) {
                echo '
                    <script>
                        needLogOn();
                    </script> ';
                header("Location: login.php?error=no");
                exit();
        }else{
            $var_bid = $_GET['bookid'];
            $book_detail = mysqli_query($con, " SELECT * FROM booking_detail WHERE booking_id = '$var_bid' ");
            $row = mysqli_fetch_array($book_detail);
            if($_SESSION['userName'] == $row['user_artist'] || $_SESSION['userName'] == $row['user_customer']) {
                echo '  <h1> Booking Detail </h1>
                        <ul>
                            <li class="con1">
                                <table class="detailTable">
                                    <tr><th class="topic"> Booking ID    </th> <th> '.$row['booking_id'].'  </th><tr>
                                    <tr><th class="topic"> Customer Name </th> <th> '.$row['detail_name'].' </th><tr>
                                    <tr><th class="topic"> Artist Name   </th> <th> '.$row['artist_name'].' </th><tr>
                                    <tr><th class="topic"> Date          </th> <th> '.$row['detail_date'].' </th><tr>
                                    <tr><th class="topic"> Time          </th> <th> '.$row['detail_time'].' </th><tr>
                                    <tr><th class="topic"> Phone Number  </th> <th> '.$row['detail_tel'].'  </th><tr>
                                    <tr><th class="topic"> Address       </th> <th> '.$row['detail_addr'].' </th><tr>
                                </table>
                            </li>
                        </ul> ';
                if($_SESSION['userType'] == 1 && $_SESSION['userName'] == $row['user_artist']) {
                    if($row['verified'] == 0) {
                        echo '  <ul>
                                <li class="con2">
                                    <div class="verification">
                                        <h2>VERIFICATION</h2>
                                        <h3> Please confirm your booking </h3>
                                        <ul>
                                            <li><a href="verifiedBooking-process.php?bookid='.$var_bid.'&state=2"><button class="b1"> ACCEPT </button></a></li>
                                            <br>
                                            <li><a href="verifiedBooking-process.php?bookid='.$var_bid.'&state=1"><button class="b2"> DISCARD </button></a></li>
                                        </ul>
                                    </div>
                                </li>
                                </ul> ';
                    }else if($row['verified'] == 1) {
                        echo '  <ul>
                                <li class="con2">
                                    <div class="verification">
                                        <h2>VERIFICATION</h2>
                                        <h3> You have discarded this job </h3>
                                    </div>
                                </li>
                                </ul> ';
                    }else if($row['verified'] == 2) {
                        echo '  <ul>
                                <li class="con2">
                                    <div class="verification">
                                        <h2>VERIFICATION</h2>
                                        <h3> You have accepted this job </h3>
                                    </div>
                                </li>
                                </ul> ';
                    }
                }else if($_SESSION['userType'] == 0 || $_SESSION['userName'] == $row['user_customer']) {
                    if($row['verified'] == 0) {
                        echo '  <ul>
                                <li class="con2">
                                    <div class="verification">
                                        <h2>VERIFICATION</h2>
                                        <h3> Artist has not decided your booking yet </h3>
                                    </div>
                                </li>
                                </ul> ';
                    }else if($row['verified'] == 1) {
                        echo '  <ul>
                                <li class="con2">
                                    <div class="verification">
                                        <h2>VERIFICATION</h2>
                                        <h3> Sorry, artist has discarded your booking </h3>
                                    </div>
                                </li>
                                </ul> ';
                    }else if($row['verified'] == 2) {
                        echo '  <ul>
                                <li class="con2">
                                    <div class="verification">
                                        <h2>VERIFICATION</h2>
                                        <h3> Woohoo! artist has accepted your booking </h3>
                                    </div>
                                </li>
                                </ul> ';
                    }
                }
            }else{
                //header("Location: index.php");
                exit();
            }
            
        }
    ?>
</body>
</html>