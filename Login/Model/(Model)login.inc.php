<?php
	$sql = "SELECT count(*)as nbr, `account_password` as hashedPassword,`account_Id` as account_Id FROM `account` 
			WHERE  `account_email` = '".$email."'";
	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);
	

//	(Model)passwordGet.inc.php
// 	<?php
// 	$sql1 ="SELECT `password` as hashedPassword FROM `account` WHERE `email` = '".$email."'";	
// 	$xx = mysqli_query($con,$sql1);
//     $res = mysqli_fetch_assoc($xx);
//
?>