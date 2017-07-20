<?php
session_start();

if(empty($_SESSION['email']))
{
	header('location:Error_redirect.php');
}
else
{
	//Local Variables for File Uploading
 	$email = $_SESSION['email'];
 	$firstName = $_SESSION['fName'];
 	$lastName = $_SESSION['lName'];
		
	//Session Variables
	$_SESSION['nameTitle1']=$_POST['superName1'];
	$_SESSION['companyName1']=$_POST['compName1'];
	$_SESSION['referenceEmail1']=$_POST['emailAdd1'];
	$_SESSION['referencePhone1']=$_POST['phoneNum1'];	
	$_SESSION['nameTitle2']=$_POST['superName2'];
	$_SESSION['companyName2']=$_POST['compName2'];
	$_SESSION['referenceEmail2']=$_POST['emailAdd2'];
	$_SESSION['referencePhone2']=$_POST['phoneNum2'];
	$_SESSION['nameTitle3']=$_POST['superName3'];
	$_SESSION['companyName3']=$_POST['compName3'];
	$_SESSION['referenceEmail3']=$_POST['emailAdd3'];
	$_SESSION['referencePhone3']=$_POST['phoneNum3'];
		
	/*File Upload file1 and/or file2
	 *
	 * File structure:
	 * - Only Docx files
	 * - File size limit of 2-MB
	 * - Applicant_Documents/#email_FirstnameLastname/userfile
	 *
	 * */
	if(isset($_FILES['File1']))
	{
		//Create file associative array
		$file = $_FILES['File1'];
	
		//file properties
		$filename = $file['name'];
		$fileTempLoc = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];

		
		//Check if directory exist. If it doesn't, then it creates the  directory
		if(!file_exists('Applicant_Documents/'.$email.'_'.$firstName.''.$lastName))
		{
			mkdir('../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName, 0777, true);
		}
	
		//Extract file extension
		$fileExtension = explode('.', $filename);
		$fileExtension = strtolower(end($fileExtension));
	
		//Array that stores a list of allowed file extensions
		$allowedExts = array("pdf", "doc", "docx");
		$extension = end(explode(".", $_FILES["File1"]["name"]));
	
		//If the extension is allowed
		if(in_array($fileExtension, $allowedExts))
		{
			//Check for errors
			if($fileError === 0)
			{
				//Check File size
				if($fileSize <= 2097152)
				{
					$fileNewName = uniqid('',  true).'.'.$fileExtension;
					$fileDestination = '../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName.'/'.$filename;
	
					if(move_uploaded_file($fileTempLoc, $fileDestination))
					{
						echo "the file '$filename' was succesfully Uploaded";
					}
					else
					{
						echo "Error";
					}
				}
			}
			else
			{
			echo "Error";
			}
		}
	}
	if(isset($_FILES['File2']))
	{
		$file2 = $_FILES['File2'];
		$filename = $file2['name'];
		$fileTempLoc = $file2['tmp_name'];
		$fileSize = $file2['size'];
		$fileError = $file2['error'];
 		$filePath = '../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName;
		
		$fileExtension = explode('.', $filename);
		$fileExtension = strtolower(end($fileExtension));
		$extensionAllowed = array('docx', 'pdf');
		if(in_array($fileExtension, $extensionAllowed))
		{
			if($fileError === 0)
			{
				if($fileSize <= 2097152)
				{
					$fileNewName = uniqid('',  true).'.'.$fileExtension;
					$fileDestination = '../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName.'/'.$filename;
	
					if(move_uploaded_file($fileTempLoc, $fileDestination))
					{
						echo "the file '$filename' was succesfully Uploaded";
					}
					else
					{
						echo "Error";
					}
				}
			}
			else
			{
				echo "Error";
			}
		}
	}
$filePath = 'Applicant_Documents/'.$email.'_'.$firstName.''.$lastName;
$_SESSION['filePath'] = $filePath;

header("location:SubmitDB.php");
}
?>