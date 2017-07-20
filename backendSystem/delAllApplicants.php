<?php

//connect to database
$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
		
$sql = "SELECT p.applicantID, j.jobNum, p.dateForm
		FROM personal p, jobs j
		WHERE p.applicantID = j.applicantID AND
			  p.dateForm <= DATE_SUB(NOW(), INTERVAL 30 DAY);"; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$applicantArray = array();
$jobNumArray = array();

// Fetch all the applicantID's and jobNums and store them in arrays
while ($row = mysqli_fetch_array($query)) {
	array_push($applicantArray, $row['applicantID']);
	array_push($jobNumArray, $row['jobNum']);
}

// Check if the jobnumber is even or odd
while (count($applicantArray) != 0) {
	if($jobNumArray[0] % 2 == 0) {
		tempApplicant(reset($applicantArray)); // Temp applicant deletions
	} else {
		permApplicant(reset($applicantArray)); // Perm applicant deletions
	}
	array_shift($applicantArray);
	array_shift($jobNumArray);
}

header('Location: delApps.php');
die();


/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
									/* Delete functions */
									/* Temp applicants  */
						
						
function tempApplicant($applicantID) {
	
	// Connect to database
	$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
	
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
}


/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
							/* Function to remove perm applicants */
							
							
function permApplicant($applicantID) {
	
	// Connect to database
	$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
	
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
}
?>