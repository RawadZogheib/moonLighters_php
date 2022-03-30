<?php

	//Get the data from Flutter
    $json_array = array();
	

    //Get Globals List
	
	$json_array[0] = 'error10';

	require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)getGlobals.inc.php';
    if(mysqli_num_rows($xx)>0){
		$t1 = 1;
		$ress = mysqli_fetch_assoc($xx);
		$accountId=$ress["account_Id"];
		$json_array[1] = array($accountId,$email);

	}else $json_array[1] = [];

	if($t1 == 1){
		$json_array[0] = 'true';
	}
	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);


?>