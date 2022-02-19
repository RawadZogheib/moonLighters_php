<?php
$password = "1";
//if(!empty($password)){
    $option = array('cost'=>11);
    /////////Set Password(registration)/////////
    $hash = password_hash($password, PASSWORD_BCRYPT, $option);
    echo $hash;
//}else require '(View)Error7.php'; //7 Field cannot be empty.


// if(!empty($_GET["pass"])){
//     $option = array('cost'=>11); // deficulty of hashing
//     $password = $_GET["pass"];
//     echo "Your password is: " . $password . "</br>";

//     /////////Set Password(registration)/////////

//     $hash = password_hash($password, PASSWORD_BCRYPT);
//     echo "Your encrypted password is: " . $hash . "</br></br>";

//     /////////Verify Password(login)/////////
//     if(password_verify($password, $hash)){ //verify password
//         if(password_needs_rehash($hash, PASSWORD_DEFAULT, $option)){ // check if there is a new option
//             $newHash = password_hash($password, PASSWORD_DEFAULT, $option); // rehash
//             echo "success" . "</br>";
//             echo "Your new encrypted password is: " . $newHash . "</br>";
//         }
//     }
// }
?>