<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PhpMailer\SMTP;

include_once('./PHPMailer/src/Exception.php');
include_once('./PHPMailer/src/PHPMailer.php');
include_once('./PHPMailer/src/SMTP.php');
include('../connection/conection.php');
// print_r($_POST);
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$countrycode=$_POST['countrycode'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$email=$_POST['email'];

if ($password==''|| $email=='' || $countrycode==''|| $phone=='') {
    echo 'fill';
}else{
    $checkEmailExist="SELECT * FROM `user` WHERE email='$email'";
    $checkEmailRun=mysqli_query($conn,$checkEmailExist);
    
    if (mysqli_num_rows($checkEmailRun)>0) {
        echo "exist";
    }else{
    
        $userInsertQuery="INSERT INTO `user`( `first_name`, `last_name`, `email`, `passwords`, `status`, `country_code`, `Phone_no`)
         VALUES ('$first_name','$last_name','$email','$password','2','$countrycode','$phone')";
         $userRun=mysqli_query($conn,$userInsertQuery);
         if ($userRun) {
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
        $mail->Subject = 'Verify Your Account';
        $mail->Body    = "
        <p> Hi welcome to My Assignment Writing Help First Verify Your account let go to enjoy Assignment Order App </p>
        <a href='http://localhost/Ahsan/Assignment/india%20Assignment/Ajax/verfication.php?verify_mail={$email}'>Click Here To Verify your Account</a>
        ";
        $mail->addAddress($email, 'Joe User');
          $mail->setFrom('fa921865@gmail.com', 'My Assignment Writing Help');
          $mail->send();
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
            echo 1;
         }
    
    }
}


?>