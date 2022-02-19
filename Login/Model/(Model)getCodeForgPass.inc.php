<?php

    $sql = "SELECT `code` as vCode FROM `forgetpass` WHERE `account_Id` = '".$account_Id."'";

    $k1 = mysqli_query($con,$sql);
    

?>