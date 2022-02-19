<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Composer/vendor/phpmailer/phpmailer/src/Exception.php';
      require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
      require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Composer/vendor/phpmailer/phpmailer/src/SMTP.php';
      require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Composer/vendor/autoload.php';
      require  $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Control/(Control)vCode.php';

      $locCodeException =  $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)codeException.php';
      
      $emailRegExp = "/[a-zA-Z0-9]+@(g|hot)mail.com/";


if(!empty($data->email)){
  $email = htmlspecialchars($data->email);

  // require $locConfig;      // ma lezm 3ayetla marten , shelta l2an 7ateta bl file (Contro)checkIfIsRegist.php
	// $con=con($server);

  if(!preg_match($emailRegExp,$email)){
        require $locError2_5;//2_5 It's not an  email format.
  }else{
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "mimo.nr0520@gmail.com";
        $mail->Password   = "Batikha05@1";

        $mail->IsHTML(true);
        $mail->AddAddress($email);
        $mail->SetFrom($mail->Username);
        //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
        //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
        $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class code: $vCode</b>";
        
        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
          echo "Error while sending Email.";
          //var_dump($mail);
        } else {
          //echo "Email sent successfully";
          require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Registration/Model/(Model)getAccountId.inc.php';
          if($gg1['account_Id']){
            $account_Id = $gg1['account_Id'];
            require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)getAccIdFromForgetPass.inc.php';
            if($fp1["nbr"] > 0){
              require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)updateCodeForgetPass.inc.php';
            }else{
              require $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Login/Model/(Model)insertCodeForgetPass.inc.php';
            }
          }else{
            require $locCodeException;
          }
        }
  }
}
?>