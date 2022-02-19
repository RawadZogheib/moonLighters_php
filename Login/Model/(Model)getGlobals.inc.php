<?php
    $sql = "Select  `account_Id` as account_Id,
                    `account_firstName` as account_firstName,
                    `account_lastName` as account_lastName,
                    `account_userName` as account_userName,
                    `account_email` as account_email,
                    `account_phoneNumber` as account_phoneNumber,
                    `account_gender` as account_gender,
                    `account_date` as account_date,
                    `isRegistered` as isRegistered
                    FROM `account` WHERE `account_email` = '".$email."'";
    $xx = mysqli_query($con,$sql);



?>