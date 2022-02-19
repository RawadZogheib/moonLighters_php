<?php
    
    $sql = "UPDATE `account`
            SET `isRegistered` = 1
            WHERE `account_Id` = (SELECT `account_Id` WHERE `account_email` = '".$email."')";

    $pp = mysqli_query($con,$sql);

?>