<?php
    require 'header.php';
    require 'headerUI.php';
    if(!isset($_SESSION['userName'])) {
        header("Location: login.php?error=no");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Musebook | Book</title>
    <link rel="stylesheet" href="css/book-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/datepickk.min.css">
</head>
<body onload="zoom()">
    <?php
        $var_artist = $_GET['artist_name'];
        $result = mysqli_query($con, " SELECT * FROM artist_data WHERE artist_name = '$var_artist' ");
        if (!$result) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $row = mysqli_fetch_array($result);
    ?>
    <script src="js/datepickk.min.js"></script> 
        <div class="item1">
            <ul class="bar1">
                <li>
                    <h1 class="aname">Booking: <?php echo $row["artist_name"] ?> </h1>              
                </li>
                <li>
                    <?php
                        echo '<img class="pic" src="data:image/jpeg;base64,'.base64_encode( $row['artist_image'] ).'"/>';
                    ?>
                </li>
            </ul>
        </div>
        <script>
            function verified() {
                if(datepicker.selectedDates == "") {
                    alert('Please select date!');
                }else{
                    var day = datepicker.selectedDates;
                    var selDate = new Date(day);
                    var dateStr = selDate.getFullYear() + "-" + (selDate.getMonth()+1) + "-" + selDate.getDate();
                    document.inform.action = "book-process.php?artist=<?php echo $var_artist?>&date=" + dateStr;
                }
            }
        </script>
        <div class="item4">
            <form name="inform" class="item4-input" action="" method="POST">
                <h2 class="topic">Booking Detail</h2><br>
                <h3 class="nameLabel">Name :</h3>
                <input type="text" class="nameBox" name="detailname" required placeholder="Your Name"><br>
                <h3 class="timeLabel">Time :</h3> 
                <input type="radio" class="time1" name ="detailtime" id="time1" value="18:00:00-19:00:00" checked><h4 class="t1">18.00-19.00</h4>
                <input type="radio" class="time2" name="detailtime" id="time2" value="21:00:00"><h4 class="t2">21.00-22.00</h4>   
                <h3 class="phoneLabel">Mobile :</h3>
                <input type="tel" class="phoneBox" name="detailtel" pattern="[0-9]{10}" maxlength="10" placeholder="Tel."><br><br>
                <h3 class="addrLabel">Address</h3>
                <textarea class="addrBox" name="detailaddr" id="" cols="30" rows="3" placeholder="Type your address here"></textarea><br>
                <input class="subButt" type="submit" onclick="verified()" name="submit-detail"  value="BOOK"><br>
            </form>            
        </div>    
    <script>
        var datepicker = new Datepickk();
        datepicker.range = false;
        datepicker.maxSelections = 1;
    </script>    
    <?php
        $getAuser = "SELECT * FROM users WHERE user_realName = '$var_artist'";
        $data = mysqli_query($con, $getAuser);
        $row = mysqli_fetch_array($data);
        $table = $row['user_name'];
        $getDate = "SELECT * FROM $table";
        $result = mysqli_query($con, $getDate);
        while($row = mysqli_fetch_array($result)) {
            $date = $row['unwork_date'];
            echo "<script> 
                    var day = new Date('$date');
                    datepicker.disabledDates = [day]; 
                  </script>";
        }
    ?>
    <script>
        datepicker.minDate = new Date();
        datepicker.show()    
    </script>    
</body>
</html>