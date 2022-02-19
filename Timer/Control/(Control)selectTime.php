<?php

//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
//Test token
// $locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
// if(require $locTokenCheck){
    
	if(!empty($data->account_Id) && !empty($data->contrat_Id)){

		$account_Id = htmlspecialchars($data->account_Id);
        $contrat_Id = htmlspecialchars($data->contrat_Id);
	   
		

		$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
		require $locConfig;
		$con=con($server);

		
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Timer/Model/(Model)selectTime.inc.php';
	


		$json_array[0] = 'error10';
		if(mysqli_num_rows($yy)>0){

            if($res=mysqli_fetch_assoc($yy)){
               
				$hours=$res["contrat_hours"]*3600;
				$minutes=$res["contrat_minutes"]*60;
				$seconds=$res["contrat_seconds"];

				$total=$hours+$minutes+$seconds;

				$json_array[0] = 'success';
				$json_array[1] =$total;
            }
        }

		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';

//}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>


