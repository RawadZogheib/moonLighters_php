<?php
    $sql = "UPDATE `forgetpass`
    SET `code` = '".$vCode."' , `date`=CURRENT_TIMESTAMP(), 
    `count_codeSent`=(SELECT `count_codeSent` WHERE `account_Id`= '".$account_Id."')+1
    WHERE `account_Id`= '".$account_Id."'";

    $uu = mysqli_query($con,$sql);


?>