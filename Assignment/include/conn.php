<?php
    $conn=mysqli_connect("localhost","root","","assignment");
    if($conn){
        // echo "connected";
    }else{
        echo "not connected";
    }
?>