<?php

    $sql = "SELECT count(*) as nbr, `account_Id` as account_Id FROM `mailcode` WHERE `account_Id` = (SELECT `account_Id` 
    FROM `account` WHERE `account_email` = '".$email."')";

    $mm = mysqli_query($con,$sql);
    $mc = mysqli_fetch_assoc($mm);

?>