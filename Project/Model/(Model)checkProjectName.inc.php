<?php
	$sql = "SELECT count(*) as nbr FROM `project` WHERE `project_name`= '".$project_name."' AND `contrat_Id`='".$contrat_Id."' AND  `code_TpProject`='".$code_TpProject."'";
	$rr = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($rr);




?>