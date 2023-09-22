<?php
include('../connection/conection.php');
include('./include/header.php');


if (isset($_POST['submit'])) {
    $typeofpaper=$_POST['typePaper'];
    $paperPrice=$_POST['paperPrice'];
    $papertype=$_POST['papertype'];


    
    
    
    $userInsert="INSERT INTO `type_of_paper`( `type_of_paper`,`paper_price`, `active_status`,`paper_type`) 
        VALUES ('$typeofpaper','$paperPrice','1','$papertype')";
         $userInsertRun=mysqli_query($conn,$userInsert);
         
         
         header("location:./typePaperGrid.php");
         
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
                                <h4>Admin &nbsp;  <span class="text-danger"><?php echo @$existmsg?></span></h4>
                            </div>
                            <div class="card-body">

                                <h6>Create Admin</h6>
                                <hr>
                                <div class="row">
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Type Of Paper</label>
                                        <input type="text" class="form-control"   name="typePaper" required>
                                        <span id="errorstock"></span>
                                    </div>
                                    <div class=" col-lg-6 form-group mb-0">
                                        <label>Paper Price</label>
                                        <input type="number" class="form-control"   name="paperPrice" required>
                                        <span id="errorstock"></span>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Select Catagory</label>
                                        <select id="inputState" class="form-select form-control" name="papertype" required>
                                           
                                            <option value="0">Academic Writing</option>
                                            <option value="1">Editing &  Proofreading</option>
                                            <option value="2">Content Writing</option>
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

