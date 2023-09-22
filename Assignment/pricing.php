<?php
include('../connection/conection.php');
    include ('./include/header.php');
    include ('./include/sidebar.php');

    if (isset($_POST['submit'])) {

        $academicWriting=$_POST['academicWriting'];
        $editProofread=$_POST['editProofread'];
        $contentWriting=$_POST['contentWriting'];
        $academichighSchool=$_POST['academic_highSchool'];
        $academicunderGraduate=$_POST['academic_underGraduate'];
        $academicbacholer=$_POST['academic_bacholer'];
        $academicprofessional=$_POST['academic_professional'];
        $proofreadhighSchool=$_POST['proofread_highSchool'];
        $proofreadunderGraduate=$_POST['proofread_underGraduate'];
        $proofreadbacholer=$_POST['proofread_bacholer'];
        $proofreadprofessional=$_POST['proofread_professional'];
        $grammerly=$_POST['grammerly'];
        $copySpace=$_POST['copySpace'];
        $turnitin=$_POST['turnitin'];

        $update_query="UPDATE `princing` SET `academicwriting_price`='$academicWriting',
        `proofreading_price`='$editProofread',`contentwriting_price`='$contentWriting',
        `proofreading_highschool_price`='$proofreadhighSchool',`proofreading_undergraduate_price`='$proofreadunderGraduate',
        `proofreading_bacholer_price`='$proofreadbacholer',`proofreading_professional_price`='$proofreadprofessional',
        `academicwriting_highschool_price`='$academichighSchool',`academicwriting_undergraduate_price`='$academicunderGraduate',
        `academicwrting_bachelor_price`='$academicbacholer',`academicwriting_professional_price`='$academicprofessional',
        `grammerly`='$grammerly',`copy_space`='$copySpace',`turnitin`='$turnitin' WHERE 1";
        $queryrun=mysqli_query($conn,$update_query);

    }


    $getquery="SELECT * FROM `princing` WHERE 1";
    $getrun=mysqli_query($conn,$getquery);
     $fet=mysqli_fetch_assoc($getrun);


?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    
                    <div class="card ">
                        <form id="myassignment" method="post">
                            <div class="card-header">
                                <h4>Manage Pricing</h4>
                            </div>
                            <div class="card-body">
                                
                                <div class=" col-lg-4 form-group mb-0 d-flex">
                                        <label>Academic  Writing</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['academicwriting_price']  ?>" id="" name="academicWriting" >
                                        <span id="errorstock"></span>
                                    </div>
                                

                                <hr>
                                    <h6>Academic Level</h6>
                                <div class="row">
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>High School</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['academicwriting_highschool_price']  ?>" id="" name="academic_highSchool" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Undergraduate</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['academicwriting_undergraduate_price']  ?>" id="" name="academic_underGraduate" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Bachelor</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['academicwrting_bachelor_price']  ?>" id="" name="academic_bacholer" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Professional</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['academicwriting_professional_price']  ?>" id="" name="academic_professional" >
                                        <span id="errorstock"></span>
                                    </div>
                                </div>

                                <div class="d-flex col-lg-4 form-group mb-0 mt-5">
                                        <label>Editing & Proofreading</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['proofreading_price']  ?>" id="" name="editProofread" >
                                        <span id="errorstock"></span>
                                    </div>
                                <h6 class="mt-4">Academic Level</h6>
                                <hr>
                                <div class="row">
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>High School</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['proofreading_highschool_price']  ?>" id="" name="proofread_highSchool" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Undergraduate</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['proofreading_undergraduate_price']  ?>" id="" name="proofread_underGraduate" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Bachelor</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['proofreading_bacholer_price']  ?>" id="" name="proofread_bacholer" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Professional</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['proofreading_professional_price']  ?>" id="" name="proofread_professional" >
                                        <span id="errorstock"></span>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class=" col-lg-4 form-group mb-0">
                                        <label>Content Writing</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['contentwriting_price']  ?>" id="" name="contentWriting" >
                                        <span id="errorstock"></span>
                                    </div>
                                </div>

                                <h6 class="mt-4">Plagirism Price</h6>
                                <hr>
                                <div class="row">
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Grammerly</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['grammerly']  ?>"  name="grammerly" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Cpoy Space</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['copy_space']  ?>"  name="copySpace" >
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-3 form-group mb-0">
                                        <label>Turnitin</label>
                                        <input type="number" class="form-control" value="<?php echo $fet['turnitin']  ?>"  name="turnitin" >
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