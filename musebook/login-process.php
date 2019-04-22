<?php
    require 'header.php';

    $user = $_POST['usn'];
    $pass = $_POST['pwd'];

    $userData = mysqli_query($con, " SELECT * FROM users WHERE user_name = '$user' ");
    if($userData->num_rows === 0) {
        header("Location: login.php?error=yes");
        exit();
    }else{
        $data = mysqli_fetch_array($userData);
        if($data['user_name'] == $user && $data['user_pwd'] == $pass) {
            session_start();
            $_SESSION['userName'] = $data['user_name'];
            $_SESSION['userType'] = $data['user_isArtist'];
            $_SESSION['userID'] = $data['user_id'];
            $_SESSION['userRealName'] = $data['user_realName'];
            header("Location: index.php?login=success");
            exit();
        }else{
            header("Location: login.php?error=yes");
            exit();
        }
    }
?>