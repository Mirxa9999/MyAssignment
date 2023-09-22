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
                            <h4>Type Of Paper</h4>
                            <a href="./typePaperCreate.php"><button class="btn btn-success" style="border-radius: 2px;">Add Type of Paper</button></a>
                        </div>

                        <div class="table-responsive px-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Type of Paper</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `type_of_paper` WHERE 1";
                                    $run = mysqli_query($conn, $sql);
                                    while ($fet = mysqli_fetch_assoc($run)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fet['type_of_paper']; ?></td>
                                            <td><?php echo $fet['paper_price']; ?></td>
                                            <td><?php

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
                                            </td>

                                            <td class="td">
                                                <a class="btn btn-danger" href="./typePaperDelete.php?delete_id=<?php echo $fet['type_id'] ?>">Delete</a>
                                                <a class="btn btn-primary" href="./typePaperUpdate.php?update_id=<?php echo $fet['type_id'] ?>">Edit</a>
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

