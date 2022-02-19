<?php

    $sql = "INSERT INTO `wallet`(`wallet_Id`, `account_Id`, `wallet_amount`)
     VALUES (NULL,'".$accountId."','100')";

    $mq1 = mysqli_query($con,$sql);

?>