<?php
    $sql = "SELECT `account_Id` as account_Id
                    FROM `account` WHERE `account_email` = '".$email."'";
    $xx = mysqli_query($con,$sql);



?>