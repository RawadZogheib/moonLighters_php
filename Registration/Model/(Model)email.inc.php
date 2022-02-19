<?php
	$sql = "SELECT count(*) as nbr FROM `account` WHERE `account_email`='".$email."'";
	$rr = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($rr);




?>