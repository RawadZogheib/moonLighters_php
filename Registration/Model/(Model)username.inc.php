<?php

	$sql = "SELECT count(*) as nbr FROM `account` WHERE `account_userName`='".$userName."'";
	$s1 = mysqli_query($con,$sql);
	$res3 = mysqli_fetch_assoc($s1);


?>