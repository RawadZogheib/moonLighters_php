<?php

    $sql = "INSERT INTO `forgetpass`(`account_Id`, `code`) 
    VALUES ('".$account_Id."', '".$vCode."')";

    $c1 = mysqli_query($con,$sql);

?>