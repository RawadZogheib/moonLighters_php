<?php
	$location="./projects/".$contrat_Id."/".$project_name.".".$code_TpProject."";
	$sql = "INSERT INTO `project`(`project_Id`, `contrat_Id`, `project_name`, `project_description`, `code_TpProject`,`project_location`,`project_active`)
            VALUES (NULL,'".$contrat_Id."','".$project_name."','".$project_description."','".$code_TpProject."','".$location."',1)";

	$xx = mysqli_query($con,$sql);

?>