<?php
    require_once 'zipper.php'; //include the class which zips the files for download

    $applicantID = $_POST['AppID'];
    $jobID = $_POST['jobID'];

    $mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff"); //DB Connect
    $sql = "";
    $dir_path = "";//FILE PATH which contains the files to dowload
	$arrFiles = array(); //Array Of files to be compressed into zip
	
    if($jobID % 2 == 0){

        $sql = 'SELECT filePath FROM applicantReferences WHERE applicantID = '.$applicantID.';';
        
    }else{

        $sql = 'SELECT filePath FROM permanentData WHERE applicantID = '.$applicantID.';';
    }
    $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    while ($row = mysqli_fetch_array($query)) {
        $dir_path = $dir_path . $row['filePath'];
    }
    
    
    if(is_dir($dir_path)){
        $files = scandir($dir_path); //create and array that stores all dir files.directories including '.' and '..'
        foreach($files as $newFile){ //Loop through the files
            if($newFile != '.' && $newFile != '..'){ //If the current found is NOT . or ..

                $newFile = $dir_path . "/" . $newFile; 
                $arrFiles[] = $newFile; //add to the array of files to compress/zip
            }
        }
    }



    $zipper = new zipper; //create the zipper object (contains functions for preparing the .ZIP)
    $zipper->add($arrFiles); //add files to Zipper ZIP array

    $filename = $_POST['postFileName'].".zip";
    $filepath = $dir_path . "/" . $filename; //Path to the new .zip with the ZIP name included in the path


    $zipper->store($filepath); //create the ZIP & store for download


        header("Content-Type: application/zip");
        header("Content-Disposition: attachment; filename=".basename($filepath).";" );
        readfile("$filepath");


    
?>