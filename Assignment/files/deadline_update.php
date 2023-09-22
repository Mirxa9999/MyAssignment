<?php
    //  include('../../connection/conection.php');
     include('../include/conn.php');
        // print_r($_POST);
        // if (isset($_POST['deadline_id'], $_POST['deadline_date'], $_POST['deadline_price'])) {
            $uid = mysqli_real_escape_string($conn, $_POST['deadline_id']);
            $deadline_date = mysqli_real_escape_string($conn, $_POST['deadline_date']);
            $deadline_price = mysqli_real_escape_string($conn, $_POST['deadline_price']);
        
            $sql = "UPDATE `deadline_pricing` SET `deadline_date`='$deadline_date',`deadline_price`='$deadline_price'
                    WHERE `deadline_id`='$uid'";
            $run = mysqli_query($conn, $sql);
        
            if ($run) {
                echo 1;
                //    echo "<script>alert('Category HAS BEEN UPDATED')</script>";
                //    header("Refresh:0,url=./viewcategory.php");
            } else {
                echo 2;
                //    echo "<script>alert('Category HAS NOT BEEN UPDATED')</script>";
            }
        // } else {
        //     echo 3;
            // echo "Required data is missing.";
        //    echo "<script>alert('Category HAS NOT BEEN UPDATED')</script>";
        // }
       
?>