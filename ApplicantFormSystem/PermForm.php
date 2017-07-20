 <?php

session_start();

if(empty($_SESSION['email']))
{
	header('location:Error_redirect.php');
}
else
{

//Storing user input into session variables.
$_SESSION['mainAreaExp'] = $_POST['permQ1'];
$_SESSION['interestInRole'] = $_POST['permQ2'];
$_SESSION['perfectCandidate'] = $_POST['permQ3'];
$_SESSION['whySeekingWork'] = $_POST['permQ4'];
$_SESSION['expectations'] = $_POST['permQ5'];

//Local variables for storing file
$email = $_SESSION['email'];
$firstName = $_SESSION['fName'];
$lastName = $_SESSION['lName'];

if(isset($_POST['submit']))
{
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
	if(!file_exists('../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName))
	{
		mkdir('../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName, 0777, true);
	}

	//Extract file extension
	$fileExtension = explode('.', $filename);
	$fileExtension = strtolower(end($fileExtension));
	
	//Array that stores a list of allowed file extensions
	$allowedExts = array("pdf", "doc", "docx");
	$tmp = explode(".", $_FILES["File1"]["name"]);
	$extension = end($tmp);


	//If the extension is allowed
		if(in_array($fileExtension, $allowedExts))
		{
			//Check for errors
			if($fileError === 0)
			{
				echo "\n hello!";
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
						echo "Error, File could not be uploaded.";
					}
				}
				else
				{
					echo "Error, File is too big";
				}
			}
			else
			{
			echo "Error, File could not be loaded.";
			}
		}
	}


if(isset($_FILES['File2']))
{
	//Create file associative array
	$file = $_FILES['File2'];
	
	//file properties
	$filename = $file['name'];
	$fileTempLoc = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];

	//Check if directory exist. If it doesn't, then it creates the  directory
	if(!file_exists('../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName))
	{
		mkdir('../Applicant_Documents/'.$email.'_'.$firstName.''.$lastName, 0777, true);
	}

	//Extract file extension
	$fileExtension = explode('.', $filename);
	$fileExtension = strtolower(end($fileExtension));
	
	//Array that stores a list of allowed file extensions
   $allowedExts = array("pdf", "doc", "docx");
	$tmp = explode(".", $_FILES["File2"]["name"]);
	$extension = end($tmp);

	// $extension = end(explode(".", $_FILES["File1"]["name"]));
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
	
	$filePath = 'Applicant_Documents/'.$email.'_'.$firstName.''.$lastName; 
	$_SESSION['filePath'] = $filePath;	
	header("location:SubmitPermDB.php");
}

}
?>