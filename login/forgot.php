<?php
include_once('../connection/conection.php');
if (isset($_GET['reset_id'])) {
     $user_id = $_GET['reset_id'];

    $getresetcode = "SELECT * FROM `user` WHERE id=$user_id";
    $resetrun = mysqli_query($conn, $getresetcode);
    $fet = mysqli_fetch_assoc($resetrun);
    $resetcode = $fet['reset_code'];
}


if (isset($_POST['submit'])) {
    $otp = $_POST['otp'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if ($resetcode != $otp) {
        $invalid = 'Enter The Valid reset code';
    } else {
        if ($password != $confirmpassword) {
            $invalid = "Your Password Does'nt Match";
        } else {
            $passwordUpdate = "UPDATE `user` SET `passwords`='$password',`reset_code`='' WHERE id=$user_id";
            $passwordrun = mysqli_query($conn, $passwordUpdate);
            if ($passwordrun) {
                $success = "Your password has Been reset successfully";
                // header('location:./login.php');
                header("refresh:2;url=./login.php");
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="./style.css" media="all"> -->

    <link rel="stylesheet" href="./style.css" media="all">
    <link rel="stylesheet" href="../assets/css/boostrap.min.css">
    <script src="../assets/js/boostrap.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>

</head>

<style>
    body {
        background-image: url('./bg.jpeg');
        background-position: center;
        background-size: cover;
        height: 100%;
        background-repeat: no-repeat;
    }

    .logindiv {
        margin-top: 200px;
    }
</style>

<body>

    <div class="container-fluid   ">
        <section class=" gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center  logindiv mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card " style="border-radius: 1rem;">
                            <div class="card-body p-5 ">



                                <div class="login">
                                    <form method="post">

                                        <div class="d-flex justify-content-center mb-4">

                                            <img src="./logo.png" alt="">
                                            <h4 class="fw-bold text-uppercase text-dark text-center logintext">Forgot your password <?php


                                                                                                                                    ?></h4>
                                        </div>
                                        <div>
                                            <?php
                                            if (@$invalid) {
                                            ?>
                                                <p class="text-danger text-center" id="errors"> <?php echo @$invalid ?></p>
                                            <?php
                                            } elseif (@$success) {
                                            ?>
                                                <p class="text-success text-center" id="errors"> <?php echo @$success ?></p>
                                            <?php
                                            }
                                            ?>


                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="typeEmailX" class="text-start">Otp</label>
                                            <input type="number" id="typeEmailX" class="form-control form-control-lg" name="otp" />
                                            <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="typeEmailX" class="text-start">Password</label>
                                            <input type="password" id="typeEmailX" class="form-control form-control-lg" name="password" />
                                            <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typePasswordX">Confirm Password</label>
                                            <input type="password" id="typePasswordX" class="form-control form-control-lg" name="confirmpassword" />
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                                        <label class="form-check-label" for="gridCheck">
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">Forgot
                                                    password?</a></p> -->
                                            </div>
                                        </div>
                                        <div class="row loginbtn">
                                            <button class="btn btn-lg px-5 " name="submit" type="submit">Forgot Password</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $('#submit').on('click', function(e) {
            // alert('ok woking')
            e.preventDefault();

            let formss = new FormData(myform);
            $.ajax({
                type: "POST",
                url: "../Ajax/login.php",
                data: formss,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == 1) {
                        window.location.href = "../index.php";
                    } else if (response == 2) {
                        window.location.href = "../index.php";

                    } else if (response == 'error') {
                        $('#errors').text("Your Credential des'nt Match")
                    }
                }
            });
            //   console.log(formss)
        })
    </script>

</body>

</html>