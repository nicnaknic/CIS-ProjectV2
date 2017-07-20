<?php
session_start();
$mysqli = mysqli_connect("localhost", "OkStaff", "A11a11a11", "okstaff");
include 'DBFunctionDatabase.php';
include 'okstaff_functions.php';


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
$personal['dateForm'] = '';
$personal['findOKStaff'] = $_SESSION['howHear'];
$personalData = $personalInsertion.$personal['appnID'].','.$personal['apptID'].",'".$personal['firstName']."','".$personal['lastName']."','".
$personal['street']."','".$personal['city']."','".$personal['province']."','".$personal['postal']."','".$personal['homePhone']."','".
$personal['cellPhone']."','".$personal['email']."','".$personal['PCMethod']."',CURDATE(),'".$personal['findOKStaff'].$end;
tableInsert($mysqli, $personalData, __LINE__);

//Getting applicantID
$applicationID_query = "SELECT applicantID FROM personal ORDER BY applicantID DESC LIMIT 1";
$result = mysqli_query($mysqli, $applicationID_query);
$row = mysqli_fetch_assoc($result);
$applicantID = $row["applicantID"];

//CitizenOther Table
$citizenO['apptID'] = $applicantID;
$citizenO['citizen'] = $_SESSION['status1'];
$citizenO['legalWork'] = $_SESSION['status2'];
$citizenO['crimeRecord'] = $_SESSION['status3'];
$citizenO['yesWhat'] = $_SESSION['status3TB'];
$citizenO['permission'] = $_SESSION['status4'];
$citizenO['noWhy'] = $_SESSION['status4TB'];
$citizenO['pastBonding'] = $_SESSION['status5'];
$citizenO['eligibleBonding'] = $_SESSION['status6'];
$citizenO['workType'] = $_SESSION['typeOfWork'];
$citizenO['employerStatus'] = $_SESSION['empStatus'];
$citizenOtherData = $citizenOtherInsertion.$citizenO['apptID'].",'".$citizenO['citizen']."','".$citizenO['legalWork']."','".$citizenO['crimeRecord']."','".
$citizenO['yesWhat']."','".$citizenO['permission']."','".$citizenO['noWhy']."','".$citizenO['pastBonding']."','".$citizenO['eligibleBonding']."','".
$citizenO['workType']."','".$citizenO['employerStatus'].$end;
tableInsert($mysqli, $citizenOtherData, __LINE__); 
				
//Education Table
$education['apptID'] = $applicantID;
$education['educationLevel'] = $_SESSION['educationLevel'];
$education['student'] = $_SESSION['isStudent'];
$education['studyData'] = $_SESSION['careerGoals'];
$education['language'] = $_SESSION['profLanguages'];
$educationData = $educationInsertion.$education['apptID'].",'".$education['educationLevel']."','".$education['student']."','".
$education['studyData']."','".$education['language'].$end;
tableInsert($mysqli, $educationData, __LINE__);
						
//Jobs Insert Table
$jobs['apptID'] = $applicantID;
$jobs['job#'] = $_SESSION['jNumber'];
$jobs['name'] = $_SESSION['jName'];
$jobs['date'] = '2017/01/21';
$jobs['type'] = 'OT';
$jobsData = $jobsInsertion.$jobs['apptID'].', '.$jobs['job#'].",'".$jobs['name']."','".$jobs['date']."','".$jobs['type'].$end;
tableInsert($mysqli, $jobsData, __LINE__); 
						
//Expertise Table
$expertise['apptID'] = $applicantID;
$expertise['accountingEX'] = $_SESSION['accountingEx'];
$expertise['administrative'] = $_SESSION['administrative'];
$expertise['bookKeeping'] = $_SESSION['bookKeeping'];
$expertise['business'] = $_SESSION['business'];
$expertise['construction'] = $_SESSION['construction'];
$expertise['customerService'] = $_SESSION['customerService'];
$expertise['dataEntry'] = $_SESSION['dataEntry'];
$expertise['engineering'] = $_SESSION['engineering'];
$expertise['equipment'] = $_SESSION['equipment'];
$expertise['foodService'] = $_SESSION['foodServices'];
$expertise['generalLabour'] = $_SESSION['generalLabour'];
$expertise['healthSafety'] = $_SESSION['healthSafety'];
$expertise['healthCare'] = $_SESSION['healthcare'];
$expertise['hospitality'] = $_SESSION['hospitality'];
$expertise['humanResources'] = $_SESSION['humanResources'];
$expertise['infoTechnology'] = $_SESSION['infoTechnology'];
$expertise['landscaping'] = $_SESSION['landscaping'];
$expertise['legalAssistant'] = $_SESSION['legalAssistant'];
$expertise['manufacture'] = $_SESSION['manufacture'];
$expertise['marketing'] = $_SESSION['marketing'];
$expertise['management'] = $_SESSION['management'];
$expertise['medical'] = $_SESSION['medical'];
$expertise['oilGas'] = $_SESSION['oilGas'];
$expertise['payrollEX'] = $_SESSION['payrollEx'];
$expertise['projectM'] = $_SESSION['projectMan'];
$expertise['reception'] = $_SESSION['reception'];
$expertise['sales'] = $_SESSION['sales'];
$expertise['transport'] = $_SESSION['transport'];
$expertise['trades'] = $_SESSION['trades'];
$expertise['warehouse'] = $_SESSION['warehouse'];
$expertiseData = $expertiseInsertion.$expertise['apptID'].",'".$expertise['accountingEX']."','".$expertise['administrative']."','".
$expertise['bookKeeping']."','".$expertise['business']."','".$expertise['construction']."','".$expertise['customerService']."','".
$expertise['dataEntry']."','".$expertise['engineering']."','".$expertise['equipment']."','".$expertise['foodService']."','".
$expertise['generalLabour']."','".$expertise['healthSafety']."','".$expertise['healthCare']."','".$expertise['hospitality']."','".
$expertise['humanResources']."','".$expertise['infoTechnology']."','".$expertise['landscaping']."','".$expertise['legalAssistant']."','".
$expertise['manufacture']."','".$expertise['marketing']."','".$expertise['management']."','".$expertise['medical']."','".$expertise['oilGas']."','".
$expertise['payrollEX']."','".$expertise['projectM']."','".$expertise['reception']."','".$expertise['sales']."','".$expertise['transport']."','".
$expertise['trades']."','".$expertise['warehouse'].$end;
tableInsert($mysqli, $expertiseData, __LINE__);
								
								
//SkillPrograms Table
$skillPrograms['apptID'] = $applicantID;
$skillPrograms['accounting'] = $_SESSION['accounting'];
$skillPrograms['banking'] = $_SESSION['banking'];
$skillPrograms['CRManagement'] = $_SESSION['customerRelationshipM'];
$skillPrograms['DBManagement'] = $_SESSION['databaseM'];
$skillPrograms['designDraft'] = $_SESSION['designDrafting'];
$skillPrograms['healthCare'] = $_SESSION['healthcareSoft'];
$skillPrograms['spreadsheets'] = $_SESSION['spreadsheet'];
$skillPrograms['payroll'] = $_SESSION['payroll'];
$skillPrograms['presentations'] = $_SESSION['presentations'];
$skillPrograms['PManagment'] = $_SESSION['projectM'];
$skillPrograms['publish'] = $_SESSION['publishing'];
$skillPrograms['transript'] = $_SESSION['transcription'];
$skillPrograms['wordProcess'] = $_SESSION['wordProcessing'];
$skillPrograms['otherSkillP'] = $_SESSION['otherSoftware'];
$skillProgramsData = $skillProgramsInsertion.$skillPrograms['apptID'].",'".$skillPrograms['accounting']."','".$skillPrograms['banking']."','".
$skillPrograms['CRManagement']."','".$skillPrograms['DBManagement']."','".$skillPrograms['designDraft']."','".$skillPrograms['healthCare']."','".
$skillPrograms['spreadsheets']."','".$skillPrograms['payroll']."','".$skillPrograms['presentations']."','".$skillPrograms['PManagment']."','".
$skillPrograms['publish']."','".$skillPrograms['transript']."','".$skillPrograms['wordProcess']."','".$skillPrograms['otherSkillP'].$end;
tableInsert($mysqli, $skillProgramsData, __LINE__); 
			
								
//MoneySkills Table
$moneySkills['apptID'] = $applicantID;
$moneySkills['payable'] = $_SESSION['accountsPayable'];
$moneySkills['receivable'] = $_SESSION['accountsRecievable'];
$moneySkills['backups'] = $_SESSION['backupRecovery'];
$moneySkills['bankR'] = $_SESSION['bankReconciliation'];
$moneySkills['collections'] = $_SESSION['collections'];
$moneySkills['deposits'] = $_SESSION['deposites'];
$moneySkills['financial'] = $_SESSION['financialStatements'];
$moneySkills['fullCycleAcc'] = $_SESSION['fullAccCycle'];
$moneySkills['journal'] = $_SESSION['generalJournal'];
$moneySkills['taxBusiness'] = $_SESSION['incomeTaxReturns'];
$moneySkills['taxPersonal'] = $_SESSION['incomeTaxReturn'];
$moneySkills['entities'] = $_SESSION['multipleEntities'];
$moneySkills['payrollBenefits'] = $_SESSION['payrollBenefits'];
$moneySkills['trialBalances'] = $_SESSION['trialBalances'];
$moneySkills['yearEndFin'] = $_SESSION['yearEndFinancials'];
$moneySkills['otherMoneySkill'] = $_SESSION['otherMoneySkillTB'];
$moneySkillsData = $moneySkillsInsertion.$moneySkills['apptID'].",'".$moneySkills['payable']."','".$moneySkills['receivable']."','".$moneySkills['backups']."','".
$moneySkills['bankR']."','".$moneySkills['collections']."','".$moneySkills['deposits']."','".$moneySkills['financial']."','".$moneySkills['fullCycleAcc']."','".
$moneySkills['journal']."','".$moneySkills['taxBusiness']."','".$moneySkills['taxPersonal']."','".$moneySkills['entities']."','".$moneySkills['payrollBenefits']."','".
$moneySkills['trialBalances']."','".$moneySkills['yearEndFin']."','".$moneySkills['otherMoneySkill'].$end;
tableInsert($mysqli, $moneySkillsData, __LINE__);
												
//Other Skills Table
$skills['apptID'] = $applicantID;
$skills['MAssembly'] = $_SESSION['assembly'];
$skills['MConstruction'] = $_SESSION['construction'];
$skills['MLine'] = $_SESSION['line'];
$skills['MPieceWork'] = $_SESSION['piecework'];
$skills['MPrinting'] = $_SESSION['printing'];
$skills['MShipping'] = $_SESSION['shippingReceiving'];
$skills['MWarehouse'] = $_SESSION['warehouse'];
$skills['EAKitting'] = $_SESSION['kitting'];
$skills['EAPCBoards'] = $_SESSION['pcBoards'];
$skills['TIQCAutomated'] = $_SESSION['automated'];
$skills['TIQCManual'] = $_SESSION['manual'];
$skills['TIQCFinal'] = $_SESSION['final'];
$skills['MADiscDrive'] = $_SESSION['discDrive'];
$skills['MAMachineParts'] = $_SESSION['machineParts'];
$skills['HCatering'] = $_SESSION['catering'];
$skills['HBartending'] = $_SESSION['bartending'];
$skills['HHost'] = $_SESSION['host'];
$skills['HWaitstaff'] = $_SESSION['waitress'];
$skills['HCookChef'] = $_SESSION['cookChef'];
$skills['certificates'] = $_SESSION['certsTickets'];
$skills['lifting'] = $_SESSION['lift50'];
$skills['driverLicense'] = $_SESSION['licence'];
$skills['driveClass'] = $_SESSION['licenceClass'];
$otherSkillsData = $otherSkillsInsertion.$skills['apptID'].",'".$skills['MAssembly']."','".$skills['MConstruction']."','".$skills['MLine']."','".
$skills['MPieceWork']."','".$skills['MPrinting']."','".$skills['MShipping']."','".$skills['MWarehouse']."','".$skills['EAKitting']."','".$skills['EAPCBoards']."','".
$skills['TIQCAutomated']."','".$skills['TIQCManual']."','".$skills['TIQCFinal']."','".$skills['MADiscDrive']."','".$skills['MAMachineParts']."','".
$skills['HCatering']."','".$skills['HBartending']."','".$skills['HHost']."','".$skills['HWaitstaff']."','".$skills['HCookChef']."','".
$skills['certificates']."','".$skills['lifting']."','".$skills['driverLicense']."','".$skills['driveClass'].$end;
tableInsert($mysqli, $otherSkillsData, __LINE__);
														
//Cities
$cities['apptID'] = $applicantID;
$cities['armstrong'] = $_SESSION['armstrong'];
$cities['enderby'] = $_SESSION['enderby'];
$cities['kamloops'] = $_SESSION['kamloops'];
$cities['kelowna'] = $_SESSION['kelowna'];
$cities['lakeCountry'] = $_SESSION['lakeCountry'];
$cities['OKFalls'] = $_SESSION['okanaganFalls'];
$cities['oliver'] = $_SESSION['oliver'];
$cities['osoyoos'] = $_SESSION['osoyoos'];
$cities['oyama'] = $_SESSION['oyama'];
$cities['peachland'] =$_SESSION['peachland'];
$cities['penticton'] = $_SESSION['penticton'];
$cities['salmonArm'] = $_SESSION['salmonArm'];
$cities['sicamous'] = $_SESSION['sicamous'];
$cities['summerland'] = $_SESSION['summerland'];
$cities['vernon'] = $_SESSION['vernon'];
$cities['westKelowna'] = $_SESSION['westKelowna'];
$cities['winfield'] = $_SESSION['winfield'];
$cities['otherCity'] = $_SESSION['otherCitytxt1'];
$citiesData = $citiesInsertion.$cities['apptID'].",'".$cities['armstrong']."','".$cities['enderby']."','".$cities['kamloops']."','".$cities['kelowna']."','".
$cities['lakeCountry']."','".$cities['OKFalls']."','".$cities['oliver']."','".$cities['osoyoos']."','".$cities['oyama']."','".$cities['peachland']."','".$cities['penticton']."','".
$cities['salmonArm']."','".$cities['sicamous']."','".$cities['summerland']."','".$cities['vernon']."','".$cities['westKelowna']."','".$cities['winfield']."','".$cities['otherCity'].$end;
tableInsert($mysqli, $citiesData, __LINE__);
																					
//Availability Table
$available['apptID'] = $applicantID;
$available['monday'] = $_SESSION['availMon'];
$available['tuesday'] = $_SESSION['availTue'];
$available['wednesday'] = $_SESSION['availWed'];
$available['thursday'] = $_SESSION['availThu'];
$available['friday'] = $_SESSION['availFri'];
$available['saturday'] = $_SESSION['availSat'];
$available['sunday'] = $_SESSION['availSun'];
$available['mainTransport'] = $_SESSION['main_transport'];
$available['notice'] = $_SESSION['notice'];
$available['hourlyRate'] = $_SESSION['minWage'];
$available['availability'] = $_SESSION['availability'];
$availablilityData = $availabilityInsertion.$available['apptID'].",'".$available['monday']."','".$available['tuesday']."','".$available['wednesday']."','".$available['thursday']."','".
$available['friday']."','".$available['saturday']."','".$available['sunday']."','".$available['mainTransport']."','".$available['notice']."','".$available['hourlyRate']."','".$available['availability'].$end;
tableInsert($mysqli, $availablilityData, __LINE__);//ERROR HERE

//appStaffData
$appStaffData = "insert into appStaffData(applicantID) values('".$applicantID."');";
$insert_appStaffData = mysqli_query($mysqli, $appStaffData);

//ApplicantReferences
$references['apptID'] = $applicantID;
$references['nameTitle1'] = $_SESSION['nameTitle1'];
$references['companyName1'] = $_SESSION['companyName1'];
$references['referenceEmail1'] = $_SESSION['referenceEmail1'];
$references['referencePhone1'] = $_SESSION['referencePhone1'];
$references['nameTitle2'] =  $_SESSION['nameTitle2'];
$references['companyName2'] =  $_SESSION['companyName2'];
$references['referenceEmail2'] = $_SESSION['referenceEmail2'];
$references['referencePhone2'] = $_SESSION['referencePhone2'];
$references['nameTitle3'] = $_SESSION['nameTitle3'];
$references['companyName3'] = $_SESSION['companyName3'];
$references['referenceEmail3'] = $_SESSION['referenceEmail3'];
$references['referencePhone3'] = $_SESSION['referencePhone3'];
$references['filePath'] = $_SESSION['filePath'];
$applicantReferencesData = $applicantReferencesInsertion.$references['apptID'].",'".$references['nameTitle1']."','".$references['companyName1']."','".$references['referenceEmail1']."','".
$references['referencePhone1']."','".$references['nameTitle2']."','".$references['companyName2']."','".$references['referenceEmail2']."','".$references['referencePhone2']."','".
$references['nameTitle3']."','".$references['companyName3']."','".$references['referenceEmail3']."','".$references['referencePhone3']."','".$references['filePath'].$end;
tableInsert($mysqli, $applicantReferencesData, __LINE__);
echo '<br>applicantID: '.$applicantID;
echo '<br>FilePath: '.$_SESSION['filePath'];

$email= $_SESSION['email'];
$jobNum = $_SESSION['jNumber'];
$jobName = $_SESSION['jName'];
send_verification_application($applicantID, $jobNum, $email, $jobName);

header('location:validate.php');
?>