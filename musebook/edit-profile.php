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
    <title> <?php echo "Edit | ".$_SESSION['userRealName'] ?> </title>
    <link rel="stylesheet" href="css/editProfile-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script language="javascript">
        function fncSubmit(Page)
        {
	        if(Page == 1) {
		        document.dataForm.action="updateProfile-process.php";
            }
	        if(Page == 2)
	        {
		        document.dataForm.action="index.php";
	        }	
	        document.dataForm.submit();
        }
    </script>
</head>
<body onload="zoom()">
    <?php
        if(!isset($_SESSION['userName'])) {
            header("Location: login.php?error=no");
            exit();
        }else{
            $var_name = $_SESSION['userRealName'];
            $profile = mysqli_query($con, " SELECT * FROM artist_data WHERE artist_name = '$var_name' ");
            $row = mysqli_fetch_array($profile);
        }
    ?>
    <h1> Edit Profile : <?php echo $row['artist_name'] ?> </h1>
    <form name="dataForm" method="POST" action="updateProfile-process.php" enctype="multipart/form-data">
        <ul class="content">
            <li>
                <h2 class="to1">Profile or Bio</h2>
                <textarea name="newProfile" class="profileBox"><?php echo $row['artist_profile'] ?></textarea>
            </li>
            <li>
                <br><h2 class="to2">Price</h2>
                <textarea name="newPrice" class="priceBox" wrap="soft" maxlength="15"><?php echo $row['artist_price'] ?></textarea>
            </li>
        </ul>
        <ul class="content">
            <li class="galpic">
                <h2 class="to3">Profile Image</h2>
                <?php echo '<img class="pic" src="data:image/jpeg;base64,'.base64_encode( $row['artist_image'] ).'"/>' ?>
                <p>*Maximum image size is 2,048 KiB</p>
                <input type="file" name="filUpload" class="bfile">
            </li>
        </ul>
        <ul class="butt">
            <li><button type="submit" class="b1" onClick="JavaScript:fncSubmit(1)"> SAVE </button></li>
            <li><button type="submit" class="b2" onClick="JavaScript:fncSubmit(2)"> CANCEL </button></li>
        </ul>
    </form>
</body>
</html>