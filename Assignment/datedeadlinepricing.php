<?php
include('../connection/conection.php');
    include ('./include/header.php');
    $error='';
    $success='';
    if (isset($_POST['submit'])) {
    $date= $_POST['date'];
    $dateprice= $_POST['price'];
    $checkdate="SELECT * FROM `deadline_pricing` WHERE deadline_date='$date'";
    $checkquery=mysqli_query($conn,$checkdate);
    if (mysqli_num_rows($checkquery)>0) {
        echo $error="date is alerady exist choose other date";
    }else{
    if ($_POST['date']<date('Y-m-d')) {
        $error= "don't choose the past date";
    }else{
        $insertquery="INSERT INTO `deadline_pricing`( `deadline_date`, `deadline_price`) VALUES ('$date','$dateprice')";
        $query_run=mysqli_query($conn,$insertquery);
        if ($query_run) {
            header("location:./datedeadlineGrid.php");
        }
    }
}

}

    include ('./include/sidebar.php');
?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card ">
                        <a href="./datedeadlineGrid.php"><button type="btn" class="btn btn-primary mt-3"
                                    style="margin-left:90%;">
                                    View Deadline</button></a>
                        <form id="myassignment" method="post">
                            <div class="card-header">
                                <h4>Manage DeadLIne Pricing</h4>
                            </div>
                            
                            <div class="card-body">
                            <div class="row">
                                <?php
                                if($error){
                                    ?>
                                    
                                <div class="alert  alert-danger text-capitalize" role="alert">
                              <?php echo  $error ?>
                                </div>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($success) {
                                    ?>
                                    <div class="alert  text-capitalize" role="alert" style="background:rgba(16, 253, 16, 0.7);">
                                            <?php echo  $success ?>
                                    </div>
                                    
                                    <?php
                                }
                                
                                ?>

                            </div>
                                <div class="row">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Choose Date</label>
                                        <input type="date" class="form-control"  id="" name="date" required >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Set Date Price</label>
                                        <input type="number" class="form-control"  id="" name="price" required >
                                        <span id="errorstock"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" type="submit"
                                    name="submit"   />
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
                // alert(res);
                if (res == 1){
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
                        title: 'Date And Price Has Been Inserted successfully'
                    })
                    // alert("CATEGORY HAS BEEN INSERTED");
                    $('#myassignment').trigger('reset');
                } else if(res == 2) {
                    alert("Assignment HAS BEEN NOT INSERTED");
                } else {
                    alert ("Img is not right")
                }
            }
        });
    });
});
</script>

<!--================== form validation ==================-->

<script>
   

    var tr=document.getElementById("name");
        tr.addEventListener("input",(e)=>{
        var name=e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errorname").innerHTML="Name must only Contain letters.";
        }else{
            document.getElementById("errorname").innerHTML="";
        }
    })

    var tr=document.getElementById("des");
        tr.addEventListener("input",(e)=>{
        var name=e.target.value;
        if (!name.match(/^[A-Za-z ]*$/)) {
            document.getElementById("errordes").innerHTML="Name must only Contain letters.";
        }else{
            document.getElementById("errordes").innerHTML="";
        }
    })


</script>

<script src="../Assignment/assets/js/sweetalert2.all.min.js"></script>
