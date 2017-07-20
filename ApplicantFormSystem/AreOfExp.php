<?php
session_start();

//AREAS OF EXPERTISE
if(isset($_POST['accountingEx']))
$_SESSION['accountingEx'] = $_POST['accountingEx'];
else
	$_SESSION['accountingEx'] = "";

if(isset($_POST['administrative']))
$_SESSION['administrative'] = $_POST['administrative'];
else
	$_SESSION['administrative'] = "";

if(isset($_POST['bookKeeping']))
$_SESSION['bookKeeping'] = $_POST['bookKeeping'];
else
	$_SESSION['bookKeeping'] = "";

	
if(isset($_POST['business']))
$_SESSION['business'] = $_POST['business'];
else
	$_SESSION['business'] = "";

if(isset($_POST['construction']))
$_SESSION['construction'] = $_POST['construction'];
else
	$_SESSION['construction'] = "";

if(isset($_POST['customerService']))
$_SESSION['customerService'] = $_POST['customerService'];
else
	$_SESSION['customerService'] = "";

if(isset($_POST['dataEntry']))
$_SESSION['dataEntry'] = $_POST['dataEntry'];
else
	$_SESSION['dataEntry'] = "";

if(isset($_POST['engineering']))
$_SESSION['engineering']= $_POST['engineering'];
else
	$_SESSION['engineering'] = "";

if(isset($_POST['equipment']))
$_SESSION['equipment'] = $_POST['equipment'];
else
	$_SESSION['equipment'] = "";

	
if(isset($_POST['foodServices']))
$_SESSION['foodServices'] = $_POST['foodServices'];
else
	$_SESSION['foodServices'] = "";

	
if(isset($_POST['generalLabour']))
$_SESSION['generalLabour'] = $_POST['generalLabour'];
else
	$_SESSION['generalLabour'] = "";

	
if(isset($_POST['healthSafety']))
$_SESSION['healthSafety'] = $_POST['healthSafety'];
else
	$_SESSION['healthSafety'] = "";

if(isset($_POST['healthcare']))
$_SESSION['healthcare'] = $_POST['healthcare'];
else
	$_SESSION['healthcare'] = "";

if(isset($_POST['hospitality']))
$_SESSION['hospitality'] = $_POST['hospitality'];
else
	$_SESSION['hospitality'] = "";

if(isset($_POST['humanResources']))
$_SESSION['humanResources'] = $_POST['humanResources'];
else
	$_SESSION['humanResources'] = "";

if(isset($_POST['infoTechnology']))
$_SESSION['infoTechnology'] = $_POST['infoTechnology'];
else
	$_SESSION['infoTechnology'] = "";

if(isset($_POST['landscaping']))
$_SESSION['landscaping'] = $_POST['landscaping'];
else
	$_SESSION['landscaping'] = "";

if(isset($_POST['legalAssistant']))
$_SESSION['legalAssistant'] = $_POST['legalAssistant'];
else
	$_SESSION['legalAssistant'] = "";

if(isset($_POST['manufacture']))
$_SESSION['manufacture'] = $_POST['manufacture'];
else
	$_SESSION['manufacture'] = "";

if(isset($_POST['marketing']))
$_SESSION['marketing']= $_POST['marketing'];
else
	$_SESSION['marketing'] = "";

if(isset($_POST['management']))
$_SESSION['management']= $_POST['management'];
else
	$_SESSION['management'] = "";

if(isset($_POST['medical']))
$_SESSION['medical'] = $_POST['medical'];
else
	$_SESSION['medical'] = "";

if(isset($_POST['oilGas']))
$_SESSION['oilGas'] = $_POST['oilGas'];
else
	$_SESSION['oilGas'] = "";

if(isset($_POST['payrollEx']))
$_SESSION['payrollEx'] = $_POST['payrollEx'];
else
	$_SESSION['payrollEx'] = "";

if(isset($_POST['projectMan']))
$_SESSION['projectMan'] = $_POST['projectMan'];
else
	$_SESSION['projectMan'] = "";

if(isset($_POST['reception']))
$_SESSION['reception'] = $_POST['reception'];
else
	$_SESSION['reception'] = "";

if(isset($_POST['retail']))
$_SESSION['retail'] = $_POST['retail'];
else
	$_SESSION['retail'] = "";

if(isset($_POST['sales']))
$_SESSION['sales'] = $_POST['sales'];
else
	$_SESSION['sales'] = "";

if(isset($_POST['transport']))
$_SESSION['transport'] = $_POST['transport'];
else
	$_SESSION['transport'] = "";

if(isset($_POST['trades']))
$_SESSION['trades'] = $_POST['trades'];
else
	$_SESSION['trades'] = "";

if(isset($_POST['warehouse']))
	$_SESSION['warehouse'] = $_POST['warehouse'];
else
	$_SESSION['warehouse'] = "";

	
//SOFTWARE EXPERIENCE/PROFICIENCY
if("" == trim($_POST['accounting']))
	$_SESSION['accounting'] = "";
else
	$_SESSION['accounting'] = $_POST['accounting'];
	
if("" == trim($_POST['banking']))
	$_SESSION['banking'] = "";
else
	$_SESSION['banking'] = $_POST['banking'];
		
if("" == trim($_POST['customerRelationshipM']))
	$_SESSION['customerRelationshipM'] = "";
else
	$_SESSION['customerRelationshipM'] = $_POST['customerRelationshipM'];

if("" == trim($_POST['databaseM']))
	$_SESSION['databaseM'] = "";
else
	$_SESSION['databaseM'] = $_POST['databaseM'];

if("" == trim($_POST['wordProcessing']))
	$_SESSION['wordProcessing'] = "";
else
	$_SESSION['wordProcessing'] = $_POST['wordProcessing'];
		
if("" == trim($_POST['designDrafting']))
	$_SESSION['designDrafting'] = "";
else
	$_SESSION['designDrafting'] = $_POST['designDrafting'];
			
if("" == trim($_POST['healthcareSoft']))
	$_SESSION['healthcareSoft'] = "";
else
	$_SESSION['healthcareSoft'] = $_POST['healthcareSoft'];

if("" == trim($_POST['spreadsheet']))
	$_SESSION['spreadsheet'] = "";
else
	$_SESSION['spreadsheet'] = $_POST['spreadsheet'];

if("" == trim($_POST['payroll']))
	$_SESSION['payroll'] = "";
else
	$_SESSION['payroll'] = $_POST['payroll'];
	
if("" == trim($_POST['otherSoftware']))
	$_SESSION['otherSoftware'] = "";
else
	$_SESSION['otherSoftware'] = $_POST['otherSoftware'];

if("" == trim($_POST['presentations']))
	$_SESSION['presentations'] = "";
else
	$_SESSION['presentations'] = $_POST['presentations'];
	
if("" == trim($_POST['projectM']))
	$_SESSION['projectM'] = "";//here
else
	$_SESSION['projectM'] = $_POST['projectM'];
	
if("" == trim($_POST['publishing']))
	$_SESSION['publishing'] = "";
else
	$_SESSION['publishing'] = $_POST['publishing'];

if("" == trim($_POST['transcription']))
	$_SESSION['transcription'] = "";
else
	$_SESSION['transcription'] = $_POST['transcription'];

//ACCOUNTING SKILLS/FUNCTIONS
if(isset($_POST['accountsPayable']))
	$_SESSION['accountsPayable'] = $_POST['accountsPayable'];
else 
	$_SESSION['accountsPayable'] = "";

if(isset($_POST['accountsPayable']))
	$_SESSION['accountsRecievable'] = $_POST['accountsRecievable'];
else 
	$_SESSION['accountsRecievable'] = "";
	
if(isset($_POST['backupRecovery']))
	$_SESSION['backupRecovery'] = $_POST['backupRecovery'];
else 
	$_SESSION['backupRecovery'] = "";

if(isset($_POST['bankReconciliation']))
	$_SESSION['bankReconciliation'] = $_POST['bankReconciliation'];
else
	$_SESSION['bankReconciliation'] = "";

if(isset($_POST['collections']))
	$_SESSION['collections'] = $_POST['collections'];
else
	$_SESSION['collections'] = "";
	
if(isset($_POST['deposites']))
	$_SESSION['deposites'] = $_POST['deposites'];
else
	$_SESSION['deposites'] = "";

if(isset($_POST['financialStatements']))
	$_SESSION['financialStatements'] = $_POST['financialStatements'];
else
	$_SESSION['financialStatements'] = "";

if(isset($_POST['fullAccCycle']))
	$_SESSION['fullAccCycle'] = $_POST['fullAccCycle'];
else
	$_SESSION['fullAccCycle'] = "";

if(isset($_POST['generalJournal']))
	$_SESSION['generalJournal'] = $_POST['generalJournal'];
else
	$_SESSION['generalJournal'] = "";

if(isset($_POST['incomeTaxReturns']))
	$_SESSION['incomeTaxReturns'] = $_POST['incomeTaxReturns'];
else
	$_SESSION['incomeTaxReturns'] = "";

if(isset($_POST['incomeTaxReturn']))
	$_SESSION['incomeTaxReturn'] = $_POST['incomeTaxReturn'];
else
	$_SESSION['incomeTaxReturn'] = "";

if(isset($_POST['multipleEntities']))
	$_SESSION['multipleEntities'] = $_POST['multipleEntities'];
else
	$_SESSION['multipleEntities'] = "";
	
if(isset($_POST['payrollBenefits']))
	$_SESSION['payrollBenefits'] = $_POST['payrollBenefits'];
else
	$_SESSION['payrollBenefits'] = "";
	
if(isset($_POST['trialBalances']))
	$_SESSION['trialBalances'] = $_POST['trialBalances'];
else
	$_SESSION['trialBalances'] = "";
	
if(isset($_POST['yearEndFinancials']))
	$_SESSION['yearEndFinancials'] = $_POST['yearEndFinancials'];
else
	$_SESSION['yearEndFinancials'] = "";

if(isset($_POST['otherMoneySkillCB']))
	$_SESSION['otherMoneySkillTB'] = $_POST['otherMoneySkillTB'];
else 
	$_SESSION['otherMoneySkillTB'] = "";

//lABOUR/TRADE/HOSPITALITY SKILLS/FUNCTIONS
	
	//HOSPITALITY
	if(isset($_POST['catering']))
	$_SESSION['catering'] = $_POST['catering'];
	else
		$_SESSION['catering'] = "";
	
	if(isset($_POST['bartending']))
	$_SESSION['bartending'] = $_POST['bartending'];
	else
		$_SESSION['bartending'] = "";
	
	if(isset($_POST['host']))
	$_SESSION['host'] = $_POST['host'];
	else
		$_SESSION['host'] = "";
	
	if(isset($_POST['waitress']))	
	$_SESSION['waitress'] = $_POST['waitress'];
	else
		$_SESSION['waitress'] = "";
	
	if(isset($_POST['cookChef']))
	$_SESSION['cookChef'] = $_POST['cookChef'];
	else
		$_SESSION['cookChef'] = "";
	
	//MANUFACTURING
	if(isset($_POST['assembly']))
	$_SESSION['assembly'] = $_POST['assembly'];
	else
		$_SESSION['assembly'] = "";
	
	if(isset($_POST['construction']))
	$_SESSION['construction'] = $_POST['construction'];
	else
		$_SESSION['construction'] = "";
	
	if(isset($_POST['line']))
	$_SESSION['line'] = $_POST['line'];
	else
		$_SESSION['line'] = "";
	
	if(isset($_POST['piecework']))
	$_SESSION['piecework'] = $_POST['piecework'];
	else
		$_SESSION['piecework'] = "";
	
	if(isset($_POST['printing']))
	$_SESSION['printing'] = $_POST['printing'];
	else
		$_SESSION['printing'] = "";
	
	if(isset($_POST['shippingReceiving']))
	$_SESSION['shippingReceiving'] = $_POST['shippingReceiving'];
	else
		$_SESSION['shippingReceiving'] = "";
	
	if(isset($_POST['warehouse']))
	$_SESSION['warehouse'] = $_POST['warehouse'];
	else
		$_SESSION['warehouse'] = "";
	
	
	//MECHANICAL ASSEMBLY
	if(isset($_POST['machineParts']))
	$_SESSION['machineParts'] = $_POST['machineParts'];
	else
		$_SESSION['machineParts'] = "";
	
	if(isset($_POST['discDrive']))
	$_SESSION['discDrive'] = $_POST['discDrive'];
	else
		$_SESSION['discDrive'] = "";
	
	//ELECTRONIC ASSEMBLY
	if(isset($_POST['kitting']))
	$_SESSION['kitting'] = $_POST['kitting'];
	else
		$_SESSION['kitting'] = "";
	
	if(isset($_POST['pcBoards']))
	$_SESSION['pcBoards'] = $_POST['pcBoards'];
	else
		$_SESSION['pcBoards'] = "";
	
	//TESTING
	if(isset($_POST['automated']))
	$_SESSION['automated'] = $_POST['automated'];
	else
		$_SESSION['automated'] = "";
	
	
	if(isset($_POST['manual']))
	$_SESSION['manual'] = $_POST['manual'];
	else
		$_SESSION['manual'] = "";
	
	if(isset($_POST['final']))
	$_SESSION['final'] = $_POST['final'];
	else
		$_SESSION['final'] = "";
	
//CERTIFICATES/TICKETS COMPLETED
$_SESSION['certsTickets'] = $_POST['certsTickets'];

//DRIVERS LICENCE
$_SESSION['licence'] = $_POST['licence'];
if($_SESSION['licence'] == 'yes')
	$_SESSION['licenceClass'] = $_POST['licenceClass'];
else
	$_SESSION['licenceClass'] = '';

//CAPABLE TO LIFT 50LBS
$_SESSION['lift50'] = $_POST['lift50'];

header('location:availLog.html');	
?>