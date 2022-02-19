<?php
    $sql = "UPDATE `contrat`
    SET `contrat_hours` = '".$hours."', 
    `contrat_minutes` = '".$minutes."',
    `contrat_seconds` = '".$seconds."'
    WHERE `contrat_Id`= '".$contrat_Id."'";

    $xx = mysqli_query($con,$sql);

?>