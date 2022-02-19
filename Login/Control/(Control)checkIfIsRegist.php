<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error7.php';


    if(!empty($data->email)){
        $email = htmlspecialchars($data->email);
        
        $locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
        $locTrue = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)true.php';
        $locError11 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error11.php';
        $locError12 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error12.php';
        
        require $locConfig;
        $con=con($server);
        
        require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)getEmail.inc.php';
        if($em1['nbr'] > 0 ){
            require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)getIsRegistered.inc.php';
            if($reg1['isRegistered'] == 1){
                require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Control/(Control)phpMailerForgetPass.php';
                require $locTrue;
            }else{
                require $locError11;
            }
        }else{
            require $locError12;
        }

        mysqli_close($con);


    }else require $locError7;


?>