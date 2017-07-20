<?php

// PHP file for removing an applicant.
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
$sql = 'SELECT * FROM applicantReferences WHERE applicantID = ' . $applicantID. ';'; 
$query = mysqli_query($mysqli, $sql);
$dir = "/var/www/vhosts/okanaganstaffingapplicants.site/httpdocs/";
while ($row = mysqli_fetch_array($query)) {
	$dir .= $row['filePath'];
}
	
if ($dir == "/var/www/vhosts/okanaganstaffingapplicants.site/httpdocs/") {
	echo 'dead in temp';
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
$sql = 'DELETE ar, asd, a, c, co, ed, ex, j, m, o, s 
		FROM applicantReferences ar, appStaffData asd, availability a, cities c, citizenOther co,
		education ed, expertise ex, jobs j, moneySkills m, otherSkills o, skillPrograms s
		WHERE
		ar.applicantID LIKE \''.$applicantID.'\' AND
		asd.applicantID LIKE \''.$applicantID.'\' AND
		a.applicantID LIKE \''.$applicantID.'\' AND
		c.applicantID LIKE \''.$applicantID.'\' AND
		co.applicantID LIKE \''.$applicantID.'\' AND
		ed.applicantID LIKE \''.$applicantID.'\' AND
		ex.applicantID LIKE \''.$applicantID.'\' AND
		j.applicantID LIKE \''.$applicantID.'\' AND
		m.applicantID LIKE \''.$applicantID.'\' AND
		o.applicantID LIKE \''.$applicantID.'\' AND
		s.applicantID LIKE \''.$applicantID.'\';'; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (!$query) {
	echo 'Could not delete temp data';
} else {
	echo 'Deleted applicant information succesfully.';
}


// =========================================================================================== //

// Delete data from personal table with primary key
$sql = 'DELETE FROM personal WHERE applicantID LIKE \''.$applicantID.'\';';  
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (!$query) {
	echo 'Could not delete personal data\n';
} else {
	echo 'Deleted applicant information from personal succesfully.\n';
}

// =========================================================================================== //

// Return the user to the proper page.

header('Location: ' .$page. '');
die();


?>