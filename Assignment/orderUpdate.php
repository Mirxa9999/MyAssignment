<?php
require_once('../connection/conection.php');
require_once('./include/header.php');
// includ('../connection/conection.php');

// =========================================Delete PDG image Script=========================================



    $catagory;
    $academiclevel;
    $update_id = $_GET['update_id'];


    $getorder="SELECT * FROM `order` WHERE order_id = '$update_id'";
    $getorderrun=mysqli_query($conn,$getorder);
    $fetch=mysqli_fetch_assoc($getorderrun);
    // print_r($fetch);

// ===============================This Query To Delete the Specfic  PNGimage Inthe database===============================

    if (isset($_POST['deleteimage'])) {
      $deleteIndex=$_POST['deleteimage'];
        $fetchPNG=explode(',',$fetch['admin_upload_File_png']);
        array_splice($fetchPNG, $deleteIndex, 1);
        
       
            $fetchPNG1=implode(',',$fetchPNG);
            $update_order="UPDATE `order` SET `admin_upload_File_png`='$fetchPNG1' WHERE  order_id ='$update_id'";
        $updateOrderRun=mysqli_query($conn,$update_order);
    }

    // ===============================This Query To Delete the Specfic PDF Inthe database===============================

    if (isset($_POST['deletePDF'])) {
        $deleteIndex=$_POST['deletePDF'];
        $fetchPDF=explode(',',$fetch['admin_upload_File_pdf']);
        array_splice($fetchPDF, $deleteIndex, 1);
            $fetchPDF1=implode(',',$fetchPDF);
            $update_order="UPDATE `order` SET `admin_upload_File_pdf`='$fetchPDF1' WHERE  order_id ='$update_id'";
        $updateOrderRun=mysqli_query($conn,$update_order);
    }

    if ($fetch['catagory'] == 1) {
        $catagory= "Academic writing";
    } elseif ($fetch['catagory'] == 2) {
        $catagory= "Editing & Proofreading";
    } elseif ($fetch['catagory'] == 3) {
        $catagory = "Content Writing";
    }

    if ($fetch['academic_level'] == 1001) {
        $academiclevel= "High School";
    } elseif ($fetch['academic_level'] == 1002) {
        $academiclevel= "Undergraduate";
    } elseif ($fetch['academic_level'] == 1003) {
        $academiclevel= "Bachelor";
    } elseif ($fetch['academic_level'] == 1004) {
        $academiclevel= "Professional";
    }


    if (isset($_POST['submit'])) {
        // echo "data has been updated";
        
        $order_status=$_POST['status'];

        //========================= THis Script is to upload Multiple PDFS With Custom Extentions=========================
        if (!$_FILES['imagewithpdf']['name'][0]=="") {
            echo "dhfuifdhg";
            $allPDf=[];

        // ===================================This Condition Get the Previous PDF file and attach into the new Files ======================

            if ($fetch['admin_upload_File_pdf']) {
                $fetchPfdFromDatabase=explode(',',$fetch['admin_upload_File_pdf']);
                foreach ($fetchPfdFromDatabase as $key => $fetchPfdFromDatabase1) {
                    array_push($allPDf,$fetchPfdFromDatabase1);
                }
              }
            
            // ================================  this condition to get the new PDF file and push into the array================================
            foreach ($_FILES['imagewithpdf']['name'] as $keyPDF => $valuePDF) {
                $tempPDF = explode(".", $valuePDF);
                 $newfilenamePDF = rand(1000000000,9999999999) . '.' . end($tempPDF); 
                 move_uploaded_file($_FILES['imagewithpdf']['tmp_name'][$keyPDF], "./assignmentPDFFile/" . $newfilenamePDF);
                 array_push($allPDf,$newfilenamePDF);
            }
            // print_r($allPDf);
            $insertThisPDF= implode(",",$allPDf);

            //=========================== This Is Order Update Query for Pdf===========================
            $update_order="UPDATE `order` SET `admin_upload_File_pdf`='$insertThisPDF'
        ,`order_status`='$order_status' WHERE  order_id ='$update_id'";
        $updateOrderRun=mysqli_query($conn,$update_order);
            
        }
        //========================= THis Script is to upload Multiple Images With Custom Extentions=========================
        
        if (!$_FILES['imagewithpng']['name'][0]=="") {
            $allPNG=[];

            // ===================================This Condition Get the Previous PNG file and attach into the new Files ======================

            if ($fetch['admin_upload_File_png']) {
                $fetchPNGFromDatabase=explode(',',$fetch['admin_upload_File_png']);
                foreach ($fetchPNGFromDatabase as $key => $fetchPNGFromDatabase1) {
                    array_push($allPNG,$fetchPNGFromDatabase1);
                }
              }

            // ================================  this condition to get the new PNG file and push into the array================================

            foreach ($_FILES['imagewithpng']['name'] as $keyPNG => $valuePNG) {
                $tempPNG = explode(".", $valuePNG);
                 $newfilenamePNG = rand(1000000000,9999999999) . '.' . end($tempPNG); 
                 move_uploaded_file($_FILES['imagewithpng']['tmp_name'][$keyPNG], "./assignmentPNGFile/" . $newfilenamePNG);
                 array_push($allPNG,$newfilenamePNG);
                
            }
            $insertThisPNG= implode(",",$allPNG);

            //=========================== This Is Order Update Query for PNG===========================

            $update_order="UPDATE `order` SET `admin_upload_File_png`='$insertThisPNG',`order_status`='$order_status' WHERE  order_id ='$update_id'";
            $updateOrderRun=mysqli_query($conn,$update_order);
        }


        
            $update_order="UPDATE `order` SET `order_status`='$order_status' WHERE  order_id ='$update_id'";
            $updateOrderRun=mysqli_query($conn,$update_order);
            header('location:./orderGrid.php');
        
       
    }
    require_once('./include/sidebar.php');

?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="card ">
                        <form id="myassignment" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4>Update Order</h4>
                            </div>
                            <div class="card-body">
                                <!-- <?php
                                
            // print_r($allPDf);
                                ?> -->
                                <h6>Order Update</h6>
                                <hr>
                                <div class="row">
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>Catagory</label>
                                        <input type="text" class="form-control" value="<?php echo $catagory ?>"
                                            disabled />
                                    </div>
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>Academic Level</label>
                                        <input type="text" class="form-control" value="<?php echo $academiclevel  ?>"
                                            disabled />
                                    </div>
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>Type Of Paper</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $fetch['paper_type']  ?>" disabled />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>Page Quantity</label>
                                        <input type="number" class="form-control"
                                            value="<?php echo $fetch['page_qty']  ?>" disabled />
                                    </div>
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>DeadLine</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $fetch['deadline']  ?>" disabled />
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>Topic</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['topic']  ?>"
                                            disabled />
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-12 form-group mb-0">
                                        <label>Description</label>
                                        <textarea class="form-control" cols="30" rows="10"
                                            disabled> <?php echo $fetch['description']?></textarea>
                                        <span id="errorstock"></span>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Total Payment</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $fetch['total_price']  ?>" disabled>
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Remaining Taypemt</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $fetch['remaining_price']  ?>" disabled>
                                        <span id="errorstock"></span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class=" col-lg-12 form-group mb-0">
                                        <label>Upload Image With Png</label>
                                        <input type="file" class="form-control" name="imagewithpng[]" multiple>
                                        <span class="text-danger text-capitalize">Choose Only PNG,JPG,JPEG file</span>
                                        <span id="errorstock"></span>
                                    </div>


                                    <?php
                                        
                                        $showPNGImages=explode(',',$fetch['admin_upload_File_png']);
                                        if (!$fetch['admin_upload_File_png']=="") {
                                    
                                    foreach ($showPNGImages as $showPNGkey => $showPNGImages1) {
                                        ?>

                                    <div class="choosen_png_file"
                                        style="border:1px dashed gray; border-radius:5px; margin-left:20px; padding:10px 10px 0px 10px;">
                                        <button name="deleteimage" value="<?php echo $showPNGkey ?>" class="float-right"
                                            style="border-radius:50%; color:white; background:black; outline:none; border:none;">x</button>
                                        <br>
                                        <img src="./assignmentPNGFile/<?php echo $showPNGImages1?>" alt="not Work"
                                            width="100px" height="100px" style="margin:10px;">
                                    </div>

                                    <?php
                                    }
                                }

                                    ?>
                                    <div class=" col-lg-12 form-group mb-0">
                                        <label>Upload With Pdf</label>
                                        <input type="file" class="form-control" name="imagewithpdf[]" multiple>
                                        <span class="text-danger text-capitalize">Choose Only PDF file</span>
                                        <span id="errorstock"></span>
                                    </div>


                                    <?php
                                     $showPDFImages=explode(',',$fetch['admin_upload_File_pdf']);

                                     if ($fetch['admin_upload_File_pdf']) {
                                        foreach ($showPDFImages as $showPDFkey => $showPDFFiles1) {
                                            ?>
                                    <div class="choosen_png_file"
                                        style="border:1px dashed gray; border-radius:5px; margin-left:20px; padding:10px 10px 0px 10px;">
                                        <button name="deletePDF" value="<?php echo $showPDFkey ?>" class="float-right"
                                            style="border-radius:50%; color:white; background:black; margin-bottom:20px; outline:none; border:none;">x</button>
                                        <br>
                                        <a href="./assignmentPDFFile/<?php echo $showPDFFiles1 ?>" target="_blank"><i
                                                class="fa-solid fa-file-pdf  text-success"
                                                style="font-size: 20px;"></i></a>
                                    </div>
                                    <?php
                                        }
                                     }
                                    ?>

                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Status</label>
                                        <select id="inputState" class="form-select form-control" name="status">
                                            <option value="<?php echo $fetch['order_status']?>" selected><?php
                                            if ($fetch['order_status']==0) {
                                                echo "Pending";
                                            }elseif ($fetch['order_status']==1) {
                                                echo "Completed";

                                            }elseif ($fetch['order_status']==2) {
                                                echo "Cancelled";

                                            }                                             
                                             ?></option>
                                            <option value="0">Pending</option>
                                            <option value="1">Completed</option>
                                            <option value="2">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 10px; margin-top:40px;">

                                    <img src="../assignmentimage/<?php echo $fetch['assignment_image']?>" alt=""
                                        width="100px" height="100px">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input class="btn btn-primary" value="Update" type="submit" name="submit" />
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