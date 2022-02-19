<?php
	$sql1 ="UPDATE `account` SET `account_password`='".$newHash."' WHERE `account_email` = '".$email."'";	
	$yy = mysqli_query($con,$sql1);
?>