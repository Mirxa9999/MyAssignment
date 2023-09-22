<?php
include('./connection/conection.php');

$email = @$_SESSION['email'];
$userCheck = "SELECT * FROM `user` WHERE email='$email'";
$statusrun = mysqli_query($conn, $userCheck);
$fetch = mysqli_fetch_assoc($statusrun);
$user_id = $fetch['id'];

?>


<!DOCTYPE html>
<html lang="en">



<body style="background-color: #f7f7f7;">
    <?php
    include_once('./header.php');
    ?>
   
    <div class="container" style="padding-top: 200px;">
    <h1 class="text-center text-uppercase mb-5" style="font-style:underline;">our order history</h1>

    <table class=" table  ">
                    <thead class="table-thead thead-dark">
                                                                    <tr>
                                                                        <th scope="col">Catagory</th>
                                                                        <th scope="col">Academic Level</th>
                                                                        <th scope="col">Type Of Paper</th>
                                                                        <th scope="col">Deadline</th>
                                                                        <th scope="col">Pages</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">File PDF</th>
                                                                        <th scope="col">File PNG</th>
                                                                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        $getOrder = "SELECT * FROM `order` WHERE user_id = $user_id";
                        $getOrderrun = mysqli_query($conn, $getOrder);

                        while ($fet = mysqli_fetch_assoc($getOrderrun)) {
                        ?>

                            <tr style="border-style:none;">

                                <td>
                                    <?php
                                    if ($fet['catagory'] == 1) {
                                        echo "Academic writing";
                                    } elseif ($fet['catagory'] == 2) {
                                        echo "Editing & Proofreading";
                                    } elseif ($fet['catagory'] == 3) {
                                        echo "Content Writing";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($fet['academic_level'] == 1001) {
                                        echo "High School";
                                    } elseif ($fet['academic_level'] == 1002) {
                                        echo "Undergraduate";
                                    } elseif ($fet['academic_level'] == 1003) {
                                        echo "Bachelor";
                                    } elseif ($fet['academic_level'] == 1004) {
                                        echo "Professional";
                                    }

                                    ?>
                                </td>
                                <td><?php echo $fet['paper_type'] ?></td>
                                <td><?php echo $fet['deadline'] ?></td>
                                <td><?php echo $fet['page_qty'] ?></td>
                                <td>
                                    <?php
                                    if ($fet['order_status'] == 0) {
                                    ?>
                                        <span class="badge bg-warning text-light">Pending</span>
                                    <?php
                                    } elseif ($fet['order_status'] == 1) {
                                    ?>
                                        <span class="badge  text-light" style="background-color:lightgreen;">Completed</span>
                                    <?php
                                    } elseif ($fet['order_status'] == 2) {
                                    ?>
                                        <span class="badge text-light" style="background-color:lightcoral;">Cancelled</span>
                                    <?php
                                    }

                                    ?>
                                </td>

                                <td class="d-flex justify-content-center pt-4">
                                    <?php
                                    if ($fet['admin_upload_File_pdf']) {
                                        $allPDF=explode(',',$fet['admin_upload_File_pdf']);
                                    foreach ($allPDF as $keyPDF => $PDFvalue) {
                                        
                                    ?>
                                        <a  target="_blank" class="mx-3" href="./Assignment/assignmentPDFFile/<?php echo  $PDFvalue ?>" style="text-decoration:none;" ><i class="fa-solid fa-file-pdf  text-success" style="font-size: 20px;"></i></a>
                                    <?php
                                    }
                                }

                                    ?>
                                </td>
                                <td>
                                    <?php
                                  if ($fet['admin_upload_File_png']) {
                                    $allPNG = explode(',', $fet['admin_upload_File_png']);
                                    foreach ($allPNG as $keyPNG => $valuePNG) {
                                        // echo "keyPNG: " . $keyPNG . ", valuePNG: " . $valuePNG . "<br>";
                                        
                                            ?>
                                            <img src="./Assignment/assignmentPNGFile/<?php echo $valuePNG ?>" alt="not Work" width="80px" height="80px">
                                            <?php
                                        
                                    }
                                }
                                    ?>

                                </td>
                            </tr>

                        <?php
                        }
                        ?>




                    </tbody>
            </table>
    </div>



    <script src="./index.js"></script>
    <!-- Check It Up Script -->
    <script defer src="assets/dist/main.min.js"></script>
    
    <script type="text/javascript" src="public/order_form2/js/ajaxd46f.js?v=1.2.4"></script>
    <script type="text/javascript" src="public/order_form2/js/jquery.validate.js"></script>
    <script src="assets/dist/modal/jQueryRotate.js"></script>
    <script>
     
    </script>


    <script>
        dataLayer = [{
            'pageType': 'Checkout',
            'userType': 'New',
            'Abtest': 'Old'
        }];
    </script>

</body>

</html>