<?php

    $sql = "SELECT `code` as vCode FROM `mailcode` WHERE `account_Id` = '".$account_Id."'";

    $c1 = mysqli_query($con,$sql);
    $cc1 = mysqli_fetch_assoc($c1);

?>