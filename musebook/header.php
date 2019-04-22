<?php
    session_start();
    $con = mysqli_connect("localhost","root", NULL,"musebook");
?>

<script type="text/javascript">
    function zoom() {
        val = window.devicePixelRatio*100;
        if(val == 100) {
            document.body.style.zoom = "150%"; 
        }else if(val == 125){
            document.body.style.zoom = "120%";
        }else{
            document.body.style.zoom = "0%";
        }
    }
    function invalidData() {
        alert('Username or Password incorrect !');
    }
    function needLogOn() {
        alert('You must log in first !');
    }
</script>