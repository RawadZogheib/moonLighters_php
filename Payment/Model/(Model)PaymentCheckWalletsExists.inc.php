<?php
    $sql = "SELECT `wallet_Id` as wallet_Id, `wallet_amount` as wallet_amount FROM `wallet` WHERE `account_Id`= (SELECT `account_IdB` FROM `contrat` WHERE `contrat_Id`='".$contrat_Id."')";
    
    $xx1 = mysqli_query($con,$sql);
    $resClient = mysqli_fetch_assoc($xx1);

    $sql = "SELECT `wallet_Id` as wallet_Id, `wallet_amount` as wallet_amount FROM `wallet` WHERE `account_Id`= (SELECT `account_IdA` FROM `contrat` WHERE `contrat_Id`='".$contrat_Id."')";
    
    $xx2 = mysqli_query($con,$sql);
    $resConsultant = mysqli_fetch_assoc($xx2);

?>