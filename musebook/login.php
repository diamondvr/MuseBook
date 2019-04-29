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
    <title>MuseBook | Log in</title>
    <link rel="stylesheet" type="text/css" href="css/login-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body onload="zoom()">
    <div class="box-container">
        <form action="login-process.php" method="POST" class="formBox">
            <h2> Username </h2>
            <input type="text" name="usn" placeholder="Username" class="box" pattern="[A-Za-z0-9]{3,25}" required><br>
            <h2> Password </h2>
            <input type="password" name="pwd" placeholder="Password" class="box" required><br><br>
            <input type="submit" value="Log in" class="butt">
        </form>
    </div>
    <h1>Welcome Back!<br><h2 class="des">To keep connected with us please login</h2></h1>
    <?php
        $err = $_GET['error'];
        if($err == "yes") {
            echo "  <script>
                        invalidData();
                    </script> ";
        }
    ?>
</body>
</html>