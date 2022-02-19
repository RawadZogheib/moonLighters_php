<?php
$locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
require $locVersionTest;

$locError7 = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Error/View/(View)error7.php';

        $t1 = 0;

		//Get the data from Flutter
		$json_array = array();
		$screenshot_array = array();

        if(!empty($data->date) && !empty($data->contrat_Id)){

            $date = htmlspecialchars($data->date);
            $contrat_Id = htmlspecialchars($data->contrat_Id);

            $locConfig = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Model/(Model)config.inc.php';
            $locGetDate = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Screenshot/Model/(Model)getDate.inc.php';
            $locGetScreenshot = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Screenshot/Model/(Model)getScreenshot.inc.php';

            require $locConfig;
            $con=con($server);

            require $locGetDate;
            if(mysqli_num_rows($d1) > 0){
                $t1 = 1;
                while($dd1 = mysqli_fetch_assoc($d1)){
                    $fulldate = $dd1["screenshot_Date"];    //get all the date from DB;
                    $r = explode(' ',$fulldate);
                    $dateDb = $r[0];        //ex: $date= "2022-12-12";
                    if($date == $dateDb){
                        require $locGetScreenshot;
                        if($ss1["screenshot_Id"]){
                            $screenshot_array[] = $ss1["screenshot_Id"];
                        }
                        
                    }else{
                        //do nothing
                    }
                }
            }else $screenshot_array[] = [];



            $json_array[0] = 'error10';
            //$json_array[1] = $token;
            $json_array[1] = $screenshot_array;

            if($t1 == 1){
                $json_array[0] = 'true';
            }
            //echo [$una,$maa,$mia];
            //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
            echo json_encode($json_array);

            mysqli_close($con);

        }else require $locError7;




?>