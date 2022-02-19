<?php

//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
//Test token
// $locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
// if(require $locTokenCheck){
    
	if(!empty($data->account_Id) && !empty($data->contrat_Id) && !empty($data->pausedTime)){

		$account_Id = htmlspecialchars($data->account_Id);
        $contrat_Id = htmlspecialchars($data->contrat_Id);
        $pausedTime = htmlspecialchars($data->pausedTime);
		
        $time=explode(":",$pausedTime);
		$hours=$time[0];
        $minutes=$time[1];
		$seconds=$time[2];
		

		$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
		require $locConfig;
        $con=con($server);

		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Timer/Model/(Model)insertTime.inc.php';
	


		$json_array[0] = 'error10';
		
		if($xx){
			$json_array[0] = 'success';
		}
		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';

//}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>


