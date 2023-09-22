<?php
include('../connection/conection.php');
include('./include/header.php');



echo $update_id = $_GET['update_id'];
$getPaperType = "SELECT * FROM `type_of_paper` WHERE type_id= '$update_id'";
$getPaperTypeRun = mysqli_query($conn, $getPaperType);
$fet = mysqli_fetch_assoc($getPaperTypeRun);
if (isset($_POST['submit'])) {

    $activeStatus=0;
    if ($_POST['active']==1) {
        $activeStatus=1;
    }
    $typeofpaper = $_POST['typePaper'];




    $userInsert = "UPDATE `type_of_paper` SET `type_of_paper`='$typeofpaper',`active_status`='$activeStatus' WHERE type_id ='$update_id' ";
    $userInsertRun = mysqli_query($conn, $userInsert);
if ($userInsertRun) {
    # code...
    header("location:./typePaperGrid.php");
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

                            <div class="card-body">

                                <h6>Update Type Paper</h6>
                                <hr>
                                <div class="row">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Type Of Paper</label>
                                        <input type="text" class="form-control" value="<?php echo  $fet['type_of_paper'] ?>" name="typePaper" required>

                                    </div>
                                    <div class="row mt-4">
                                        
                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Active</label>
                                            <?php
                                            if ($fet['active_status'] == 1) {
                                            ?>
                                                <input type="checkbox" name="active" value="1" checked>

                                            <?php
                                            } elseif ($fet['active_status'] == 0) {
                                            ?>
                                                <input type="checkbox" name="active" value="1">
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit" value="Update" name="submit" />
                            </div>
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