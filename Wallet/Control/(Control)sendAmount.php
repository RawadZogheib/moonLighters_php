<?php

//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;
//Test token
// $locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
// if(require $locTokenCheck){
    
	if(!empty($data->account_Id) && !empty($data->friend_Id) && !empty($data->amount)){

        $account_Id = htmlspecialchars($data->account_Id);
        $friend_Id = htmlspecialchars($data->friend_Id);
		$amount = htmlspecialchars($data->amount);
		$json_array[0] = 'error10';

		$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
		require $locConfig;
		$con=con($server);

        require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Wallet/Model/(Model)loadWallet.inc.php';
		if($res=mysqli_fetch_assoc($yy)){
            if($res["wallet_amount"]>=$amount){

                        
                require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Wallet/Model/(Model)sendAmount.inc.php';
            


                
                if($yy1){
                    $json_array[0] = 'success';	
                }

            }

        }
		echo json_encode($json_array);

		mysqli_close($con);
	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';

//}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>


