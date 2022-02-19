<?php
    $sql = "SELECT a.`active_app_name`,t.`desc_TpProject` 
    FROM `active_apps`a JOIN `type_project`t on a.`code_TpProject`=  t.`code_TpProject` WHERE `contrat_Id`= '".$contrat_Id."'";
    $xx = mysqli_query($con,$sql);


?>

