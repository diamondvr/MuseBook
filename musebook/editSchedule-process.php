<?php
    require 'header.php';

    if(isset($_SESSION['userName'])) {
        $var_date = $_GET['date'];
        $var_state = $_GET['state'];
        $var_table = $_SESSION['userName'];
        if($var_state == 0) {               // State for mark selected date
            $task = "INSERT INTO $var_table (unwork_date) VALUES ('$var_date')";
            mysqli_query($con, $task);
            echo 'Insert Successfully';
            header("Location: edit-schedule.php");
            exit();
        }else{                              // State for unmark selected date
            $task = "DELETE FROM $var_table WHERE unwork_date = '$var_date'";
            mysqli_query($con, $task);
            echo 'Delete Successfully';
            header("Location: edit-schedule.php");
            exit();
        }
    }
    
?>