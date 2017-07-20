<?php

// PHP file for removing a perm applicant.
// This file only deletes data for perm applicants compared to temp. 
// This code will remove the applicant from every table in the database
// Will also delete resume and other files. 

// The applicant ID and previous page name:
$applicantID = filter_input(INPUT_POST, 'applicantID');
$page = filter_input(INPUT_POST, 'page');

//connect to database
$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");

if(!$mysqli) {
	die('Could not connect: ' . mysqli_error());
}

// =========================================================================================== //

// Attempt to delete the files associated with the candidate
$sql = 'SELECT * FROM permanentData WHERE applicantID = ' . $applicantID. ';'; 
	
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
	
$dir = "/var/www/vhosts/okanaganstaffingapplicants.site/httpdocs/";
while ($row = mysqli_fetch_array($query)) {
		$dir .= $row['filePath'];
}
	
if ($dir == "/var/www/vhosts/okanaganstaffingapplicants.site/httpdocs/") {
	echo 'dead in perm';
	die();
}
   
if(substr($dir, strlen($dir) - 1, 1) != '/') {
	$dir .= '/'; 
}

$files = glob($dir . '*', GLOB_MARK);
foreach ($files as $file) {
	unlink($file);
}

rmdir($dir);

// =========================================================================================== //

// Delete data from foreign key tables
$sql = 'DELETE p, a, j FROM permanentData p, appStaffData a, jobs j
		WHERE
		p.applicantID LIKE \''.$applicantID.'\' AND
		a.applicantID LIKE \''.$applicantID.'\' AND
		j.applicantID LIKE \''.$applicantID.'\';'; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (!$query) {
	echo 'Could not delete perm data';
} else {
	echo 'Deleted applicant information succesfully.';
}

// =========================================================================================== //

// Delete data from personal table containing primary key
$sql = 'DELETE FROM personal WHERE personal.applicantID LIKE \''.$applicantID.'\''; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (!$query) {
	echo 'Could not delete data';
} else {
	echo 'Deleted applicant information succesfully.';
}

// =========================================================================================== //

// // Return the user to the list of applicants.

header('Location: ' .$page. '');
die();

?>