<?php
    $sql = "UPDATE `active_apps`
    SET `active_app_name`='".$map4[1]."'
    WHERE `contrat_Id`='".$contrat_Id."' AND `code_TpProject`='".$map4[0]."'";

    $xx = mysqli_query($con,$sql);

?>