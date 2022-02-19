<?php
    $sql = "INSERT INTO `screenshots`(`screenshot_Id`, `contrat_Id`) VALUES ('".$screenshot_Id."','".$contrat_Id."')";

    $xx = mysqli_query($con,$sql);

?>