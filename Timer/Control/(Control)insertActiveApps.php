<?php

//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
//Test token
// $locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
// if(require $locTokenCheck){
    
	if(!empty($data->account_Id) && !empty($data->contrat_Id) && !empty($data->map_activeApps)){

		$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
		require $locConfig;
        $con=con($server);

		$account_Id = htmlspecialchars($data->account_Id);
		$contrat_Id = htmlspecialchars($data->contrat_Id);
        $map_activeApps = $data->map_activeApps;

		$map1=explode("{",$map_activeApps);
		
		$map2=explode("}",$map1[1]);

		$map3=explode(",",$map2[0]);
		
		for ($x = 0; $x <= 6; $x++) {
		$map4=explode(":",$map3[$x]);
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Timer/Model/(Model)insertActiveApps.inc.php';
		}
		  
		if($xx){
			$json_array[0] = 'success';
		}
		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';

//}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>


