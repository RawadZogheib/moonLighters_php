<?php

    $sql = "DELETE FROM `forgetpass` WHERE `account_Id` = '".$account_Id."'";

    $dd = mysqli_query($con,$sql);

?>