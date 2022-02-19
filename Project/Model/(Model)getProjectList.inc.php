<?php
	$sql = "SELECT `project_Id` as project_Id,
                   `project_name` as project_name,
                   `project_description` as project_description,
                   `code_TpProject` as code_TpProject

    FROM `project` 
    WHERE `contrat_Id` = '".$contrat_Id."'";

	$xx = mysqli_query($con,$sql);

?>

