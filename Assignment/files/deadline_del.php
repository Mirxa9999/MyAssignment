<?php
    include ("../include/conn.php");
    $del=$_GET['mydel'];
    $SQL="DELETE FROM `deadline_pricing` WHERE `deadline_id`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
        echo 3;
    }else{
        echo 4;
    }
?>