<?php
//Test version
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';

require $locVersionTest;

//Test token
$locTokenCheck = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)tokenCheck.php';
if(require $locTokenCheck){

	if(!empty($data->totalBill && $data->contrat_Id)){

		$totalBill = htmlspecialchars($data->totalBill);
        $contrat_Id = htmlspecialchars($data->contrat_Id);

        $locCheckWalletExists = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Payment/Model/(Model)PaymentCheckWalletsExists.inc.php';
        $locUpdateWallets = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Payment/Model/(Model)PaymentUpdateWallets.inc.php';
        $locCreateConsultantWallet = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Payment/Model/(Model)PaymentCreateConsultantWallet.inc.php';
        $locSuccess = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)success.php';
        $locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error4.php';
        $locError401 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error401.php';
        $locError402 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error402.php';
        $locError403 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error403.php';

        require $locCheckWalletExists;
        

        if(mysqli_num_rows($xx1) == 1){// Client Wallet Exists
            // Client wallet info
            $clientWalletId = $resClient["wallet_Id"];
            $clientWalletAmount = $resClient["wallet_amount"];
            
            if(mysqli_num_rows($xx2) == 1){// Consultant Wallet Exists
                // Consultant wallet info
                $consultantWalletId = $resConsultant["wallet_Id"];
                $consultantWalletAmount = $resConsultant["wallet_amount"];
                
                if($clientWalletAmount >= $totalBill){
                    require $locUpdateWallets;
               
                    if($yy1){
                        if($yy2){
                            mysqli_close($con);
                            require $locSuccess;
                        }else{
                            mysqli_close($con);
                            require $locError4;
                        }
                    }else{
                        mysqli_close($con);
                        require $locError4;
                    } 
                }else{// You don't have enough bill
                    require $locError403;
                }
                       
            }else if(mysqli_num_rows($xx2) == 0){
                require $locCreateConsultantWallet;

                if($yy3){

                    // Consultant wallet info
                    $consultantWalletId = $resConsultant1["wallet_Id"];
                    $consultantWalletAmount = $resConsultant1["wallet_amount"];
                    
                    if($clientWalletAmount >= $totalBill){
                        require $locUpdateWallets;
                   
                        if($yy1){
                            if($yy2){
                                mysqli_close($con);
                                require $locSuccess;
                            }else{
                                mysqli_close($con);
                                require $locError4;
                            }
                        }else{
                            mysqli_close($con);
                            require $locError4;
                        } 
                    }else{// You don't have enough bill
                        require $locError403;
                    } 
                }else{
                    mysqli_close($con);
                    require $locError4;
                } 

            }else require $locError402;
        }else require $locError401;

	}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)Error7.php';


}else require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)errorToken.php'; //JSON or GET is empty
?>