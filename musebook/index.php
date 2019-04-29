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
    <title>MuseBook</title>
    <link rel="stylesheet" type="text/css" href="css/home-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body onload="zoom()">
    <h1 class="headline">MUSEBOOK</h1>
    <h2 class=topic>The easiest way to book artist</h2>
    <br>
    <form action="search.php" class="searchbar" medthod="GET">
        <input class="sb" type="text" name="search_name" placeholder="ARTIST'S NAME" required>
        <input class="sbtt" type="submit" value="Search">
    </form>
    <br>
    <div class="cover-container">
        <ul>
            <li>
                <a href="profile.php?artistname=<?php echo "Adam Levine" ?>">
                <img src="src/img/AdamLevine.jpg" class="cover">
                <h2 class="cover">Adam Levine</h2>
                </a>
            </li>
            <li>
                <a href="profile.php?artistname=<?php echo "Ariana Grande" ?>">
                <img src="src/img/ArianaGrande.jpg" class="cover">
                <h2 class="cover">Ariana Grande</h2>
                </a>
            </li>
            <li>
                <a href="profile.php?artistname=<?php echo "Black Pink" ?>">
                <img src="src/img/BlackPink.jpg" class="cover">
                <h2 class="cover">BLACK PINK</h2>
                </a>
            </li>
            <li>
                <a href="profile.php?artistname=<?php echo "Taylor Swift" ?>">
                <img src="src/img/TaylorSwift.jpg" class="cover">
                <h2 class="cover">Taylor Swift</h2>
                </a>
            </li>
            <li>
                <a href="profile.php?artistname=<?php echo "Mariah Carey" ?>">
                <img src="src/img/MariahCarey.jpg" class="cover">
                <h2 class="cover">Mariah Carey</h2>
                </a>
            </li>
        </ul>
    </div>
</body>
</html>