<?php
    
    $sql = "INSERT INTO `wallet`
    (`wallet_Id`, `account_Id`, `wallet_amount`, `wallet_date`) VALUES (NULL, (SELECT `account_IdA` FROM `contrat` WHERE `contrat_Id`='".$contrat_Id."'), '0', CURRENT_TIMESTAMP)";
    $yy3 = mysqli_query($con,$sql);


    $sql = "SELECT `wallet_Id` as wallet_Id, `wallet_amount` as wallet_amount FROM `wallet` WHERE `account_Id`= (SELECT `account_IdA` FROM `contrat` WHERE `contrat_Id`='".$contrat_Id."')";
    
    $xx3 = mysqli_query($con,$sql);
    $resConsultant1 = mysqli_fetch_assoc($xx3);

?>