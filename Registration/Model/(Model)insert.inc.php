<?php

    $sql = "INSERT INTO `account`(`account_Id`, `account_firstName`, `account_lastName`, `account_userName`,
	 `account_password`, `account_email`,
    `account_phoneNumber`, `account_gender`, `account_date`, `isRegistered`)
    VALUES (NULL,'".$fname."','".$lname."','".$userName."','".$hash."','".$email."','".$phoneNumberPlus."','".$gender."',
    '".$dateOfBirth."', '".$isRegistered."')";

    $mq = mysqli_query($con,$sql);

?>