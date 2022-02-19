<?php
$json = file_get_contents('php://input');
$data = json_decode($json);
// Token configuration
$server = 'moonlighters';// DB name
$time = 1;// Token expire time
$tokenLimitation = 5;// Token per account

if(!empty($data->version)){

    $version = htmlspecialchars($data->version);


    $apiVersion = "v1.0";

    if($version != $apiVersion){
        require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorVersion.php';
        exit;
    }


}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorVersion.php'; // error
?>