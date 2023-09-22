<?php

include_once('../connection/conection.php');


        $del_id = $_GET['delete_id'];

        $deleteAdmin="DELETE FROM `user` WHERE id = '$del_id'";
        $delrun=mysqli_query($conn,$deleteAdmin);
        if ($delrun) {
            header('location:./adminGrid.php');
        }
?>