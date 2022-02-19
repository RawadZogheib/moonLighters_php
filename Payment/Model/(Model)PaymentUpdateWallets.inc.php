<?php
    $sql = "UPDATE `wallet`
    SET `wallet_amount` =  (SELECT `wallet_amount` WHERE `wallet_Id`='".$clientWalletId."') - '".$totalBill."' WHERE `wallet_Id`= '".$clientWalletId."'";

    $yy1 = mysqli_query($con,$sql);

    $sql = "UPDATE `wallet`
    SET `wallet_amount` = (SELECT `wallet_amount` WHERE `wallet_Id`='".$consultantWalletId."') + '".$totalBill."' WHERE `wallet_Id`= '".$consultantWalletId."'";

    $yy2 = mysqli_query($con,$sql);

?>