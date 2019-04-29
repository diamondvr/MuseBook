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
    <title>MuseBook | Artist</title>
    <link rel="stylesheet" type="text/css" href="css/artist-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body onload="zoom()">
    <h1>ARTIST</h1>
    <?php
        $result = mysqli_query($con, "SELECT * FROM artist_data");
        while($row = mysqli_fetch_array($result)) {
            echo '  <div class="gallery">
                        <a href="profile.php?artistname='.$row['artist_name'].'">
                            <img src="data:image/jpeg;base64,'.base64_encode( $row['artist_image'] ).'"/>
                        </a>
                        <div class="artname">
                            '.$row['artist_name'].'
                        </div>
                    </div> ' ;
        }
    ?>
</body>
</html>