<?php

 $email = @$_SESSION['email'];
if (!(@$_SESSION['email'])) {
    header('location:./login/login.php');
}
$userCheck = "SELECT * FROM `user` WHERE email='$email'";
$statusrun = mysqli_query($conn, $userCheck);
$fetch = mysqli_fetch_assoc($statusrun);
$user_id = $fetch['id'];
if (!($fetch['status'] == 2)) {
    header('location:./login/login.php');
}
if ($fetch['active']==0) {
    header('location:./login/login.php');

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon.png">

    <link rel="stylesheet" href="./style.css" media="all">


    <!-- Check It Out All Links -->
    <link rel="stylesheet" href="assets/dist/allNew.min.css">
    <link rel="stylesheet" href="assets/dist/custom.min.css">
    <link rel="stylesheet" href="public/order_form2/css/font- awesome.min.css">


    <script defer type="text/javascript" src="assets/dist/plagins/popper.min.js"></script>

    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="icon" href="assets/img/favicon/favicon-32x32.png">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="canonical" href="order.html" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Jquery  Cnd script -->
    <script src="./assets/js/jquery.min.js"></script>

    <!-- Boostrap Cdn And Script  -->
    <script src="./assets/js/boostrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/boostrap.min.css">

</head>

<body>
<section data-is-ios="" is_mac_book="" class="header-container header-container-banner fullmob-nav">
    <div class="container" id="header-container">
        <div class="row">
            <div class="col-xl-12">
                <header class="header-short">
                    <nav class="navbar navbar-expand-xl d-flex justify-content-between align-items-center ">
                        <div class="diw d-flex justify-content-between align-items-centers">
                            <div class="d-flex align-items-centers">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="menu-icon"></span>
                                </button>
                                <a class="navbar-brand navbar-brand-short d-flex align-items-center" href="./index.php">
                                    <img src="./assets/logo1.png" height="60" width="65" alt="" width="200px">
                                </a>
                            </div>
                            <div class="d-xl-none">
                                <div class="d-flex align-items-center justify-content-end tab-buttons">
                                </div>
                            </div>

                        </div>

                        <div class="collapse navbar-collapse test " id="main-nav">
                            <ul class="navbar-nav ">

                                <li class="nav-item "><a class="nav-link" href="./index.php">Home</a>
                                </li>
                                <li class="nav-item "><a class="nav-link" href="prices.html">About</a></li>
                                <li class="nav-item "><a class="nav-link" href="faq.html">Services</a></li>
                            </ul>
                        </div>
                        <div class="nav-item sign-right list-no-pc">
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:rgb(255, 114, 0); color:white;">
                                    My Account
                                </button>
                                <ul class="dropdown-menu" style="margin-left:-35px;">
                                    <li><a class="dropdown-item" href="./profile.php">My Order</a></li>
                                    <li><a class="dropdown-item" href="./login/logout.php">Logout</a></li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
        </div>
    </div>


</section>




</body>

</html>

