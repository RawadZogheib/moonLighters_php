<?php

//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;


    $locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error7.php';

    if(!empty($data->contrat_Id) && !empty($data->screenshot_Id)){
        $contrat_Id = htmlspecialchars($data->contrat_Id);
        $screenshot_Id = htmlspecialchars($data->screenshot_Id);

        $locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
        $locSendSS = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Screenshot/Model/(Model)insertScreenshot.inc.php';
        $locTrue = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)true.php';

        require $locConfig;
        $con=con($server);

        require $locSendSS;
        if($xx){
            require $locTrue;
        }else{
            echo "Failed To Insert Screenshot in DB";
        }


        mysqli_close($con);


    }else{
        require $locError7;//7 Field cannot be empty.
    }



?>