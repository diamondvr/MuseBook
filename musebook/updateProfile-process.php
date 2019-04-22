<?php
    require 'header.php';

    $profile = mysqli_real_escape_string($con, $_POST['newProfile']);
    $price = $_POST['newPrice'];
    $aname = $_SESSION['userRealName'];

    //$getProfile = mysqli_query($con, " SELECT * FROM artist_data WHERE artist_name = '$aname' ");
    //$row = mysqli_fetch_array($book_detail);

    if($_FILES["filUpload"]["name"] != "")
	{
        $img = $_FILES['filUpload'];
        print_r($img);
        echo $aname;
        $img_size = $_FILES['filUpload']['size'];
        $img_Type = $_FILES['filUpload']['type'];
        $allowed = array('image/jpeg','image/jpg','image/png','jpg','jpeg','png');
		if(in_array($img_Type, $allowed)) {
            if($img_size <= 2000000) {
                $imgName = mysqli_real_escape_string($con, $_FILES['filUpload']['name']);
                $imgData = mysqli_real_escape_string($con, file_get_contents($_FILES['filUpload']['tmp_name']));

                $strImg = "UPDATE artist_data SET artist_image = '$imgData' WHERE artist_name = '$aname'";
                mysqli_query($con, $strImg);

                echo 'update success';
            }else{
                echo 'Your file is too big. (Maximum file size is 2,048 KiB)';
            }
        }else{
            echo 'Error! upload unsupport file. (Support: jpg, jpeg, png)';
        }
    }

    $strProfile = "UPDATE artist_data SET artist_profile = '$profile' WHERE artist_name = '$aname'";
    mysqli_query($con, $strProfile);
    $strPrice = "UPDATE artist_data SET artist_price = '$price' WHERE artist_name = '$aname'";
    mysqli_query($con, $strPrice);

    header("Location: profile.php?artistname=$aname");
    exit();
?>