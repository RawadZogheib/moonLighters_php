<?php
    $sql = "SELECT count(*) as nbr, `account_Id` as account_Id FROM `forgetpass` WHERE `account_Id` = (SELECT `account_Id` 
            FROM `account` WHERE `account_email` = '".$email."')";

    $fp = mysqli_query($con,$sql);
    $fp1 = mysqli_fetch_assoc($fp);


?>