<?php
include('./connection/conection.php');
// echo $user_id;
 $email = @$_SESSION['email'];
$userCheck = "SELECT * FROM `user` WHERE email='$email'";
$statusrun = mysqli_query($conn, $userCheck);
$fetch = mysqli_fetch_assoc($statusrun);
 $user_id = $fetch['id'];
// print_r($_SESSION);
// echo $_SESSION['post']['totalPrice'];
        $assignmentFile=$_SESSION['imgfiles'];
        $catagory=@$_SESSION['post']['type_of_work'];

    if ($catagory==3) {
        $academic_level='';
    }else{

        $academic_level=@$_SESSION['post']['academic_level'];
    }

        $type_of_paper=@$_SESSION['post']['type_of_paper'];
        $pageQty=@$_SESSION['post']['pages'];
        $deadline=@$_SESSION['post']['deadline'];
        $topic=@$_SESSION['post']['topic'];
        $paper_details=@$_SESSION['post']['paper_details'];
        $grammerly=@$_SESSION['post']['grammerly'];
        $copy_space=@$_SESSION['post']['copy_space'];
        $turnitins=@$_SESSION['post']['turnitins'];
        $totalPrice=@$_SESSION['post']['totalPrice'];
        $plagirism=@$_SESSION['post']['plagirism'];

$validFileerror;

if (isset($_POST['submits'])) {

        
        
        $orderInert="INSERT INTO `order`( `user_id`, `catagory`, `academic_level`
        , `paper_type`, `page_qty`, `deadline`, `topic`, `description`, `grammerly`, `copy_space`
        , `turnitin`, `assignment_image`,
         `total_price`,`plagirism`) VALUES
          ('$user_id','$catagory','$academic_level','$type_of_paper','$pageQty'
         ,'$deadline','$topic','$paper_details','$grammerly','$copy_space','$turnitins','$assignmentFile'
        ,'$totalPrice','$plagirism')";
        $orderInertrun=mysqli_query($conn,$orderInert);
         header('location:./profile.php');
     
}



// ===========================Fetch Prices Script
// $pricing = "SELECT * FROM `princing` WHERE 1";
// $pricingrun = mysqli_query($conn, $pricing);
// $fetchs = mysqli_fetch_assoc($pricingrun);
// print_r($fetchs);
?>


<!DOCTYPE html>
<html lang="en">



<body>
    <?php
    include_once('./header.php');
    ?>
    <div data-path="order" class="main-wrapper main-wrapper-banner">
        <section class="order-wrapper-container"></section>

        <div class="order-form-contai">
            <div class="order-form-container__background"></div>
            <div class="container">
                <div id="newdesign-order" class="form-wrap ">


                    <div class="loader_order_form " style="display: none;">
                        <div class="loader_order_form_inner" style="display: none;"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="order-title">Check and Confirm Order</h1>

                        </div>
                        <div class="col-12 text-center">
                            <div class="order-title-block">
                                <div class="order-title-t">
                                    Secure and confidential
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" id="_order_form" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="order-setep__wrapper">
                                <div id="order-form" class="order-form-pay">
                                    <div id="tab-1" class="tab-contents active-step">
                                        <div class="order-form-inner">






                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Selected Catagory :</h6>
                                                </div>
                                                <div>
                                                    <p>
                                                        <?php 
                                                    if ($catagory==1) {
                                                        echo "Academic writing";
                                                    }elseif ($catagory==2) {
                                                        echo "Editing & Proofreading";
                                                    }elseif ($catagory==3) {
                                                        echo "Content Writing";
                                                    }
                                                    
                                                    
                                                    ?></p>
                                                </div>
                                            </div>

                                            <?php
                                            if ($catagory==3) {
                                                
                                            }else{
                                                ?>
                                                <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Academic Level :</h6>
                                                </div>
                                                <div>
                                                   <p><?php 
                                                    if ($academic_level==1001) {
                                                        echo "High School";
                                                    }elseif ($academic_level==1002) {
                                                        echo "Undergraduate";
                                                    }elseif ($academic_level==1003) {
                                                        echo "Bachelor";
                                                    }elseif ($academic_level==1004) {
                                                        echo "Professional";
                                                    } ?>
                                                   </p>
                                                </div>
                                            </div>
                                                
                                                <?php
                                            }
                                            ?>
                                            
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Type Of Paper :</h6>
                                                </div>
                                                <div>
                                                   <p><?php echo $type_of_paper ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Page Quantity:</h6>
                                                </div>
                                                <div>
                                                   <p><?php echo $pageQty ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>DeadLine:</h6>
                                                </div>
                                                <div>
                                                   <p><?php echo $deadline ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Paper Topic:</h6>
                                                </div>
                                                <div>
                                                   <p><?php echo $topic ?></p>
                                                </div>
                                            </div>
                                            <!-- <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Description About Topic:</h6>
                                                </div>
                                                <div>
                                                   <p><?php echo $paper_details ?></p>
                                                </div>
                                            </div> -->
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Plagirism Report with  or without</h6>
                                                </div>
                                                <div>
                                                   <p><?php 
                                                   
                                                   if ($plagirism==1) {
                                                    echo $grammerly.",".$copy_space.", ".$turnitins;
                                                   }elseif ($plagirism==0) {
                                                   echo "Without Palgirism";
                                                   }
                                                   ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Choose File</h6>
                                                </div>
                                                <div>
                                                   <p> 
                                                    <img src="./assignmentimage/<?php echo $assignmentFile?>" alt="" width="100px" height="100px"> 
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between" style="border-top: 2px dashed grey; padding-top:20px;">
                                                <div>
                                                    <h6>Total Price</h6>
                                                </div>
                                                <div>
                                                   <p> 
                                                  $ <?php echo $totalPrice?>
                                                   </p> 
                                                </div>
                                            </div>

                                            <div id="form--quick" class="content__inner" style="display:block">

                                                <button type="submit" name="submits" class="btn btn-lg text-light" style="background:rgb(255, 114, 0) ; ">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="splitit-pay-disabled-modal" class="d-none d-sm-block d-md-none">
                        <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">Pay Later
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Unavailable until your last "Pay Later" payment is received</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Modal Recovery Password-->
                    <div class="recovery-passw-modal recovery-passw-custom modal fade" id="recovery-passw-modal" tabindex="-1" role="dialog" aria-labelledby="_recovery-passw-modal" aria-hidden="true">
                        <div class='modal-dialog'>
                            <div class="modal-content form-wrap">
                                <div class="modal-header">
                                    <h5 data-ph-tst="of-rcvr-mdl-ttl" class="modal-title" id="exampleModalLongTitle">
                                        Recovery password</h5>
                                    <small class="modal-hint">Enter your email and we’ll send the instruction.</small>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-extra" onclick="$('#form_send_rec_passw').submit();">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script src="public/js/file_upload/jquery.tmpl.js"></script>

                    <!-- The main application script -->
                    <script src="public/js/file_upload/file_upload5e1f.js?v=2"></script>


                    <script id='error-alert' type='text/x-jsmart-tmpl'>
                        <div error="{$error_id}" class='form-alert alert fade in'>{$text}</div>
                    </script>



                    <div id="hidden_auth_frame"></div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>