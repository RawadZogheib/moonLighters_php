<?php

    $sql = "INSERT INTO `mailcode`(`account_Id`, `code`) 
    VALUES ('".$account_Id."', '".$vCode."')";

    $c1 = mysqli_query($con,$sql);

?>