<?php
		$sql = "SELECT count(*) as nbr FROM `account` WHERE `account_phoneNumber`='".$phoneNumberPlus."'";
        $rs1 = mysqli_query($con,$sql);
        $res4 = mysqli_fetch_assoc($rs1);
?>