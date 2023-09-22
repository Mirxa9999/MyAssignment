<?php
include('../connection/conection.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');

    $user_id=$_GET['user_id'];
    $getUser="SELECT * FROM `user` WHERE id= '$user_id'";
    $getUserRun=mysqli_query($conn,$getUser);
    $fet =mysqli_fetch_assoc($getUserRun);


?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>View All Order </h4>
                            <h4><?php echo $fet['first_name'] . $fet['last_name'] ?> </h4>
                        </div>
                        
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Order Catagory</th>
                                            <th>Academic Details</th>
                                            <th>Pages (250 words 1 Page)</th>
                                            <th>Type of Paper</th>
                                            <th>DeadLine</th>
                                            <th>Topic</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `order` WHERE user_id = '$user_id'";
                                        $run = mysqli_query($conn, $sql);
                                        while ($fet = mysqli_fetch_assoc($run)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <img src="../assignmentimage/<?php echo $fet['assignment_image'] ?>" alt="not Work" width="100px" height="100px">

                                                </td>
                                                <td><?php
                                                if ($fet['catagory'] == 1) {
                                                    echo "Academic writing";
                                                } elseif ($fet['catagory'] == 2) {
                                                    echo "Editing & Proofreading";
                                                } elseif ($fet['catagory'] == 3) {
                                                    echo "Content Writing";
                                                }
                                                ?></td>
                                                <td><?php
                                                if ($fet['academic_level'] == 1001) {
                                                    echo "High School";
                                                } elseif ($fet['academic_level'] == 1002) {
                                                    echo "Undergraduate";
                                                } elseif ($fet['academic_level'] == 1003) {
                                                    echo "Bachelor";
                                                } elseif ($fet['academic_level'] == 1004) {
                                                    echo "Professional";
                                                }

                                                ?></td>
                                                <td><?php echo $fet['page_qty']; ?></td>
                                                <td><?php echo $fet['paper_type']; ?></td>
                                                <td><?php echo $fet['deadline']; ?></td>
                                                <td><?php echo $fet['topic']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($fet['order_status'] == 0) {
                                                    ?>
                                                        <span class="badge bg-warning text-light">Pending</span>
                                                    <?php
                                                    } elseif ($fet['order_status'] == 1) {
                                                    ?>
                                                        <span class="badge bg-success text-light">Completed</span>
                                                    <?php
                                                    } elseif ($fet['order_status'] == 2) {
                                                    ?>
                                                        <span class="badge bg-danger text-light">Cancelled</span>
                                                    <?php
                                                    }

                                                    ?>
                                                </td>
                                                    <!-- <td class="td">
                                                    <a class="btn btn-primary" href="./orderUpdate.php?update_id=<?php echo $fet['order_id'] ?>">Edit</a>
                                                </td> -->
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
                alert(res);
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
                        title: 'Assignment Has Been Inserted successfully'
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