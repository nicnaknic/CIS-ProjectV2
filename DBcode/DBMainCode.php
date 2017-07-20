<?php
//connect to database
$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
//connect other php file
include 'DBFunctionData.php';

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
//Staff Insert Table
$staff['firstName'] = 'Peter';
$staff['lastName'] = 'Rogers';
$staff['userName'] = 'DodoBird';
$staff['password'] = 'Mammoth';
$staffData = $staffInsertion."'".$staff['firstName']."','".$staff['lastName']."','".$staff['userName']."','".$staff['password'].$end; 
tableInsert($mysqli, $staffData, __LINE__); 
//Jobs Insert Table
$jobs['apptID'] = 21;
$jobs['job#'] = 2121;
$jobs['name'] = 'SQL & PHP Code';
$jobs['date'] = '2017/01/21';
$jobs['type'] = 'OT';
$jobsData = $jobsInsertion.$jobs['apptID'].', '.$jobs['job#'].",'".$jobs['name']."','".$jobs['date']."','".$jobs['type'].$end;
tableInsert($mysqli, $jobsData, __LINE__); 
//Personal Insert Table
$personal['appnID'] = 41;
$personal['apptID'] = 21;
$personal['firstName'] = 'Daniel';
$personal['lastName'] = 'Rozek';
$personal['street'] = '679 Pimlico Rd.';
$personal['city'] = 'Kelowna';
$personal['province'] = 'BC';
$personal['postal'] = 'V1W2Z6';
$personal['homePhone'] = '778-477-4721';
$personal['cellPhone'] = '250-870-0919';
$personal['email'] = 'drobpc@gmail.com';
$personal['PCMethod'] = 'cellphone';
$personal['dateForm'] = '2017/02/10';
$personal['findOKStaff'] = 'Online';
$personalData = $personalInsertion.$personal['appnID'].','.$personal['apptID'].",'".$personal['firstName']."','".$personal['lastName']."','".
$personal['street']."','".$personal['city']."','".$personal['province']."','".$personal['postal']."','".$personal['homePhone']."','".
$personal['cellPhone']."','".$personal['email']."','".$personal['PCMethod']."','".$personal['dateForm']."','".$personal['findOKStaff'].$end;
tableInsert($mysqli, $personalData, __LINE__);
//Permanent Table
$permanent['apptID'] = 21;
$permanent['mainExpertise'] = 'Programming, Organizing, Sorting, TKD';
$permanent['roleInterest'] = 'Programming';
$permanent['perfectCandidate'] = 'Computer Science Diploma';
$permanent['salaryExpect'] = '13$/hour';
$permanent['employment'] = 'C';
$permanent['filePath'] = 'dsad/sdsa/sdsd.ccc';
$permanentData = $permanentDataInsertion.$permanent['apptID'].",'".$permanent['mainExpertise']."','".$permanent['roleInterest']."','".
$permanent['perfectCandidate']."','".$permanent['salaryExpect']."','".$permanent['employment']."','".$permanent['filePath'].$end;
tableInsert($mysqli, $permanentData, __LINE__);
//CitizenOther Table
$citizenO['apptID'] = 21;
$citizenO['citizen'] = 'YES';
$citizenO['legalWork'] = 'YES';
$citizenO['crimeRecord'] = 'NO';
$citizenO['yesWhat'] = 'NO';
$citizenO['permission'] = 'YES';
$citizenO['noWhy'] = 'YES';
$citizenO['pastBonding'] = 'NO';
$citizenO['eligibleBonding'] = 'YES';
$citizenO['workType'] = 'OT';
$citizenO['employerStatus'] = 'Student';
$citizenOtherData = $citizenOtherInsertion.$citizenO['apptID'].",'".$citizenO['citizen']."','".$citizenO['legalWork']."','".$citizenO['crimeRecord']."','".
$citizenO['yesWhat']."','".$citizenO['permission']."','".$citizenO['noWhy']."','".$citizenO['pastBonding']."','".$citizenO['eligibleBonding']."','".
$citizenO['workType']."','".$citizenO['employerStatus'].$end;
tableInsert($mysqli, $citizenOtherData, __LINE__);
//Education Table
$education['apptID'] = 21;
$education['educationLevel'] = 'Computer Science Diploma';
$education['student'] = 'YES';
$education['studyData'] = 'Computer Science';
$education['language'] = 'English';
$educationData = $educationInsertion.$education['apptID'].",'".$education['educationLevel']."','".$education['student']."','".
$education['studyData']."','".$education['language'].$end;
tableInsert($mysqli, $educationData, __LINE__);
//Expertise Table
$expertise['apptID'] = 21;
$expertise['accountingEX'] = 'NO';
$expertise['administrative'] = 'NO';
$expertise['bookKeeping'] = 'NO';
$expertise['business'] = 'NO';
$expertise['construction'] = 'NO';
$expertise['customerService'] = 'NO';
$expertise['dataEntry'] = 'NO';
$expertise['engineering'] = 'NO';
$expertise['equipment'] = 'NO';
$expertise['foodService'] = 'NO';
$expertise['generalLabour'] = 'NO';
$expertise['healthSafety'] = 'NO';
$expertise['healthCare'] = 'NO';
$expertise['hospitality'] = 'NO';
$expertise['humanResources'] = 'NO';
$expertise['infoTechnology'] = 'NO';
$expertise['landscaping'] = 'NO';
$expertise['legalAssistant'] = 'NO';
$expertise['manufacture'] = 'NO';
$expertise['marketing'] = 'NO';
$expertise['management'] = 'NO';
$expertise['medical'] = 'NO';
$expertise['oilGas'] = 'NO';
$expertise['payrollEX'] = 'NO';
$expertise['projectM'] = 'NO';
$expertise['reception'] = 'NO';
$expertise['sales'] = 'NO';
$expertise['transport'] = 'NO';
$expertise['trades'] = 'NO';
$expertise['warehouse'] = 'NO';
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
$skillPrograms['apptID'] = 21;
$skillPrograms['accounting'] = 'NO';
$skillPrograms['banking'] = 'NO';
$skillPrograms['CRManagement'] = 'NO';
$skillPrograms['DBManagement'] = 'Heidi SQL';
$skillPrograms['designDraft'] = 'SketchUp';
$skillPrograms['healthCare'] = 'NO';
$skillPrograms['spreadsheets'] = 'Libre Office';
$skillPrograms['payroll'] = 'NO';
$skillPrograms['presentations'] = 'Libre Office';
$skillPrograms['PManagment'] = 'NO';
$skillPrograms['publish'] = 'NO';
$skillPrograms['transript'] = 'NO';
$skillPrograms['wordProcess'] = 'NO';
$skillPrograms['otherSkillP'] = 'Notepad++';
$skillProgramsData = $skillProgramsInsertion.$skillPrograms['apptID'].",'".$skillPrograms['accounting']."','".$skillPrograms['banking']."','".
$skillPrograms['CRManagement']."','".$skillPrograms['DBManagement']."','".$skillPrograms['designDraft']."','".$skillPrograms['healthCare']."','".
$skillPrograms['spreadsheets']."','".$skillPrograms['payroll']."','".$skillPrograms['presentations']."','".$skillPrograms['PManagment']."','".
$skillPrograms['publish']."','".$skillPrograms['transript']."','".$skillPrograms['wordProcess']."','".$skillPrograms['otherSkillP'].$end;
tableInsert($mysqli, $skillProgramsData, __LINE__);
//MoneySkills Table
$moneySkills['apptID'] = 21;
$moneySkills['payable'] = 'NO';
$moneySkills['receivable'] = 'NO';
$moneySkills['backups'] = 'NO';
$moneySkills['bankR'] = 'NO';
$moneySkills['collections'] = 'NO';
$moneySkills['deposits'] = 'NO';
$moneySkills['financial'] = 'NO';
$moneySkills['fullCycleAcc'] = 'NO';
$moneySkills['journal'] = 'NO';
$moneySkills['taxBusiness'] = 'NO';
$moneySkills['taxPersonal'] = 'NO';
$moneySkills['entities'] = 'NO';
$moneySkills['payrollBenefits'] = 'NO';
$moneySkills['trialBalances'] = 'NO';
$moneySkills['yearEndFin'] = 'NO';
$moneySkills['otherMoneySkill'] = 'NO';
$moneySkillsData = $moneySkillsInsertion.$moneySkills['apptID'].",'".$moneySkills['payable']."','".$moneySkills['receivable']."','".$moneySkills['backups']."','".
$moneySkills['bankR']."','".$moneySkills['collections']."','".$moneySkills['deposits']."','".$moneySkills['financial']."','".$moneySkills['fullCycleAcc']."','".
$moneySkills['journal']."','".$moneySkills['taxBusiness']."','".$moneySkills['taxPersonal']."','".$moneySkills['entities']."','".$moneySkills['payrollBenefits']."','".
$moneySkills['trialBalances']."','".$moneySkills['yearEndFin']."','".$moneySkills['otherMoneySkill'].$end;
tableInsert($mysqli, $moneySkillsData, __LINE__);
//Other Skills Table
$skills['apptID'] = 21;
$skills['MAssembly'] = 'NO';
$skills['MConstruction'] = 'NO';
$skills['MLine'] = 'NO';
$skills['MPieceWork'] = 'NO';
$skills['MPrinting'] = 'NO';
$skills['MShipping'] = 'NO';
$skills['MWarehouse'] = 'NO';
$skills['EAKitting'] = 'NO';
$skills['EAPCBoards'] = 'NO';
$skills['TIQCAutomated'] = 'NO';
$skills['TIQCManual'] = 'NO';
$skills['TIQCFinal'] = 'NO';
$skills['MADiscDrive'] = 'NO';
$skills['MAMachineParts'] = 'NO';
$skills['HCatering'] = 'NO';
$skills['HBartending'] = 'NO';
$skills['HHost'] = 'NO';
$skills['HWaitstaff'] = 'NO';
$skills['HCookChef'] = 'NO';
$skills['certificates'] = 'Food Safe Level 1';
$skills['lifting'] = 'YES';
$skills['driverLicense'] = 'NO';
$skills['driveClass'] = 'None';
$otherSkillsData = $otherSkillsInsertion.$skills['apptID'].",'".$skills['MAssembly']."','".$skills['MConstruction']."','".$skills['MLine']."','".
$skills['MPieceWork']."','".$skills['MPrinting']."','".$skills['MShipping']."','".$skills['MWarehouse']."','".$skills['EAKitting']."','".$skills['EAPCBoards']."','".
$skills['TIQCAutomated']."','".$skills['TIQCManual']."','".$skills['TIQCFinal']."','".$skills['MADiscDrive']."','".$skills['MAMachineParts']."','".
$skills['HCatering']."','".$skills['HBartending']."','".$skills['HHost']."','".$skills['HWaitstaff']."','".$skills['HCookChef']."','".
$skills['certificates']."','".$skills['lifting']."','".$skills['driverLicense']."','".$skills['driveClass'].$end;
tableInsert($mysqli, $otherSkillsData, __LINE__);
//Cities
$cities['apptID'] = 21;
$cities['armstrong'] = 'NO';
$cities['enderby'] = 'NO';
$cities['kamloops'] = 'NO';
$cities['kelowna'] = 'YES';
$cities['lakeCountry'] = 'YES';
$cities['OKFalls'] = 'NO';
$cities['oliver'] = 'NO';
$cities['osoyoos'] = 'NO';
$cities['oyama'] = 'NO';
$cities['peachland'] = 'NO';
$cities['penticton'] = 'NO';
$cities['salmonArm'] = 'NO';
$cities['sicamous'] = 'NO';
$cities['summerland'] = 'NO';
$cities['vernon'] = 'NO';
$cities['westKelowna'] = 'YES';
$cities['winfield'] = 'NO';
$cities['otherCity'] = 'NO';
$citiesData = $citiesInsertion.$cities['apptID'].",'".$cities['armstrong']."','".$cities['enderby']."','".$cities['kamloops']."','".$cities['kelowna']."','".
$cities['lakeCountry']."','".$cities['OKFalls']."','".$cities['oliver']."','".$cities['osoyoos']."','".$cities['oyama']."','".$cities['peachland']."','".$cities['penticton']."','".
$cities['salmonArm']."','".$cities['sicamous']."','".$cities['summerland']."','".$cities['vernon']."','".$cities['westKelowna']."','".$cities['winfield']."','".$cities['otherCity'].$end;
tableInsert($mysqli, $citiesData, __LINE__);
//Availability Table
$available['apptID'] = 21;
$available['dayTimes'] = 'NO';
$available['partTimes'] = 'YES';
$available['fullTimes'] = 'YES';
$available['eveNweekends'] = 'NO';
$available['monday'] = 'YES';
$available['tuesday'] = 'YES';
$available['wednesday'] = 'YES';
$available['thursday'] = 'YES';
$available['friday'] = 'YES';
$available['saturday'] = 'NO';
$available['sunday'] = 'NO';
$available['mainTransport'] = 'Bike/Bus';
$available['notice'] = 'Email';
$available['hourlyRate'] = '$13/hour';
$availablilityData = $availabilityInsertion.$available['apptID'].",'".$available['dayTimes']."','".$available['partTimes']."','".$available['fullTimes']."','".$available['eveNweekends']."','".
$available['monday']."','".$available['tuesday']."','".$available['wednesday']."','".$available['thursday']."','".$available['friday']."','".$available['saturday']."','".$available['sunday']."','".
$available['mainTransport']."','".$available['notice']."','".$available['hourlyRate'].$end;
tableInsert($mysqli, $availablilityData, __LINE__);
//ApplicantReferences
$references['apptID'] = 21;
$references['nameTitle1'] = 'Ken Chidlow';
$references['companyName1'] = 'OK College';
$references['referenceEmail1'] = 'ken@oc.com';
$references['referencePhone1'] = '255-255-2552';
$references['nameTitle2'] = 'Alan Kennedy';
$references['companyName2'] = 'OK College';
$references['referenceEmail2'] = 'alan@oc.com';
$references['referencePhone2'] = '250-250-2550';
$references['nameTitle3'] = 'Michael Saad';
$references['companyName3'] = 'OK College';
$references['referenceEmail3'] = 'msaad@oc.com';
$references['referencePhone3'] = '252-252-2222';
$references['filePath'] = 'adsf/sdf/dsafsd.dfd';
$applicantReferencesData = $applicantReferencesInsertion.$references['apptID'].",'".$references['nameTitle1']."','".$references['companyName1']."','".$references['referenceEmail1']."','".
$references['referencePhone1']."','".$references['nameTitle2']."','".$references['companyName2']."','".$references['referenceEmail2']."','".$references['referencePhone2']."','".
$references['nameTitle3']."','".$references['companyName3']."','".$references['referenceEmail3']."','".$references['referencePhone3']."','".$references['filePath'].$end;
tableInsert($mysqli, $applicantReferencesData, __LINE__);
//Staff Selection
StaffSelectTest($mysqli, $StaffSelection);
PermanentSelectTest($mysqli, $PermanentSelection);
TemporySelectTest($mysqli, $TemporySelection);
?>