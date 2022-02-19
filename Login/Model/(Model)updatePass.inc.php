<?php
    $sql = "UPDATE `account`
    SET `account_password` = '".$hash."'
    WHERE `account_Id`= '".$account_Id."'";

    $uu = mysqli_query($con,$sql);


?>