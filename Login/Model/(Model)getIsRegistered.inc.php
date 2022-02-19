<?php
    //(Control)Login.php   
    
    $sql = "SELECT `isRegistered` as isRegistered FROM `account` WHERE `account_email`= '".$email."'";
    $reg = mysqli_query($con,$sql);
    $reg1 = mysqli_fetch_assoc($reg);


?>