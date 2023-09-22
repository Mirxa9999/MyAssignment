<?php
    include('../include/conn.php');
    $add_assign=mysqli_real_escape_string($conn,$_POST['add_assign']);
    $a_dead_line=mysqli_real_escape_string($conn,$_POST['a_dead_line']);
    $a_word=mysqli_real_escape_string($conn,$_POST['a_word']);
    $des=mysqli_real_escape_string($conn,$_POST['des']);
    $a_budget=mysqli_real_escape_string($conn,$_POST['a_budget']);
    $date=date("y-m-d");

    $spic=$_FILES['spic']['name'];
    $p=array();
foreach($spic as $val){
   $exe=strtolower(pathinfo($val,PATHINFO_EXTENSION));
   $arr=array("png","jpeg","jpg");
   if(in_array($exe,$arr)){
       $p[]=$val;
       $msg1="right";
   }else{
       $msg1="notright";
       break;
   }
}
if(@$msg1=="right"){
   foreach($spic as $key=>$val ){  
   move_uploaded_file($_FILES['spic']['tmp_name'][$key],"../imgs/".$val);
   }
}
   $pic=implode(",",$p);
    if(@$msg1=="right"){
        $sql="INSERT INTO `assign`(`add_assign`,`a_dead_line`,`a_word`,`des`,`a_budget`,`date`,`spic`)
         VALUES ('$add_assign','$a_dead_line','$a_word','$des','$a_budget','$date','$pic')";
        $run=mysqli_query($conn,$sql);
        if($run){
            // echo "Data has been inserted";
            echo 1;
        }else{
            // echo "Data not been inserted";
            echo 2;
        }
    }else{
        echo 3;
        // echo "img is not right";
    }
?>