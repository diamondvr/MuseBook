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
    <title>MuseBook | Profile</title>
    <link rel="stylesheet" type="text/css" href="css/profile-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body>
    <?php
        $var_artist = $_GET['artistname'];
        $result = mysqli_query($con, " SELECT * FROM artist_data WHERE artist_name = '$var_artist' ");
        if (!$result) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $row = mysqli_fetch_array($result);
    ?>
    <div class="bar-container">
        <ul class=name_part>
            <li>
                <h1> <?php echo $row["artist_name"] ?> </h1>
            </li>
        </ul>
        <ul class=butt_part>
            <li>
                <a href="book.php?<?php echo $row["artist_name"]; ?>">
                    <img src="src/img/bookButt.png" class="butt">
                </a>
            </li>
        </ul>
    </div>
    <div class="profile-container">
        <ul>
            <li class="aimg">
                <?php
                    echo '  <img class="pic" src="data:image/jpeg;base64,'.base64_encode( $row['artist_image'] ).'"/>
                            <h3>PRICE: '.$row['artist_price'].'</h3>
                         ';
                ?>
            </li>
            <li class="des">
                <p> <?php echo $row["artist_profile"]; ?> </p>
            </li>
        </ul>
    </div>
</body>
</html>