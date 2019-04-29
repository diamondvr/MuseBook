<?php
    require 'header.php';

    if(isset($_SESSION['userName'])) {
        $detailday = $_GET['date'];
        $detailname = $_POST['detailname'];
        $detailaddr = $_POST['detailaddr']; 
        $detailtel = $_POST['detailtel'];
        $detailtime = $_POST['detailtime'];
        $detailaccountuser = $_SESSION['userName'];
        $detailartistname = $_GET['artist'];
        $getAuser = "SELECT * FROM users WHERE user_realName = '$detailartistname'";
        $data = mysqli_query($con, $getAuser);
        $row = mysqli_fetch_array($data);
        $detailaccountartist = $row['user_name'];
    }else{
        header("Location: login.php");
    }
    if(!empty($detailname)){
        if(!empty($detailaddr)){
            if(!empty($detailtel)){
                if(!empty($detailtime)){
                    if(!empty($detailday)) {
                        if(mysqli_connect_error()){
                            die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                        }else{
                            $sql = "INSERT INTO booking_detail(user_customer,user_artist,artist_name,detail_name, detail_addr,detail_tel,detail_date,detail_time) values('$detailaccountuser','$detailaccountartist','$detailartistname','$detailname','$detailaddr','$detailtel','$detailday','$detailtime')";
                            if($con->query($sql)){
                                $last_id = $con->insert_id;
                                echo "Recorded";
                            }else{
                                echo "Error : ". $sql ."<br>". $con->error;
                                exit();
                            }
                            $query = "INSERT INTO $detailaccountartist (unwork_date) VALUES ('$detailday') ";
                            mysqli_query($con, $query);
                            header("Location: book-detail.php?bookid=$last_id");
                            exit();
                        }
                    }else{
                        echo "Date should not be empty";
                        die();
                    }
                }else{
                    echo "Time should not be empty";
                    die();
                }

            }else{
                echo "Tel should not be empty";
                die();
            }

        }else{
            echo "Address should not be empty";
            die();
        }

    }else{
        echo "Name should not be empty";
        die();
    }
?>