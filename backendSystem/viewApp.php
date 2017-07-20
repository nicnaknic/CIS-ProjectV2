<?php
session_start();
if($_SESSION['loginName'] == NULL){
	header("location: staffLogin.php");
}else{
// Make variables of input data:
$applicantID = $_GET['AppID'];


if(isset($_GET['submitStaffData'])){ //DO NOT CHANGE OR MOVE, SQL query for inserting tags or rating into the DB for staff use
  
    $mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
    $appTags = $mysqli->real_escape_string($_GET['appTags']);
    $sql = 'UPDATE appStaffData SET tags = \''.$appTags.'\', rating = \''.$_GET['appRating'].'\' WHERE applicantID = \''.$_GET['AppID'].'\';';
    $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
}


// Personal Variables
$firstName = "";
$lastName = "";
$street = "";
$city = "";
$province = "";
$postal = "";
$homePhone = "";
$cellPhone = "";
$email = "";
$PCMethod = "";
$dateForm = "";
$findOKStaff = "";

// Job variables
$jobNum = "";
$jobName = "";
$jobDate = "";
$jobType = "";

// Expertise Variables
$accountingEX = "";
$administrative = "";
$bookKeeping = "";
$business = "";
$construction = "";
$customerService = "";
$dataEntry = "";
$engineering = "";
$equipment = "";
$foodService = "";
$generalLabour = "";
$healthSafety = "";
$healthCare = "";
$hospitality = "";
$humanResources = "";
$infoTechnology = "";
$landscaping = "";
$legalAssistant = "";
$manufacture = "";
$marketing = "";
$management = "";
$medical = "";
$oilGas = "";
$payrollEX = "";
$projectM = "";
$reception = "";
$sales = "";
$transport = "";
$trades = "";
$warehouse = "";

// Software variables
$accounting = "";
$banking = "";
$CRManagement = "";
$DBManagement = "";
$designDraft = "";
$healthCareSoft = "";
$spreadsheets = "";
$payroll = "";
$presentations = "";
$PManagement = "";
$publish = "";
$transcript = "";
$wordProcess = "";
$otherSkillP = "";

// Accounting variables
$payable = "";
$receivable = "";
$backups = "";
$bankR = "";
$collections = "";
$deposits = "";
$financial = "";
$fullCycleAcc = "";
$journal = "";
$taxBusiness = "";
$taxPersonal = "";
$entities = "";
$payrollBenefits = "";
$trialBalances = "";
$yearEndFin = "";
$otherMoneySkill = "";

// Other skills variables
$MAssembly = "";
$MConstruction = "";
$MLine = "";
$MPieceWork = "";
$MPrinting = "";
$MShipping = "";
$MWarehouse = "";
$EAKitting = "";
$EAPCBoards = "";
$TIQCAutomated = "";
$TIQCManual = "";
$TIQCFinal = "";
$MADiscDrive = "";
$MAMachineParts = "";
$HCatering = "";
$Hbartending = "";
$HHost = "";
$HWaitstaff = "";
$HCookChef = "";
$certificates = "";
$lifting = "";
$driverLicense = "";
$driveClass = "";

// Education variables
$educationLevel = "";
$student = "";
$studyData = "";
$language = "";

// Citizen other information
$citizen = "";
$legalWork = "";
$crimeRecord = "";
$yesWhat = "";
$permission = "";
$noWhy = "";
$pastBonding = "";
$eligibleBonding = "";
$workType = "";
$employerStatus = "";

// Availability variables
$monday = "";
$tuesday = "";
$wednesday = "";
$thursday = "";
$friday = "";
$saturday = "";
$sunday = "";
$mainTransport = "";
$notice = "";
$hourlyRate = "";
$availability = "";

// Cities variables
$armstrong = "";
$enderby = "";
$kamloops = "";
$kelowna = "";
$lakeCountry = "";
$OKFalls = "";
$oliver = "";
$osoyoos = "";
$oyama = "";
$peachland = "";
$pentiction = "";
$salmonArm = "";
$sicamous = "";
$summerland = "";
$vernon = "";
$westKelowna = "";
$winfield = "";
$otherCity = "";

// References variables
$nameTitle1 = "";
$companyName1 = "";
$referenceEmail1 = "";
$referencePhone1 = "";
$nameTitle2 = "";
$companyName2 = "";
$referenceEmail2 = "";
$referencePhone2 = "";
$nameTitle3 = "";
$companyName3 = "";
$referenceEmail3 = "";
$referencePhone3 = "";

// The applicant ID:
$applicantID = $_GET['AppID'];

// Current page for proper redirection if applicant is chosen to be deleted
$page = "findApps.php";

//connect to database
$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");

// Grab and initialize personal data	
$sql = 'SELECT * FROM personal WHERE applicantID = ' . $applicantID. ';'; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];
	$street = $row['street'];
	$city = $row['city'];
	$province = $row['province'];
	$postal = $row['postal'];
	$homePhone = $row['homePhone'];
	$cellPhone = $row['cellPhone'];
	$email = $row['email'];
	$PCMethod = $row['PCMethod'];
	$dateForm = $row['dateForm'];
	$findOKStaff = $row['findOKStaff'];
}

// Grab and initialize the job data	
$sql = 'SELECT * FROM jobs WHERE applicantID = ' . $applicantID. ';'; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$jobNum = $row['jobNum'];
	$jobName = $row['jobName'];
	$jobDate = $row['jobDate'];
}
	
if($jobNum % 2 != 0){
	header("location: viewAppPerm.php?AppID=$applicantID");
}else{

// Grab and initialize expertise
$sql = 'SELECT * FROM expertise WHERE applicantID = ' . $applicantID. ';'; 
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$accountingEX = $row['accountingEX'];
	$administrative = $row['administrative'];
	$bookKeeping = $row['bookKeeping'];
	$business = $row['business'];
	$construction = $row['construction'];
	$customerService = $row['customerService'];
	$dataEntry = $row['dataEntry'];
	$engineering = $row['engineering'];
	$equipment = $row['equipment'];
	$foodService = $row['foodService'];
	$generalLabour = $row['generalLabour'];
	$healthSafety = $row['healthSafety'];
	$healthCare = $row['healthCare'];
	$hospitality = $row['hospitality'];
	$humanResources = $row['humanResources'];
	$infoTechnology = $row['infoTechnology'];
	$landscaping = $row['landscaping'];
	$legalAssistant = $row['legalAssistant'];
	$manufacture = $row['manufacture'];
	$marketing = $row['marketing'];
	$management = $row['management'];
	$medical = $row['medical'];
	$oilGas = $row['oilGas'];
	$payrollEX = $row['payrollEX'];
	$projectM = $row['projectM'];
	$reception = $row['reception'];
	$sales = $row['sales'];
	$transport = $row['transport'];
	$trades = $row['trades'];
	$warehouse = $row['warehouse'];
}

// Grab the software expertise
$sql = 'SELECT * FROM skillPrograms WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$accounting = $row['accounting'];
	$banking = $row['banking'];
	$CRManagement = $row['CRManagement'];
	$DBManagement = $row['DBManagement'];
	$designDraft = $row['designDraft'];
	$healthCareSoft = $row['healthCare'];
	$spreadsheets = $row['spreadsheets'];	
	$payroll = $row['payroll'];
	$presentations = $row['presentations'];
	$PManagement = $row['PManagment'];
	$publish = $row['publish'];	
	$transcript = $row['transript'];
	$wordProcess = $row['wordProcess'];
	$otherSkillP = $row['otherSkillP'];
}

// Grab the accounting skills
$sql = 'SELECT * FROM moneySkills WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$payable = $row['payable'];
	$receivable = $row['receivable'];
	$backups = $row['backups'];
	$bankR = $row['bankR'];
	$collections = $row['collections'];
	$deposits = $row['deposits'];
	$financial = $row['financial'];
	$fullCycleAcc = $row['fullCycleAcc'];
	$journal = $row['journal'];
	$taxBusiness = $row['taxBusiness'];
	$taxPersonal = $row['taxPersonal'];
	$entities = $row['entities'];
	$payrollBenefits = $row['payrollBenefits'];
	$trialBalances = $row['trialBalances'];
	$yearEndFin = $row['yearEndFin'];
	$otherMoneySkill = $row['otherMoneySkill'];
}

// Grab the other skills
$sql = 'SELECT * FROM otherSkills WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$MAssembly = $row['MAssembly'];
	$MConstruction = $row['MConstruction'];
	$MLine = $row['MLine'];
	$MPieceWork = $row['MPieceWork'];
	$MPrinting = $row['MPrinting'];
	$MShipping = $row['MShipping'];
	$MWarehouse = $row['MWarehouse'];
	$EAKitting = $row['EAKitting'];
	$EAPCBoards = $row['EAPCBoards'];
	$TIQCAutomated = $row['TIQCAutomated'];
	$TIQCManual = $row['TIQCManual'];
	$TIQCFinal = $row['TIQCFinal'];
	$MADiscDrive = $row['MADiscDrive'];
	$MAMachineParts = $row['MAMachineParts'];
	$HCatering = $row['HCatering'];
	$HBartending = $row['HBartending'];
	$HHost = $row['HHost'];
	$HWaitstaff = $row['HWaitstaff'];
	$HCookChef = $row['HCookChef'];
	$certificates = $row['certificates'];
	$lifting = $row['lifting'];
	$driverLicense = $row['driverLicense'];
	$driveClass = $row['driveClass'];
}

// Grab the education table
$sql = 'SELECT * FROM education WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$educationLevel = $row['educationLevel'];
	$student = $row['student'];
	$studyData = $row['studyData'];
	$language = $row['language'];
}

// Grab the citizen table
$sql = 'SELECT * FROM citizenOther WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$citizen = $row['citizen'];
	$legalWork = $row['legalWork'];
	$crimeRecord = $row['crimeRecord'];
	$yesWhat = $row['yesWhat'];
	$permission = $row['permission'];
	$noWhy = $row['noWhy'];
	$pastBonding = $row['pastBonding'];
	$eligibleBonding = $row['eligibleBonding'];
	$workType = $row['workType'];
	$employerStatus = $row['employerStatus'];
}

// Grab the availability table
$sql = 'SELECT * FROM availability WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$monday = $row['monday'];
	$tuesday = $row['tuesday'];
	$wednesday = $row['wednesday'];
	$thursday = $row['thursday'];
	$friday = $row['friday'];
	$saturday = $row['saturday'];
	$sunday = $row['sunday'];
	$mainTransport = $row['mainTransport'];
	$notice = $row['notice'];
	$hourlyRate = $row['hourlyRate'];
	$availability = $row['availability'];
}

// Grab the cities table
$sql = 'SELECT * FROM cities WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$armstrong = $row['armstrong'];
	$enderby = $row['enderby'];
	$kamloops = $row['kamloops'];
	$kelowna = $row['kelowna'];
	$lakeCountry = $row['lakeCountry'];
	$OKFalls = $row['OKFalls'];
	$oliver = $row['oliver'];
	$osoyoos = $row['osoyoos'];
	$oyama = $row['oyama'];
	$peachland = $row['peachland'];
	$penticton = $row['penticton'];
	$salmonArm = $row['salmonArm'];
	$sicamous = $row['sicamous'];
	$summerland = $row['summerland'];
	$vernon = $row['vernon'];
	$westKelowna = $row['westKelowna'];
	$winfield = $row['winfield'];
	$otherCity = $row['otherCity'];
}

// Grab the references table
$sql = 'SELECT * FROM applicantReferences WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
	$nameTitle1 = $row['nameTitle1'];
	$companyName1 = $row['companyName1'];
	$referenceEmail1 = $row['referenceEmail1'];
	$referencePhone1 = $row['referencePhone1'];
	$nameTitle2 = $row['nameTitle2'];
	$companyName2 = $row['companyName2'];
	$referenceEmail2 = $row['referenceEmail2'];
	$referencePhone2 = $row['referencePhone2'];
	$nameTitle3 = $row['nameTitle3'];
	$companyName3 = $row['companyName3'];
	$referenceEmail3 = $row['referenceEmail3'];
	$referencePhone3 = $row['referencePhone3'];
}

$sql = 'SELECT tags, rating FROM appStaffData WHERE applicantID = ' .$applicantID.';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
while ($row = mysqli_fetch_array($query)) {
    $tags = $row['tags'];
    $rating = $row['rating'];
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#222222">
    <title>View Applicant</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> <!--Included CSS Files-->
    <link href="../css/sticky-footer.css" rel="stylesheet">
    <style>/**Minor CSS changes that didnt need their own file**/       
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus { /*Change the color of navbar items on hover*/
            background-color: #EEEEEE;
        }
        h1{
            color: rgb(28, 158, 203);
        }
        .no-link{
            color: #337ab7;
        }
		.panel-margins{
			margin-bottom: 30px;
		}
        .head-mod{
            margin-top: 4px;
        }

        p{ font-size: 0.9em }
        .label-small{
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <!--=======================NAVBAR ELEMENTS DOWN BELOW, THIS IS THE DEFAULT NAV SYSTEM====================-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a style="margin-right: 10px;" class="navbar-brand active" href="http://www.okanaganstaffingapplicants.site/backendSystem/findApps.php">OKS Applicant System</a> <!--In the space after "back" and before the "!" add the name of who is signed in -->
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="findApps.php">Home</a></li>
                    <li><a href="manageStaff.php">Manage Staff Accounts</a></li>
                    <li><a href="delApps.php">Manage Old Applications&nbsp;</a></li>
					<li><a href="staffLogin.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<!--=========================================END NAVBAR SECTION===========================================-->

	<div class="container" style="margin-top: 90px;">
		<div class="page-header">
                <h1><strong>[#<?php echo $applicantID; ?>] <?php echo $firstName; ?> <?php echo $lastName; ?>: </strong><?php echo $jobName;?> [#<?php echo $jobNum;?>]</h1><!--Insert header values with appropriate search results: Name, Job ID and Job Name-->
        </div>
        <div class="panel panel-default panel-margins"><!--BASIC INFORMATION SECTION-->
			<div class="panel-heading">
				<strong  style="font-size: 18px;">Basic Information:</strong>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<p><strong>Home Phone Number:</strong> <?php echo $homePhone; ?></p><!--INSERT home phone here-->
						<p><strong>Cell Phone Number:</strong> <?php echo $cellPhone; ?></p><!--INSERT cell phone here-->
						<p><strong>Email Address:</strong> <?php echo $email; ?></p><!--INSERT email here-->
						<p><strong>Prefered Contact Method:</strong> <?php echo $PCMethod; ?></p><!--INSERT Prefered contact method here-->
					</div>
					<div class="col-sm-6">
						<p><strong>Home Address:</strong> <?php echo $street; ?>, <?php echo $city; ?> <?php echo $province; ?></p><!--INSERT address here-->
						<p><strong>Postal Code:</strong> <?php echo $postal; ?></p><!--INSERT postal code here-->
						<p><strong>How did you hear about Okanagan Staffing:</strong> <?php echo $findOKStaff; ?></p><!--INSERT how did u hear about us data here-->
					</div>
				</div>
			</div>
		</div>

        <div class="panel-group" id="accordion">
            <!--==========================================================================================================================================-->
            <!--AREA OF EXPERTISE-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="font-size: 18px;"><strong>Areas Of Expertise:</strong></a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <label>What are your areas of expertise?</label>
                                <?php 
								echo '<p>' .$accountingEX. '</p>';
								echo '<p>' .$administrative. '</p>';
								echo '<p>' .$bookKeeping. '</p>';
								echo '<p>' .$business. '</p>';
								echo '<p>' .$construction. '</p>';
								echo '<p>' .$customerService. '</p>';
								echo '<p>' .$dataEntry. '</p>';
								echo '<p>' .$engineering. '</p>';
								echo '<p>' .$equipment. '</p>';
								echo '<p>' .$foodService. '</p>';
								echo '<p>' .$generalLabour. '</p>';
								echo '<p>' .$healthSafety. '</p>';
								echo '<p>' .$healthCare. '</p>';
								echo '<p>' .$hospitality. '</p>';
								echo '<p>' .$humanResources. '</p>';
								echo '<p>' .$infoTechnology. '</p>';
								echo '<p>' .$landscaping. '</p>';
								echo '<p>' .$legalAssistant. '</p>';
								echo '<p>' .$manufacture. '</p>';
								echo '<p>' .$marketing. '</p>';
								echo '<p>' .$management. '</p>';
								echo '<p>' .$medical. '</p>';
								echo '<p>' .$oilGas. '</p>';
								echo '<p>' .$payrollEX. '</p>';
								echo '<p>' .$projectM. '</p>';
								echo '<p>' .$reception. '</p>';
								echo '<p>' .$sales. '</p>';
								echo '<p>' .$transport. '</p>';
								echo '<p>' .$trades. '</p>';
								echo '<p>' .$warehouse. '</p>';
								?>
                            </div>
                        </div><!--End Area of expertise row-->

                        <div class="page-header head-mod"></div>

                        <div class="row">
                            <div class="col-sm-7"><!--For this section, only display the Software list if condition if(dbReturnRsult != NULL). wrap this around each <p> tag-->
                                <label>Which software programs you are experienced and proficient in?</label>
                                <?php if ($accounting != null) echo '<p><strong>Accounting: </strong> '.$accounting.'</p>'; ?>
								<?php if ($banking != null) echo '<p><strong>Banking: </strong> '.$banking.'</p>'; ?>
								<?php if ($CRManagement != null) echo '<p><strong>Customer Relations: </strong> '.$CRManagement.'</p>'; ?>
								<?php if ($DBManagement != null) echo '<p><strong>Database Management: </strong> '.$DBManagement.'</p>'; ?>
								<?php if ($designDraft != null) echo '<p><strong>Design and Draft: </strong> '.$designDraft.'</p>'; ?>
								<?php if ($healthCareSoft != null) echo '<p><strong>Health Care: </strong> '.$healthCareSoft.'</p>'; ?>
								<?php if ($spreadsheets != null) echo '<p><strong>Spreadsheets: </strong> '.$spreadsheets.'</p>'; ?>
								<?php if ($payroll != null) echo '<p><strong>Payroll: </strong> '.$payroll.'</p>'; ?>
								<?php if ($presentations != null) echo '<p><strong>Presentations: </strong> '.$presentations.'</p>'; ?>
								<?php if ($PManagement != null) echo '<p><strong>Project Management: </strong> '.$PManagement.'</p>'; ?>
								<?php if ($publish != null) echo '<p><strong>Publish: </strong> '.$publish.'</p>'; ?>
								<?php if ($transcript != null) echo '<p><strong>Transcription: </strong> '.$transcript.'</p>'; ?>
								<?php if ($wordProcess != null) echo '<p><strong>Word Processing: </strong> '.$wordProcess.'</p>'; ?>
								<?php if ($otherSkillP != null) echo '<p><strong>Others: </strong> '.$otherSkillP.'</p>'; ?>
																							
                            </div><!--End col-sm-6 LEFT SIDE-->
                            <div class="col-sm-5">
                                <label>Which Accounting skills/functions are you experienced in?</label>
                                <p><?php echo $payable; ?></p>
                                <p><?php echo $receivable; ?></p>
								<p><?php echo $backups; ?></p>
                                <p><?php echo $bankR; ?></p>
								<p><?php echo $collections; ?></p>
                                <p><?php echo $deposits; ?></p>
								<p><?php echo $financial; ?></p>
                                <p><?php echo $fullCycleAcc; ?></p>
								<p><?php echo $journal; ?></p>
                                <p><?php echo $taxBusiness; ?></p>
								<p><?php echo $taxPersonal; ?></p>
                                <p><?php echo $entities; ?></p>
								<p><?php echo $payrollBenefits; ?></p>
                                <p><?php echo $trialBalances; ?></p>
								<p><?php echo $yearEndFin; ?></p>
                                <p><?php echo $otherMoneySkill; ?></p>							
                                <p></p>
                            </div><!--End col-sm-6 RIGHT SIDE-->
                        </div><!--END Row 2-->

                        <div class="page-header head-mod"></div>

                        <div class="row">
                            <div class="col-sm-7">
                                <label>Current Certificates/Tickets Completed:</label>
                                <p><?php echo $certificates; ?></p>
                                <label>Do you have a driver's licence?</label>
                                <p><?php echo $driverLicense?></p>
                                <p><?php echo $driveClass?></p>
                                <label>Are you capable of lifting over 50lbs?</label>
                                <p><?php echo $lifting; ?></p>
                            </div>
                            <div class="col-sm-5">
                                <label>Which Labour/Trade/Hospitality functions are you experienced in?</label>
                                <p><?php echo $MAssembly; ?></p>
                                <p><?php echo $MConstruction; ?></p>
								<p><?php echo $MLine; ?></p>
                                <p><?php echo $MPieceWork; ?></p>
								<p><?php echo $MPrinting; ?></p>
                                <p><?php echo $MShipping; ?></p>
								<p><?php echo $MWarehouse; ?></p>
                                <p><?php echo $EAKitting; ?></p>
								<p><?php echo $EAPCBoards; ?></p>
                                <p><?php echo $TIQCAutomated; ?></p>
								<p><?php echo $TIQCManual; ?></p>
                                <p><?php echo $TIQCFinal; ?></p>
								<p><?php echo $MADiscDrive; ?></p>
                                <p><?php echo $MAMachineParts; ?></p>
								<p><?php echo $HCatering; ?></p>
                                <p><?php echo $Hbartending; ?></p>
								<p><?php echo $HHost; ?></p>
                                <p><?php echo $HWaitstaff; ?></p>
								<p><?php echo $HCookChef; ?></p>
                                <p><?php echo $Hbartending; ?></p>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--==========================================================================================================================================-->
            <!--EDUCATION & EMPLOYMENT STATUS-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="font-size: 18px;"><strong>Education &amp; Employment Status:</strong></a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <label>What is your highest level of education you have completed?</label>
                                <p><?php echo $educationLevel; ?></p>
								<p><?php echo $studyData; ?></p>
                                <label>What Languages are you proficient in?</label>
                                <p><?php echo $language; ?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>Are you a student?</label>
                                <p><?php echo $student; ?></p>                            
                            </div>
                        </div>

                        <div class="page-header head-mod"></div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>What type of work are you mainly seeking</label>
                                <p><?php echo $workType; ?></p>
                            </div>
                            <div class="col-sm-6">
                                <label>What is your current employment status?</label>
                                <p><?php echo $employerStatus; ?></p>
                            </div>
                        </div>

                        <div class="page-header head-mod"></div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>What is your work status in Canada?</label></br>
                                <label class="label-small">Are you a Canadian Citizen?</label>
                                <p><?php echo $citizen; ?></p>
                                <label class="label-small">Are you legally entitled to work in Canada?</label>
                                <p><?php echo $legalWork; ?></p>
                                <label class="label-small">Have you ever been bonded?</label>
                                <p><?php echo $pastBonding; ?></p>
                                <label class="label-small">Are you eligible for bonding?</label>
                                <p><?php echo $eligibleBonding; ?></p>

                            </div>
                            <div class="col-sm-6">
                                </br><label class="label-small">Do you have a criminal record for which you have not recieved a pardon?</label>
                                <p><?php echo $crimeRecord; ?></p>
                                <p><?php echo $yesWhat; ?></p>
                                <label class="label-small">Would you give Okanagan Staffing Services permission to conduct a Criminal Record, should it be requested by a client?</label>
                                <p><?php echo $permission; ?></p>
                                <p><?php echo $noWhy; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--==========================================================================================================================================-->
            <!--AVAILABILITY AND LOGISTICS-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"  style="font-size: 18px;"><strong>Availability &amp; Logistics:</strong></a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        
                        <label>What is your current avaliability?</label>
                        <p><?php echo $availability;?></p>
                        <label>If your avaliability is more complex, please enter what hours you are avaliable:</label>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th><small>Monday</small></th>
                                    <th><small>Tuesday</small></th>
                                    <th><small>Wednesday</small></th>
                                    <th><small>Thursday</small></th>
                                    <th><small>Friday</small></th>
                                    <th><small>Saturday</small></th>
                                    <th><small>Sunday</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><small><?php echo $monday; ?></small></td><!--Concat the "start"/Finish times and store them in these table columns-->
                                    <td><small><?php echo $tuesday; ?></small></td>
                                    <td><small><?php echo $wednesday; ?></small></td>
                                    <td><small><?php echo $thursday; ?></small></td>
                                    <td><small><?php echo $friday; ?></small></td>
                                    <td><small><?php echo $saturday; ?></small></td>
                                    <td><small><?php echo $sunday; ?></small></td>
                                </tr>     
                            </tbody>
                        </table>
                        <label>How much notice do you require to be avaliable for job placement?</label>
                        <p><?php echo $notice; ?></p>
                        <label for="">What is your main mode of transportation?</label>
                        <p><?php echo $mainTransport; ?></p>

                        <div class="page-header head-mod"></div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Which Okanagan cities are you able and willing to work in?</label>
                                <p><?php echo $armstrong; ?></p>
                                <p><?php echo $enderby; ?></p>
								<p><?php echo $kamloops; ?></p>
								<p><?php echo $kelowna; ?></p>
								<p><?php echo $lakeCountry; ?></p>
								<p><?php echo $OKFalls; ?></p>
								<p><?php echo $oliver; ?></p>
								<p><?php echo $osoyoos; ?></p>
								<p><?php echo $oyama; ?></p>
								<p><?php echo $peachland; ?></p>
								<p><?php echo $penticton; ?></p>
								<p><?php echo $salmonArm; ?></p>
								<p><?php echo $sicamous; ?></p>
								<p><?php echo $summerland; ?></p>
								<p><?php echo $vernon; ?></p>
								<p><?php echo $westKelowna; ?></p>
								<p><?php echo $winfield; ?></p>
								<p><?php echo $otherCity; ?></p>																		
                            </div>
                            <div class="col-sm-6">
                                <label for="">What is the minimum hourly rate you are seeking?</label>
                                <p><?php echo $hourlyRate; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--==========================================================================================================================================-->
            <!--REFERENCES-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="font-size: 18px;"><strong>References: </strong></a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <label>If references are not included within your resume, please provide up to three employment references: </label>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th><small>Supervisor name &amp; title</small></th>
                                    <th><small>Company Name</small></th>
                                    <th><small>Email Address</small></th>
                                    <th><small>Phone Number</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><small><?php echo $nameTitle1; ?></small></td><!--Concat the "start"/Finish times and store them in these table columns-->
                                    <td><small><?php echo $companyName1; ?></small></td>
                                    <td><small><?php echo $referenceEmail1; ?></small></td>
                                    <td><small><?php echo $referencePhone1; ?></small></td>
                                </tr>
								<tr>
                                    <td><small><?php echo $nameTitle2; ?></small></td><!--Concat the "start"/Finish times and store them in these table columns-->
                                    <td><small><?php echo $companyName2; ?></small></td>
                                    <td><small><?php echo $referenceEmail2; ?></small></td>
                                    <td><small><?php echo $referencePhone2; ?></small></td>
                                </tr>     
								<tr>
                                    <td><small><?php echo $nameTitle3; ?></small></td><!--Concat the "start"/Finish times and store them in these table columns-->
                                    <td><small><?php echo $companyName3; ?></small></td>
                                    <td><small><?php echo $referenceEmail3; ?></small></td>
                                    <td><small><?php echo $referencePhone3; ?></small></td>
                                </tr>     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!--END ACCORDION DIV-->

        <label>Add Tags and/or give a rating (1-5)</label>
        <form action="viewApp.php" method="get">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-11">
                        <input type="text" maxlength="200" class="form-control" name="appTags" value="<?php echo $tags; ?>" placeholder="Insert tags with format ('accouting, management' etc)"><!--INSERT Db data into value field-->
                    </div>
                    <div class="col-sm-1">
                        <input type="number" min="1" max="5" class="form-control" name="appRating" value="<?php echo $rating; ?>"><!--INSERT Db data into value field-->
                    </div>
                </div>
            </div>
            <div class="row"><div class="col-sm-12"><div class="page-header head-mod"></div></div></div>
            <div class="pull-left" style="margin-top: 14px;">
                <input type="hidden" name="AppID" value='<?php echo $applicantID; ?>'>
                <button type="submit" name = "submitStaffData" value="set" maxlength="200" class="btn btn-primary" style="margin-right: 4px;"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;Save</button>
            </div>
        </form>
            



        <div class="pull-left">
            <form action="../download.php" method="POST">
				<input type="hidden" name="postFileName" value="<?php echo $firstName."-".$lastName; ?>">
				<input type="hidden" name="jobID" value='<?php echo $jobNum; ?>'>
				<input type="hidden" name="AppID" value='<?php echo $applicantID; ?>'>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp;&nbsp;Download Files</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delModal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;Delete</button>
            </form>
        </div>


	</div><!--END BODY CONTAINER ELEMENT-->



    <div class="modal fade" id="delModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong>Are you sure you wish to remove this applicant?</strong></h4>
				</div>
				<div class="modal-footer" style="margin-bottom: 0px;">
                    <form style="margin-bottom: 0px;" action="<?php if($jobNum % 2 == 0) { echo 'delApplicant.php'; } else { echo 'delApplicantPerm.php'; }?>" method="post">
                        <input type="hidden" name="applicantID" value="<?php echo $applicantID;?>"><!--Insert the Users ApplicantID in the value field-->
						<input type="hidden" name="page" value="<?php echo $page;?>"><!-- Page name to redirect back to this page when user is deleted -->
					    <button type="submit" name="delApplicant" class="btn btn-default">Confirm</button>
                    </form>
				</div>
			</div>
		</div>
    </div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--Required script references-->
    <script src="../js/bootstrap.min.js"></script>
</body> 

<?php  } } ?>