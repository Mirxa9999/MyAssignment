<?php
include_once('../connection/conection.php');
$del_id= $_GET['delete_id'];
$delQuery="DELETE FROM `type_of_paper` WHERE type_id='$del_id'";
$delQueryRun=mysqli_query($conn,$delQuery);
if ($delQueryRun) {
    header("location:./typePaperGrid.php");
}

?>