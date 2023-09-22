<?php
    
    include('../include/conn.php'); 
    session_start();
    if(isset($_POST['email'])){
        
        $pemail=mysqli_real_escape_string($conn,$_POST['email']);        
        $mypass=mysqli_real_escape_string($conn,$_POST['mypass']);
        if(($pemail=="")||($mypass=="")){
            echo 8;
            // echo "Please fill email and password";
        }else{
            $esql="SELECT * FROM `admin` WHERE `email`='$pemail' AND `password`='$mypass'";
            $erun=mysqli_query($conn,$esql);
            
            if (mysqli_num_rows($erun)>0) {
                echo 9;
            }else {
                echo 11;
            }
        }
    }
?>