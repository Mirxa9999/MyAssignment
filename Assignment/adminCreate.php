<?php
include('../connection/conection.php');
include('./include/header.php');

$existmsg;

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];


    $checkEmailExist = "SELECT * FROM `user` WHERE email = '$email'";
    $checkrun = mysqli_query($conn, $checkEmailExist);
    if (mysqli_num_rows($checkrun) > 0) {
        $existmsg = "Admin is Already Exist";
    } else {
        $userInsert = "INSERT INTO `user`( `first_name`, `last_name`, `email`, `passwords`, `status`,  `active`)
         VALUES ('$firstName','$last_name','$email','$password','$status','1')";
        $userInsertRun = mysqli_query($conn, $userInsert);
        if ($userInsertRun) {
            header("location:./adminGrid.php");
        }
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
                                        <input type="text" class="form-control" name="first_name" required>
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name">
                                        <span id="errorstock"></span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                        <span id="errorstock"></span>
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Status</label>
                                        <select id="inputState" class="form-select form-control" name="status" required>
                                            <option value="1">Super Admin</option>
                                            <option value="3">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit" value="Create" name="submit" />
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