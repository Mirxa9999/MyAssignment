<?php
include('./connection/conection.php');
if (@$_POST['content']=='content') {
    $gettypeofpaper = "SELECT * FROM `type_of_paper` WHERE `paper_type`=2";
            $gettypeofpaperRun = mysqli_query($conn, $gettypeofpaper);

            echo "<option >Select Type </option>";
            while ($fetchss = mysqli_fetch_assoc($gettypeofpaperRun)) {
                                           
                  ?>
                  
                  <option  value="<?php echo $fetchss['type_of_paper'] ."/".  $fetchss['paper_price'] ?>" ><?php echo $fetchss['type_of_paper'] ?></option> 
                  
                  <?php
                                                         
           }
           echo "<option >Other </option>";
}

else{

  $gettypeofpaper = "SELECT * FROM `type_of_paper` WHERE `paper_type`=1 OR `paper_type`=0";
            $gettypeofpaperRun = mysqli_query($conn, $gettypeofpaper);

            echo "<option>Select Type </option>";
            while ($fetchss = mysqli_fetch_assoc($gettypeofpaperRun)) {
                                           
                  ?>
                  
                  <option  value="<?php echo $fetchss['type_of_paper'] ."/".  $fetchss['paper_price'] ?>" ><?php echo $fetchss['type_of_paper'] ?></option> 
                  
                  <?php
                                                         
           }
           echo "<option >Other </option>";
}

 ?>