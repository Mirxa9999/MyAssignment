<?php
include_once('../connection/conection.php');

$verify_mail=$_GET['verify_mail'];

$verifyQuery="UPDATE `user` SET `active`='1' WHERE email ='$verify_mail' ";
$verifyQueryRun=mysqli_query($conn,$verifyQuery);
if ($verifyQueryRun) {
    header('location:../login/login.php');
}



?>