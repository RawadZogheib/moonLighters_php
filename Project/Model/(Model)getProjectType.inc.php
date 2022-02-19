<?php
$sql2 = "SELECT `desc_TpProject` as desc_TpProject

FROM `type_project` 
WHERE `code_TpProject` = '".$res["code_TpProject"]."'";	
$xx2 = mysqli_query($con,$sql2);
$res2 = mysqli_fetch_assoc($xx2);
?>