<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error7.php';

if( !empty($data->fname) && !empty($data->lname) && !empty($data->userName) && !empty($data->email)
	&& !empty($data->password) && !empty($data->repassword)  && !empty($data->phoneNumber)
	&& !empty($data->gender) && !empty($data->dateOfBirth) ){
	
	$fname = htmlspecialchars($data->fname);
	$lname = htmlspecialchars($data->lname);
	$userName = htmlspecialchars($data->userName);
	$email = htmlspecialchars($data->email);
	$password = htmlspecialchars($data->password);
	$repassword = htmlspecialchars($data->repassword);
	$gender = htmlspecialchars($data->gender);
	$phoneNumber = htmlspecialchars($data->phoneNumber);
	$dateOfBirth = htmlspecialchars($data->dateOfBirth);
	$phoneNumberPlus = '+'.$phoneNumber;
	//$isRegistered = htmlspecialchars($data->isRegistered);


	$locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
	$locModelEmail = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)email.inc.php';
	$locError2_5 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error2_5.php';
	$locError2_3 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error2_3.php';
	$locError3 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error3.php';
	$locModelUsername = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)username.inc.php';
	$locError1 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error1.php';
	$locError2_1 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error2_1.php';
	$locError2_2 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error2_2.php';
	$locPhoneNb = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)phoneNb.inc.php';
	$locError2_7 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error2_7.php';
	$locError9 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error9.php';
	$locEncryptSet = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Control/(Control)encryptSet.php';
	$locModelInsert = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)insert.inc.php';
	$locError4 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error4.php';
	$locError5 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error5.php';
	$locError6 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error6.php';
	$locSendMail = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Control/(Control)phpMailer.php';
	$locgetGlobals = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Control/(Control)getGlobals.php';
	$locInitWallet = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)insertWallet.inc.php';
	
	$userNameRegExp = "/^[a-zA-Z0-9_\.]*$/";
	$phoneRegExp = "/(961|1|86|357|20|33|91|39)[0-9]{8}\b/";
	$passRegExp = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@#$%^&:,?_-]).{8,}$/";
	$emailRegExp = "/[a-zA-Z0-9]+@(g|hot)mail.com/";
	
	require $locConfig;
	$con = con($server);
	
	require $locModelEmail;
	if($res["nbr"] == 0){
		if(!preg_match($emailRegExp,$email)){
				require $locError2_5;//2_5 It's not an  email format.
		}else if(strlen($password) <8){
			require $locError2_3;//2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
		}else if(!preg_match($passRegExp, $password)){
			require $locError2_3;//2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
		}else if($repassword != $password){
				require $locError3;//3 Please make sure your passwords match.
		}else{
			require $locModelUsername;
			if($res3["nbr"] == 0){
				if(preg_match('/\s/',$userName)){
					require $locError1;//1 No Spaces Allowed.
				}else if(strlen($userName)<8){
					require $locError2_1;//2_1 Your username must contain at least 8 characters.
				}else if(!preg_match($userNameRegExp,$userName)){
					require $locError2_2;//2_2 Your username can only contain lowercase and uppercase characters and special characters( _ .).
				}else{
						require $locPhoneNb;
						if($res4["nbr"] != 0 ){
							require $locError2_7;//2_7
						}else if(!preg_match($phoneRegExp,$phoneNumber)){
							require $locError9;//9
						}else{
							require $locEncryptSet;
							require $locModelInsert;
							if($mq){
								require $locgetGlobals;
								require $locInitWallet;
								require $locSendMail;//send Mail

								
							}else require $locError4;//4 Cannot connect to the dataBase.
						}
					}
			}else require $locError5;//5 UserName already exist.
		}
	}else require $locError6;//6 Email already exist.
	
	mysqli_close($con);
}else require $locError7;//7 Field cannot be empty.



?>