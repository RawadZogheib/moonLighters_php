<?php

	//Get the data from Flutter
    $json_array = array();
	

    //Get Globals List
	
	$json_array[0] = 'error10';
	$json_array[1] = $token;

	require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)getGlobals.inc.php';
    if(mysqli_num_rows($xx)>0){
		$t1 = 1;
		$ress = mysqli_fetch_assoc($xx);
		$json_array[2] = array($ress["account_Id"],
								$ress["account_firstName"],
								$ress["account_lastName"],
								$ress["account_userName"],
								$ress["account_email"],
								$ress["account_phoneNumber"],
								$ress["account_gender"],
								$ress["account_date"],
									
									);

	}else $json_array[2] = [];

	if($t1 == 1){
		$json_array[0] = 'success';
	}
	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);


?>