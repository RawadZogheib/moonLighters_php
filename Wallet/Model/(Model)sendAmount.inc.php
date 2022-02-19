<?php
    $sql = "INSERT INTO `transfer`(`transfer_Id`, `wallet_in`, `wallet_out`, `transfer_amount`)
     VALUES (NULL,'".$account_Id."','".$friend_Id."','".$amount."')";

    $yy1 = mysqli_query($con,$sql);


?>