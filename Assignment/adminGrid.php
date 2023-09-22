<?php
include('../connection/conection.php');
include('./include/header.php');
include('./include/sidebar.php');
$email=@$_SESSION['email'];
$userCheck="SELECT * FROM `user` WHERE email='$email'";
$statusrun=mysqli_query($conn,$userCheck);
$fetch =mysqli_fetch_assoc($statusrun);
?>
<head>
<link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<script src="sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Admin Grid</h4>
                            <a href="./adminCreate.php"><button class="btn btn-success" style="border-radius: 2px;">Add Admin</button></a>
                        </div>

                        <div class="table-responsive px-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `user` WHERE status=1 || status=3";
                                    $run = mysqli_query($conn, $sql);
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                    ?>
                                        <tr>


                                            <td><?php echo $fet['first_name']; ?></td>
                                            <td><?php echo $fet['email']; ?></td>
                                            <td><?php

                                                if ($fet['status'] == 1) {
                                                    echo "Super Admin";
                                                } elseif ($fet['status'] == 3) {
                                                    echo " Admin";
                                                }

                                                ?>
                                            </td>
                                            <td><?php

                                                if ($fet['active'] == 0) {
                                                ?>
                                                    <span class="badge bg-warning text-light">unactive</span>
                                                <?php
                                                } elseif ($fet['active'] == 1) {
                                                ?>
                                                    <span class="badge bg-success text-light">active</span>

                                                <?php
                                                }

                                                ?>
                                            </td>

                                            <td class="td">
                                                <?php
                                                
                                                if ($fetch['status'] == 1) {
                                                    ?>
                                                    
                                                    <a class="btn btn-danger" href="./admindelete.php?delete_id=<?php echo $fet['id'] ?>">Delete</a>
                                                    <a class="btn btn-primary" href="./adminupdate.php?update_id=<?php echo $fet['id'] ?>">Edit</a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include('./include/footer.php');
?>

<script>
    Swal.fire(
  'The Internet?',
  'That thing is still around?',
  'question'
)

</script>

<!--================== form validation ==================-->

