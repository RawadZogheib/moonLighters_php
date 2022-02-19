<?php

//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
//Test token
// $locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
// if(require $locTokenCheck){
    
	if(!empty($data->contrat_Id)){

		//$account_Id = htmlspecialchars($data->account_Id);
        $contrat_Id = htmlspecialchars($data->contrat_Id);
	   
		$table1=array();
		$table2=array();
		

		$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
		require $locConfig;
		$con=con($server);

		
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Timer/Model/(Model)selectTime.inc.php';
	


		$json_array[0] = 'error10';
		if(mysqli_num_rows($yy)>0){

            if($res=mysqli_fetch_assoc($yy)){
               
				$hours=$res["contrat_hours"];
				$minutes=$res["contrat_minutes"];
				$seconds=$res["contrat_seconds"];

            }
				
        }
        require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Timer/Model/(Model)selectActiveApps.inc.php';
		if(mysqli_num_rows($xx)>0){

            while($ress=mysqli_fetch_assoc($xx)){
				array_push($table1,$ress["desc_TpProject"],$ress["active_app_name"]);
				array_push($table2,$table1);
				$table1=array();
            }
			$json_array[0] = 'success';	
        }

        
        $json_array[1] =$hours;
        $json_array[2] =$minutes;
		$json_array[3] =$seconds;
		$json_array[4] =$table2;
		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';

//}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>


