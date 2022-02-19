<?php
    $sql = "SELECT `wallet_Id`, `wallet_amount` FROM `wallet` WHERE `account_Id`= '".$account_Id."'";

    $yy = mysqli_query($con,$sql);


?>