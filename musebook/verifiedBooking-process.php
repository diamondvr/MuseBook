<?php
    require 'header.php';

    if(!isset($_SESSION['userName'])) {
        header("Location: login.php?error=no");
        exit();
    }else{
        $var_bid = $_GET['bookid'];
        $var_sta = (int)$_GET['state'];
        $book_detail = mysqli_query($con, " SELECT * FROM booking_detail WHERE booking_id = '$var_bid' ");
        $row = mysqli_fetch_array($book_detail);
        if($_SESSION['userName'] == $row['user_artist']) {
            $storeSql = "UPDATE booking_detail SET verified = '$var_sta' WHERE booking_id = '$var_bid' ";
            if($con->query($storeSql) === TRUE) {
                header("Location: book-detail.php?bookid=$var_bid");
                exit();
            }else{
                echo 'Error! Cannot update database';
                exit();
            }
        }else{
            header("Location: index.php");
            exit();
        }
    }
?>