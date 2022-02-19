<?php
//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

		$t1 = 0;

		//Get the data from Flutter
		$json_array = array();
		$contrat_array = array();
		

		//Get Contrat List
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Contrat/Model/(Model)getContratListClient.inc.php';
		if(mysqli_num_rows($xx)>0){
			$t1 = 1;
			while($res = mysqli_fetch_assoc($xx)){	

				$contrat_array[] = array($res["contrat_Id"],
										$res["contrat_name"],
										$res["contrat_description"],
										$res["contrat_dollar_per_hour"],
										$res["contrat_max_payment"],
										$res["contrat_code"]
										);
			}	
		}else $contrat_array[] = [];

		$json_array[0] = 'error10';
		//$json_array[1] = $token;
		$json_array[1] = $contrat_array;

		if($t1 == 1){
			$json_array[0] = 'success';
		}
		//echo [$una,$maa,$mia];
		//echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
		echo json_encode($json_array);

		mysqli_close($con);


}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
  
?>