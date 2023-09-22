<?php
// include_once('../connection/conection.php');


// if (!(@$_SESSION['email'])) {
//     header('location:../login/login.php');
// }
$userCheck="SELECT * FROM `user` WHERE email='$email'";
$statusrun=mysqli_query($conn,$userCheck);
$fetch3 =mysqli_fetch_assoc($statusrun);
// if (!($fetch['status']==1)) {
//     header('location:../login/login.php');
// }
?>

<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="home.php"><span
                class="logo-name"><img src=".././assets/logo1.png" height="50" width="50" alt="" srcset=""> Assignment</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown active">
              <a href="home.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa-solid fa-basket-shopping" ></i><span>Order</span></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="nav-link" href="assignment.php">Add Assignment</a></li> -->
                        <li><a class="nav-link" href="./orderGrid.php">View order</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa-solid fa-hand-holding-dollar"></i><span>Pricing</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="pricing.php">Manage  Pricing</a></li>
                        <li><a class="nav-link" href="./datedeadlineGrid.php">Date DeadLine Pricing</a></li>
                        <!-- <li><a class="nav-link" href="viewassignment.php">View Assignment</a></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="users" style="margin-left:05px;"></i><span>User</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="userGrid.php">Users</a></li>

                        <?php
                        if ($fetch3['status']==1) {
                           ?>
                           
                           <li><a class="nav-link" href="adminGrid.php"> Admins </a></li>
                           <?php
                        }
                        ?>
                        <!-- <li><a class="nav-link" href="viewassignment.php">View Assignment</a></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i class="
                    fas fa-file-signature"></i><span>Paper Type</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="typePaperGrid.php">Type Of Paper</a></li>
                        <!-- <li><a class="nav-link" href="viewassignment.php">View Assignment</a></li> -->
                    </ul>
                </li>
          </ul>
        </aside>
      </div>