<?php

include('../connection/conection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PhpMailer\SMTP;

include_once('./PHPMailer/src/Exception.php');
include_once('./PHPMailer/src/PHPMailer.php');
include_once('./PHPMailer/src/SMTP.php');

// require 'vendor/autoload.php';

// echo "rdtfyuiop[";
$email=$_POST['email'];




$checkEmailExist="SELECT * FROM `user` WHERE email='$email'";
$checkEmailRun=mysqli_query($conn,$checkEmailExist);

$fetch=mysqli_fetch_assoc($checkEmailRun);
  $user_id= $fetch['id'];
  $resetcode=rand(100000,999999);

    if (mysqli_num_rows($checkEmailRun)==1) {

        $updateotp="UPDATE `user` SET `reset_code`='$resetcode' WHERE id='$user_id'";
        $updaterun=mysqli_query($conn,$updateotp);
        if ($updaterun) {
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'fa921865@gmail.com';                     //SMTP username
            $mail->Password   = 'ofgsmwhqptouvajm';                               //SMTP password
            $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot your password';
            $mail->Body    = "
            <p> Your Reset Code is : {$resetcode} </p>
            <a href='http://localhost/client%20Work/india%20Assignment/login/forgot.php?reset_id={$user_id}'>Click Here To forgot your password  </a>
            ";
            $mail->addAddress($email, 'Joe User');
              $mail->setFrom('fa921865@gmail.com', 'My Assignment Writing Help');
              $mail->send();
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo "send";
        }

    }else{
        echo 'invalid';
    }


?>