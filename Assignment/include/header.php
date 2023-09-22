
<?php
include_once('../connection/conection.php');
$email=@$_SESSION['email'];
if (!(@$_SESSION['email'])) {
    header('location:../login/login.php');
}
$userCheck="SELECT * FROM `user` WHERE email='$email'";
$statusrun=mysqli_query($conn,$userCheck);
$fetch =mysqli_fetch_assoc($statusrun);
if ($fetch['status']==3 || $fetch['status']==1) {
    if ($fetch['active']==0) {
        header('location:../login/login.php');
    }
}else{
    header('location:../login/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Assignment</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' /> -->

  <!-- Sweet Alert Github.io -->
  <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<script src="sweetalert2/dist/sweetalert2.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="loader"></div>
 
  <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                   
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                             <!-- <img alt="image" src="./imgs/dummy_profile.jpg" class="user-img-radious-style"> -->
                             <img alt="image"
                                src=".././assets/logo1.png" class="user-img-radious-style">
                              <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title"><span><?php echo $fetch['first_name'] ?></span> &nbsp; <span><?php echo $fetch['last_name'] ?></span></div>
                            <a href="./adminupdate.php?update_id=<?php echo $fetch['id'] ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile 
                            </a> 
                            <div class="dropdown-divider"></div>
                            <a href="../login/logout.php" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>