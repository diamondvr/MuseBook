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
    <title>MuseBook | Search</title>
    <link rel="stylesheet" type="text/css" href="css/search-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body onload="zoom()">
    <?php
        $var_name = $_GET['search_name'];
        $result = mysqli_query($con, " SELECT * FROM artist_data WHERE artist_name = '$var_name' ");
        if($result->num_rows === 0) {
            echo '<h1 class=no_result> Sorry, artist that you search is not in our system! </h1>';
            echo '<img class="notfDec" src="src/img/no_results.png">';
            echo '<br>';
            echo '<br>';
            echo '<div class="cbTH"><a class="bTH" href="index.php"> Back to Homepage </a></div>';
            exit();
        }else{
            echo '<h1 class=has_result> Search Result </h1>';
            while($row = mysqli_fetch_array($result)) {
                echo '<a href="profile.php?artistname='.$row['artist_name'].'" class="linkSearch"> <img class="pic" src="data:image/jpeg;base64,'.base64_encode( $row['artist_image'] ).'"/> </a>';
                echo '<h2>' .$row['artist_name']. '</h2>';
            }
            
        }
    ?>

</body>
</html>