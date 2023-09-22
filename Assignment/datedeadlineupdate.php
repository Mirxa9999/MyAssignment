<?php
    // include('../connection/conection.php');
    include('./include/conn.php');
    include('./include/header.php');
    include('./include/sidebar.php');
    $uid=$_GET['uid'];
    $gsql="SELECT * FROM `deadline_pricing` WHERE `deadline_id`='$uid'";
    $grun=mysqli_query($conn,$gsql);
    $gfet=mysqli_fetch_array($grun);
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card ">
                        <form id="mydeadline">
                            <div class="card-header">
                                <h4>Manage DeadLIne Pricing</h4>
                            </div>
                            
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="deadline_id" value="<?php echo $gfet ['deadline_id'] ?>"
                                        required>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Choose Date</label>
                                        <input type="date" value="<?php echo $gfet ['deadline_date'] ?>" class="form-control"  id="" name="deadline_date" required >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Set Date Price</label>
                                        <input type="number" value="<?php echo $gfet ['deadline_price'] ?>" class="form-control"  id="" name="deadline_price" required >
                                        <span id="errorstock"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit"
                                    name="Update"  value="Update" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include ('./include/footer.php');
?>

<script>
$(document).ready(function() {
    $(".btn").on("click", function(e) {
        // alert("run");
        e.preventDefault();
        let mydata = new FormData(mydeadline);

        $.ajax({
            url: "./files/deadline_update.php",
            method: "POST",
            data: mydata,
            contentType: false,
            processData: false,
            success: function(res) {
                //  alert(res);
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
                        title: 'Date & Price Has Been Updated successfully'
                    })
                    // alert("DATA HAS BEEN UPDATED");
                    window.location.href = "../Assignment/datedeadlineGrid.php";
                } else {
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
                        icon: 'error',
                        title: 'Date & Price Has Been Not Updated'
                    })
                    // alert("DATA HAS BEEN NOT UPDATED");
                }
            }
        });
    });
});
</script>

<script src="../Assignment/assets/js/sweetalert2.all.min.js"></script>
