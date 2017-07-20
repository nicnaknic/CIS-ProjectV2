<?php
session_start();
$mysqli = mysqli_connect("localhost", "OkStaff", "A11a11a11", "okstaff");
include 'DBFunctionDatabase.php';
include  'okstaff_functions.php';

//Function Table Creation Test
function tableTest($temp, $query, $lineNumber){
	if($temp->query($query) === true) {
		echo nl2br("Created Table. (Line:".$lineNumber.")\n");
	}else{
		echo nl2br("Already Made Table. (Line:".$lineNumber.")\n");
	}
}

//Function Table Insert
function tableInsert($temp, $query, $lineNumber){
	if($temp->query($query) === true) {
		echo nl2br("Insertion of Data was success. (Line:".$lineNumber.")\n");
	}else{
		echo nl2br("Insertion Failed. (Line:".$lineNumber.")\n");
	}
}

//Function Staff Selection
function StaffSelectTest($temp, $query){
	$tempResult = $temp->query($query);
	if((isset($tempResult->num_rows)) && ($tempResult->num_rows > 0)) {
		while($row = $tempResult->fetch_assoc()){
			echo "<br>Staff Name: ".$row["firstName"]." ".$row["lastName"].
			"<br>Password: ".$row["passwords"]." Username: ".$row["username"]."<br>";
		}
	} else {
		echo "0 results";
	}
}
//Function Permanent Selection
function PermanentSelectTest($temp, $query){
	$tempResult = $temp->query($query);
	if((isset($tempResult->num_rows)) && ($tempResult->num_rows > 0)) {
		while($row = $tempResult->fetch_assoc()){
			echo "<br>IDapp: ".$row["applicationID"].", ID: ".$row["applicantID"]." Name: ".$row["firstName"]." ".$row["lastName"].
			"<br>Address: ".$row["street"].", ".$row["city"]." ".$row["province"].", ".
			$row["postal"]."<br>Home: ".$row["homePhone"]." Cell: ".$row["cellPhone"]." Email: ".
			$row["email"]." Preffered: ".$row["PCMethod"]." Date: ".$row["dateForm"].", ".$row["findOKStaff"]."<br>".
			$row["mainExpertise"].", ".$row["roleInterest"].", ".$row["perfectCandidate"].", ".$row["salaryExpect"].", ".
			$row["employment"].", File Path: ".$row["filePath"].
			"<br>Job# ".$row["jobNum"]." Job: ".$row["jobName"]." Date: ".$row["jobDate"]." Type: ".$row["jobType"]."<br>";
		}
	} else {
		echo "0 results";
	}
}

//Function Tempory Selection
function TemporySelectTest($temp, $query){
	$tempResult = $temp->query($query);
	if($tempResult->num_rows > 0) {
		while($row = $tempResult->fetch_assoc()){
			echo "<br>IDapp: ".$row["applicationID"].", ID: ".$row["applicantID"]." Name: ".$row["firstName"]." ".$row["lastName"]."<br>".
					" Address: ".$row["street"].", ".$row["city"]." ".$row["province"].", ".
					$row["postal"]."<br>Home: ".$row["homePhone"]." Cell: ".$row["cellPhone"]." Email: ".
					$row["email"]." Preffered: ".$row["PCMethod"]." Date: ".$row["dateForm"].", ".$row["findOKStaff"]."<br>".
					"<br>Job# ".$row["jobNum"]." Job: ".$row["jobName"]." Date: ".$row["jobDate"]." Type: ".$row["jobType"].
					"<br>Citizen: ".$row["citizen"].", ".$row["legalWork"].", ".$row["crimeRecord"].", ".$row["yesWhat"].", ".$row["permission"].
					", ".$row["noWhy"].", ".$row["pastBonding"].", ".$row["eligibleBonding"].
					"<br>Work Type: ".$row["workType"]." Work Status: ".$row["employerStatus"].
					"<br>Education: ".$row["educationLevel"].", ".$row["student"].", ".$row["studyData"].", ".$row["language"].
					"<br>Expertise: ".$row["accountingEX"].", ".$row["administrative"].", ".$row["bookKeeping"].", ".$row["business"].", ".
					$row["construction"].", ".$row["customerService"].", ".$row["dataEntry"].", ".$row["engineering"].", ".$row["equipment"].", ".
					$row["foodService"].", ".$row["generalLabour"].", ".$row["healthSafety"].", ".$row["healthCare"].", ".$row["hospitality"].", ".
					$row["humanResources"].", ".$row["infoTechnology"].", ".$row["landscaping"].", ".$row["legalAssistant"].", ".$row["manufacture"].", ".
					$row["marketing"].", ".$row["management"].", ".$row["medical"].", ".$row["oilGas"].", ".$row["payrollEX"].", ".$row["projectM"].", ".
					$row["reception"].", ".$row["sales"].", ".$row["transport"].", ".$row["trades"].", ".$row["warehouse"].
					"<br>Skill Programs: ".$row["accounting"].", ".$row["banking"].", ".$row["CRManagement"].", ".
					$row["DBManagement"].", ".$row["designDraft"].", ".$row["healthCare"].", ".$row["spreadsheets"].", ".$row["payroll"].", ".
					$row["presentations"].", ".$row["PManagment"].", ".$row["publish"].", ".$row["transript"].", ".
					$row["wordProcess"].", ".$row["otherSkillP"].
					"<br>Money Skills: ".$row["payable"].", ".$row["receivable"].", ".$row["backups"].", ".$row["bankR"].", ".
					$row["collections"].", ".$row["deposits"].", ".$row["financial"].", ".$row["fullCycleAcc"].", ".$row["journal"].", ".
					$row["taxBusiness"].", ".$row["taxPersonal"].", ".$row["entities"].", ".$row["payrollBenefits"].", ".$row["trialBalances"].", ".
					$row["yearEndFin"].", ".$row["otherMoneySkill"].
					"<br>Other Skills: ".$row["MAssembly"].", ".$row["MConstruction"].", ".$row["MLine"].", ".
					$row["MPieceWork"].", ".$row["MPrinting"].", ".$row["MShipping"].", ".$row["MWarehouse"].", ".$row["EAKitting"].", ".
					$row["EAPCBoards"].", ".$row["TIQCAutomated"].", ".$row["TIQCManual"].", ".$row["TIQCFinal"].", ".$row["MADiscDrive"].", ".
					$row["MAMachineParts"].", ".$row["HCatering"].", ".$row["HBartending"].", ".$row["HHost"].", ".
					$row["HWaitstaff"].", ".$row["HCookChef"].", ".$row["certificates"].", ".$row["lifting"].", ".$row["driverLicense"].", ".$row["driveClass"].
					"<br>Cities: ".$row["armstrong"].", ".$row["enderby"].", ".$row["kamloops"].", ".$row["kelowna"].", ".$row["lakeCountry"].", ".
					$row["OKFalls"].", ".$row["oliver"].", ".$row["osoyoos"].", ".$row["oyama"].", ".$row["peachland"].", ".$row["penticton"].", ".
					$row["salmonArm"].", ".$row["sicamous"].", ".$row["summerland"].", ".$row["vernon"].", ".$row["westKelowna"].", ".
					$row["winfield"].", ".$row["otherCity"].
					"<br>Availability: ".$row["dayTimes"].", ".$row["partTimes"].", ".$row["fullTimes"].", ".$row["eveNweekends"].", ".	$row["monday"].", ".
					$row["tuesday"].", ".$row["wednesday"].", ".$row["thursday"].", ".$row["friday"].", ".$row["saturday"].", ".$row["sunday"].", ".
					$row["mainTransport"].", ".$row["notice"].", ".$row["hourlyRate"].
					"<br>References: ".$row["nameTitle1"].", ".$row["companyName1"].", ".$row["referenceEmail1"].", ".
					$row["referencePhone1"].", ".$row["nameTitle2"].", ".$row["companyName2"].", ".$row["referenceEmail2"].", ".$row["referencePhone2"].", ".
					$row["nameTitle3"].", ".$row["companyName3"].", ".$row["referenceEmail3"].", ".$row["referencePhone3"].", File Path: ".$row["filePath"];
		}
	} else {
		echo "0 results";
	}
}
//Table Creation Tests
tableTest($mysqli, $tableStaff, __LINE__); //4 Columns
tableTest($mysqli, $tableJobs, __LINE__); //5 Columns
tableTest($mysqli, $tablePersonal, __LINE__); //14 Columns
tableTest($mysqli, $tablePermanentData, __LINE__); //7 Columns
tableTest($mysqli, $tableCitizenOther, __LINE__); //15 Columns
tableTest($mysqli, $tableEducation, __LINE__); //5 Columns
tableTest($mysqli, $tableExpertise, __LINE__); //31 Columns
tableTest($mysqli, $tableSkillPrograms, __LINE__); //15 Columns
tableTest($mysqli, $tableMoneySkills, __LINE__); //17 Columns
tableTest($mysqli, $tableOtherSkills, __LINE__); //20 Columns
tableTest($mysqli, $tableCities, __LINE__); //19 Columns
tableTest($mysqli, $tableAvailability, __LINE__); //15 Columns
tableTest($mysqli, $tableApplicantReferences, __LINE__); //14 Columns
//Data Insertion Functions
$end = "');";
echo "<br>";

//Personal Insert Table
$personal['appnID'] = 0;
$personal['apptID'] = 0;
$personal['firstName'] = $_SESSION['fName'];
$personal['lastName'] = $_SESSION['lName'];
$personal['street'] = $_SESSION['address'];
$personal['city'] = $_SESSION['city'];
$personal['province'] = $_SESSION['province'];
$personal['postal'] = $_SESSION['postal'];
$personal['homePhone'] = $_SESSION['phone'];
$personal['cellPhone'] = $_SESSION['cellphone'];
$personal['email'] = $_SESSION['email'];
$personal['PCMethod'] = $_SESSION['contactMethod'];
$personal['dateForm'] = '';// Date variable, implement in database directly. 
$personal['findOKStaff'] = $_SESSION['howHear'];
$personalData = $personalInsertion.$personal['appnID'].','.$personal['apptID'].",'".$personal['firstName']."','".$personal['lastName']."','".
$personal['street']."','".$personal['city']."','".$personal['province']."','".$personal['postal']."','".$personal['homePhone']."','".
$personal['cellPhone']."','".$personal['email']."','".$personal['PCMethod']."',CURDATE(),'".$personal['findOKStaff'].$end;
tableInsert($mysqli, $personalData, __LINE__);

$applicationID_query = "SELECT applicantID FROM personal ORDER BY applicantID DESC LIMIT 1";
$result = mysqli_query($mysqli, $applicationID_query);
$row = mysqli_fetch_assoc($result);
$applicantID = $row["applicantID"];

//Jobs Insert Table
$jobs['apptID'] = $applicantID;
$jobs['job#'] = $_SESSION['jNumber'];
$jobs['name'] = $_SESSION['jName'];
$jobs['date'] = '2017/01/21';
$jobs['type'] = 'OT';
$jobsData = $jobsInsertion.$jobs['apptID'].', '.$jobs['job#'].",'".$jobs['name']."','".$jobs['date']."','".$jobs['type'].$end;
tableInsert($mysqli, $jobsData, __LINE__); 

//Permanent Table
$permanent['apptID'] = $applicantID;
$permanent['mainExpertise'] = $_SESSION['mainAreaExp'];
$permanent['roleInterest'] = $_SESSION['interestInRole'];
$permanent['perfectCandidate'] = $_SESSION['perfectCandidate'];
$permanent['salaryExpect'] = $_SESSION['expectations'];
$permanent['employment'] = $_SESSION['whySeekingWork'];
$permanent['filePath'] = $_SESSION['filePath'];
$permanentData = $permanentDataInsertion.$permanent['apptID'].",'".$permanent['mainExpertise']."','".$permanent['roleInterest']."','".
$permanent['perfectCandidate']."','".$permanent['salaryExpect']."','".$permanent['employment']."','".$permanent['filePath'].$end;
tableInsert($mysqli, $permanentData, __LINE__);

//appStaffData
$appStaffData = "insert into appStaffData(applicantID) values('".$applicantID."');";
$insert_appStaffData = mysqli_query($mysqli, $appStaffData);

$email= $_SESSION['email'];
$jobNum = $_SESSION['jNumber'];
$jobName = $_SESSION['jName'];
send_verification_application($applicantID, $jobNum, $email, $jobName);

//Remove this header to check the page. 
header("location:validate.php");

