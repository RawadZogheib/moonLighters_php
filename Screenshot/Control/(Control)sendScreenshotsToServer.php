<?php
    $version = $_POST['version'];
    $contratId=$_POST['contratId'];
    // echo "AAAAAAA";
    // echo $contratId;
    //$arrVersion=$array = explode(' ', $version); //convert a string to an array
    //$jsonVersion=json_encode($arrVersion); //convert an array to a json list
    
    // $locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
    // require $locVersionTest;
    //Test version

//array to return
$return["error"] = false;
$return["msg"] = "";
$return["success"] = true;

if(isset($_FILES["file"])){
    $target_dir = "Screenshot_Uploads";//directory to upload file
    if(!file_exists("../../$target_dir")){
        mkdir("../../$target_dir");
    }
    if(!file_exists("../../$target_dir/$contratId")){
        mkdir("../../$target_dir/$contratId");
    }

    $filename = $_FILES["file"]["name"];
	
    //name of file
    //$_FILES["file"]["size"] get the size of file
    //you can validate here extension and size to upload file.

    $savefile = "../../$target_dir/$contratId/$filename";
    //complete path to save file

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $savefile)) {
        $return["error"] = false;
        //upload successful
    }else{
        $return["error"] = true;
        $return["msg"] =  "Error during saving file.";
    }
}else{
    $return["error"] = true;
    $return["msg"] =  "No file is sublitted.";
}

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string







?>