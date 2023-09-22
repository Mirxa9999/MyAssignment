<?php
// include('../connection/conection.php');
include('./include/header.php');
// include ('./include/sidebar.php');

?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>View All Order</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `user`";
                                    $run = mysqli_query($conn, $sql);
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                    ?>
                                        <tr>

                                            <td><?php echo $fet['first_name'] + $fet['last_name']; ?></td>
                                            <td><?php echo $fet['email']; ?></td>
                                            <td><?php

                                                if ($fet['active'] == 0) {
                                                ?>
                                                    <span class="badge bg-warning text-light">unactive</span>
                                                <?php
                                                } elseif ($fet['active'] == 0) {
                                                ?>
                                                    <span class="badge bg-success text-light">active</span>

                                                <?php
                                                }

                                                ?>
                                            </td>

                                            <td class="td">
                                                <a class="btn btn-primary" href="./orderUpdate.php?update_id=<?php echo $fet['order_id'] ?>">Delete</a>
                                                <a class="btn btn-primary" href="./orderUpdate.php?update_id=<?php echo $fet['order_id'] ?>">Edit</a>
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