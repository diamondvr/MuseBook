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
    <title> <?php echo $_SESSION['userRealName']." | Booking List" ?> </title>
    <link rel="stylesheet" type="text/css" href="css/viewBook-style.css">
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
            echo '<h1> Booking List </h1><hr>';
            $var_user = $_SESSION['userName'];
            $book_data = mysqli_query($con, " SELECT * FROM booking_detail WHERE user_artist = '$var_user' ");
            if($book_data->num_rows === 0) {
                echo "<h2> You havn't got any customer yet. </h2>";
            }else{
                while($row = mysqli_fetch_array($book_data)) {
                    if($row['verified'] == 0) {
                        echo ' 
                            <a href="book-detail.php?bookid='.$row['booking_id'].'" class="detail"> 
                                <li class="cols">'.$row['booking_id'].'</li>
                                <li class="coln">'.$row['detail_name'].'</li>
                                <li class="nveri">NOT VERIFIELD</li>
                            </a><hr>
                        ';
                    }else if($row['verified'] == 1){
                        echo ' 
                            <a href="book-detail.php?bookid='.$row['booking_id'].'" class="detail"> 
                                <li class="cols">'.$row['booking_id'].'</li>
                                <li class="coln">'.$row['detail_name'].'</li>
                                <li class="dveri">DROPED</li>
                            </a><hr>
                        ';
                    }else{
                        echo ' 
                            <a href="book-detail.php?bookid='.$row['booking_id'].'" class="detail"> 
                                <li class="cols">'.$row['booking_id'].'</li>
                                <li class="coln">'.$row['detail_name'].'</li>
                                <li class="veri">VERIFIELD</li>
                            </a><hr>
                        ';
                    }
                }
            }
        }
    ?>
</body>
</html>