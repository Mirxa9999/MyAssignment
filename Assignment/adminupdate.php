<?php
include('../connection/conection.php');
include('./include/header.php');


echo $update_id = $_GET['update_id'];
$getAdmin = "SELECT * FROM `user` WHERE id = '$update_id'";
$getAdminRun = mysqli_query($conn, $getAdmin);
$fetch = mysqli_fetch_assoc($getAdminRun);


if (isset($_POST['submit'])) {
    $active_status = 0;
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $adminstatus = $_POST['status'];
    if ($_POST['active'] == 1) {
        echo  $active_status = 1;
    }
    if ($_POST['password'] == '') {
        $password = $fetch['passwords'];
    }
    $userupdate = "UPDATE `user` SET `first_name`='$firstName',`last_name`='$last_name',`passwords`='$password',
        `status`='$adminstatus',`active`='$active_status' WHERE id= '$update_id'";
    $userupdateRun = mysqli_query($conn, $userupdate);
    if ($userupdateRun) {
        header("location:./adminGrid.php");
    }
}
include('./include/sidebar.php');
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="card ">
                        <form id="myassignment" method="post">
                            <div class="card-header">
                                <h4>Admin &nbsp; <span class="text-danger"><?php echo @$existmsg ?></span></h4>
                            </div>
                            <div class="card-body">

                                <h6>Create Admin</h6>
                                <hr>
                                <div class="row">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['first_name'] ?>" name="first_name" required>
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['last_name'] ?>" name="last_name">
                                        <span id="errorstock"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?php echo $fetch['email'] ?>" name="email" required disabled>
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                        <span id="errorstock"></span>
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Status</label>
                                        <select id="inputState" class="form-select form-control" name="status" required>

                                            <option value="<?php echo $fetch['status'] ?>" selected><?php
                                            if ($fetch['status'] == 1) {
                                                echo "Super Admin";
                                            } elseif ($fetch['status'] == 3) {
                                                # code...
                                                echo "Admin";
                                            }

                                            ?></option>
                                            <option value="1">Super Admin</option>
                                            <option value="3">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <?php
                                        if ($fetch['active'] == 1) {
                                        ?>
                                            <label for="inputState" class="form-label">Active</label>
                                            <input type="checkbox" name="active" value="1" checked>

                                        <?php
                                        } elseif ($fetch['active'] == 0) {
                                        ?>
                                            <label for="inputState" class="form-label">unActive</label>
                                            <input type="checkbox" name="active" value="1">
                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit" value="Update" name="submit" />
                            </div>
                        </form>
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
    $(document).ready(function() {
        $("#btn").on("click", function(e) {
            // alert("run");
            e.preventDefault();
            var mydata = new FormData(myassignment);
            $.ajax({
                url: "./files/assignment_insert.php",
                method: "POST",
                data: mydata,
                contentType: false,
                processData: false,
                success: function(res) {
                    alert(res);
                    if (res == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'Assignment Has Been Inserted successfully'
                        })
                        // alert("CATEGORY HAS BEEN INSERTED");
                        $('#myassignment').trigger('reset');
                    } else if (res == 2) {
                        alert("Assignment HAS BEEN NOT INSERTED");
                    } else {
                        alert("Img is not right")
                    }
                }
            });
        });
    });
</script>

<!--================== form validation ==================-->

<script>
    var tr = document.getElementById("name");
    tr.addEventListener("input", (e) => {
        var name = e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errorname").innerHTML = "Name must only Contain letters.";
        } else {
            document.getElementById("errorname").innerHTML = "";
        }
    })

    var tr = document.getElementById("des");
    tr.addEventListener("input", (e) => {
        var name = e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errordes").innerHTML = "Name must only Contain letters.";
        } else {
            document.getElementById("errordes").innerHTML = "";
        }
    })
</script>