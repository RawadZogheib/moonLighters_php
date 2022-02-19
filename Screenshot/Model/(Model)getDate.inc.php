<?php
$sql = "SELECT `screenshot_Date` FROM `screenshots` WHERE `contrat_Id`= '".$contrat_Id."'";

$d1 = mysqli_query($con,$sql);


?>