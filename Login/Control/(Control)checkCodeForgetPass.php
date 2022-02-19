<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error7.php';

    if(!empty($data->code) && !empty($data->email)){
        $code = htmlspecialchars($data->code);
        $email = htmlspecialchars($data->email);

        $locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
        $locGetAccId = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)getAccountId.inc.php';
        //$locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)success.php';
        $locCodeFailed = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)codeFailed.php';
        $locGetGlobals = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Control/(Control)getGlobals.php';
        //$locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error4.php';
        $locTrue = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)true.php';
        //$locTokenCreate = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCreate.php';
        $locDeleteCodeForgPass = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)deleteCodeForgPass.inc.php';
        
        //$locErrException = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorException.php';

        require $locConfig;
        $con=con($server);

        
        require $locGetAccId;
        if(mysqli_num_rows($g1) > 0){
            $account_Id = $gg1['account_Id'];
            require  $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)getCodeForgPass.inc.php';
            //echo $cc1['vCode'];
            if(mysqli_num_rows($k1) > 0){
                $kk1 = mysqli_fetch_assoc($k1);
                if($code == $kk1['vCode']){
                        require $locDeleteCodeForgPass;
                        require $locTrue;
                }else{
                    require $locCodeFailed;
                }
            }else{
                echo 'unknown error.';  //the Code does not match with the Email
            }
        }else{
            echo 'Email does not exist.';
        }

        
      mysqli_close($con);
        
    }else require $locError7;//7 Field cannot be empty.




 
?>