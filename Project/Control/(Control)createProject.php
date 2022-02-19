<?php
//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

	if(!empty($data->account_Id) && !empty($data->contrat_Id) && !empty($data->project_description) && !empty($data->project_name)  && !empty($data->code_TpProject)){
		
		$account_Id = htmlspecialchars($data->account_Id);
		$contrat_Id = htmlspecialchars($data->contrat_Id);
        $project_name = htmlspecialchars($data->project_name);
        $project_description = htmlspecialchars($data->project_description);
        $code_TpProject = htmlspecialchars($data->code_TpProject);


		$json_array = array();
		$json_array[0] = 'error10';
		

		
		//Check if name unique in a specific contrat
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Project/Model/(Model)checkProjectName.inc.php';
		if($res["nbr"] == 0){
			
		//Create Project in Consultant
		require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Project/Model/(Model)createProject.inc.php';
		$json_array[0] = $location;
		if($xx){
			$json_array[0] = 'success';
		}

	}else{
		$json_array[0] = 'error13'; //Project Name already exist
	}
		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';


}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>