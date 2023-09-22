<?php

require_once('./connection/conection.php');
$priceData = [];
$GetDatePrice="SELECT * FROM `deadline_pricing` WHERE 1";
$runQuery=mysqli_query($conn,$GetDatePrice);

while ($fet=mysqli_fetch_assoc($runQuery)) {
  $priceData[$fet['deadline_date']]=(int)$fet['deadline_price'];
}
header('Content-Type: application/json');
 

  echo json_encode($priceData);

?>