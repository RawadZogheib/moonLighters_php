<?php
	$sql = "SELECT `contrat_Id` as contrat_Id,
                   `contrat_name` as contrat_name,
                   `contrat_description` as contrat_description,
                   `contrat_dollar_per_hour` as contrat_dollar_per_hour,
                   `contrat_max_payment` as contrat_max_payment,
                   `contrat_code` as contrat_code

    FROM `contrat` 
    WHERE `account_IdB` = '".$account_Id."'";	
	$xx = mysqli_query($con,$sql);
?>

