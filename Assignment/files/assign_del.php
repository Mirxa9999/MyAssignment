<?php
    include ("../include/conn.php");
    $del=$_GET['yourdel'];
    $SQL="DELETE FROM `assign` WHERE `aid`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
        echo 1;
    }else{
        echo 2;
    }
?>