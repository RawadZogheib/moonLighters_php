<?php
    $sql = "SELECT count(*) as nbr FROM `account` WHERE `account_email`='".$email."'";
    
    $em = mysqli_query($con,$sql);
    $em1 = mysqli_fetch_assoc($em);


?>