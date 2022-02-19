<?php
    $sql = "SELECT `contrat_hours`, `contrat_minutes`, `contrat_seconds` FROM `contrat` WHERE `contrat_Id`= '".$contrat_Id."'";

    $yy = mysqli_query($con,$sql);


?>