<?php
    include('../connection/conection.php');
    include('./include/header.php');
    include('./include/sidebar.php');
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
                            <h4>Dead Line Pricing</h4>
                            <a href="./datedeadlinepricing.php"><button class="btn btn-success" style="border-radius: 2px;">Add Date with Price</button></a>
                        </div>

                        <div class="table-responsive px-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `deadline_pricing` WHERE 1";
                                    $run = mysqli_query($conn, $sql);
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fet['deadline_date']; ?></td>
                                            <td><?php echo $fet['deadline_price']; ?></td>
                                            <!-- <td><?php

                                                if ($fet['active_status'] == 0) {
                                                ?>
                                                    <span class="badge bg-warning text-light">unactive</span>
                                                <?php
                                                } elseif ($fet['active_status'] == 1) {
                                                ?>
                                                    <span class="badge bg-success text-light">active</span>

                                                <?php
                                                }

                                                ?>
                                            </td> -->

                                            <td class="td">

                                                <button type="button" class="btn btn-danger delete"
                                                    data-del="<?php echo $fet['deadline_id'] ?>">Delete</button>
                                                <a class="btn btn-primary"
                                                    href="./datedeadlineupdate.php?uid=<?php echo $fet['deadline_id'] ?>">Update</a>
                                            
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
        $(document).on("click", ".delete", function() {
            var del = $(this).data("del");
            // alert(del);
            var msg = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "./files/deadline_del.php",
                        method: "GET",
                        data: {
                            mydel: del
                        },
                        success: function(res) {
                        // alert(res);
                        if (res == 3) {
                            const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer)
                                        toast.addEventListener('mouseleave',
                                        Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Dead & Price Has Been Deleted'
                                })
                                $(msg).closest("tr").fadeOut();
                            } else {
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'error',
                                title: 'Date & Price HAS NOT BEEN DELETED'
                            })
                                // alert("Deadline HAS NOT BEEN DELETED");
                            }
                        }
                    })
                }
            })
        })
    })
</script>
<!--================== form validation ==================-->
<script src="../Assignment/assets/js/sweetalert2.all.min.js"></script>

