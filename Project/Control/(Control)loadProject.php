<?php
//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

	if(!empty($data->contrat_Id)){

		$contrat_Id = htmlspecialchars($data->contrat_Id);

		$t1 = 0;

		$json_array = array();
		$project_array = array();
		

		//Get Contrat List
		
		
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Project/Model/(Model)getProjectList.inc.php';
		if(mysqli_num_rows($xx)>0){
			$t1 = 1;
			while($res = mysqli_fetch_assoc($xx)){	
				require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Project/Model/(Model)getProjectType.inc.php';
				
				$project_array[] = array($res["project_Id"],
										$res["project_name"],
										$res["project_description"],
										$res2["desc_TpProject"]
										);
			}	
		}else $project_array[] = [];

		$json_array[0] = 'error10';
		//$json_array[1] = $token;
		$json_array[1] = $project_array;

		if($t1 == 1){
			$json_array[0] = 'success';
		}
		//echo [$una,$maa,$mia];
		//echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';


}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>