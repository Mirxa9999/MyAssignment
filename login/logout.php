<?php
include('../connection/conection.php');

session_destroy();
header('location:./login.php');

?>