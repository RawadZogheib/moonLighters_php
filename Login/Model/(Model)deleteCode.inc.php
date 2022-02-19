<?php

    $sql = "DELETE FROM `mailcode` WHERE `account_Id` = '".$account_Id."'";

    $dd = mysqli_query($con,$sql);

?>