<?php
include('../connection/conection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PhpMailer\SMTP;

include_once('./PHPMailer/src/Exception.php');
include_once('./PHPMailer/src/PHPMailer.php');
include_once('./PHPMailer/src/SMTP.php');
// echo "fcghjkl";
// print_r($_POST);
$email=$_POST['email'];
$password=$_POST['password'];
$loginQuery="SELECT * FROM `user` WHERE email='$email' AND  passwords='$password'";
$run= mysqli_query($conn,$loginQuery);
// if($run){
//     echo "you are hacked";
// }else{
//    echo "sorry you are failed";
// }
if (mysqli_num_rows($run)==1) {
    $_SESSION['email']=$email;
    $emails= $_SESSION['email'];
    $statusQuery="SELECT * FROM `user` WHERE email='$email'";
    $statusrun=mysqli_query($conn,$statusQuery);
    $fetch =mysqli_fetch_assoc($statusrun);
    $user_id=$fetch['id'];
    if($fetch['active']==0 ){
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
        <a href='http://localhost/client%20Work/india%20Assignment/Ajax/verfication.php?verify_id={$user_id}'>Click Here To Verify your Account</a>
        ";
        $mail->addAddress($emails, 'Joe User');
          $mail->setFrom('fa921865@gmail.com', 'My Assignment Writing Help');
          $mail->send();
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 3;
    }elseif ($fetch['status']==2) {
        echo 2;
    }elseif (  $fetch['status']==1 || $fetch['status']==3 ) {
        echo 1;
    }

}else{
    echo 'error';
}

?>