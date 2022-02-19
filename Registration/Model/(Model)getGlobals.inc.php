<?php
    $sql = "SELECT `account_Id` as account_Id,
                    `account_email` as account_email
                    FROM `account` WHERE `account_email` = '".$email."'";
    $xx = mysqli_query($con,$sql);



?>