<?php
$sql = "SELECT `screenshot_Id` FROM `screenshots` WHERE `screenshot_Date`= '".$fulldate."'";

$s1 = mysqli_query($con,$sql);
$ss1 = mysqli_fetch_assoc($s1);


?>