<?php
//Insertion Array Variables
$staff = array_fill_keys(array('firstName', 'lastName', 'userName', 'password'), '');
$jobs = array('apptID'=>0, 'job#'=>0, 'name'=>'', 'date'=>'', 'type'=>'');
$personal = array('appnID'=>0, 'apptID'=>0, 'firstName'=>'', 'lastName'=>'', 'address#'=>0, 'street'=>'', 'city'=>'', 
'province'=>'', 'postal'=>'', 'homePhone'=>'', 'cellPhone'=>'', 'email'=>'', 'PCMethod'=>'', 'dateForm'=>'', 'findOKStaff'=>'');
$permanent = array('apptID'=>0, 'mainExpertise'=>'', 'roleInterest'=>'', 'perfectCandidate'=>'', 
'salaryExpect'=>'', 'employment'=>'', 'filePath'=>'');
$citizenO = array('apptID'=>0, 'citizen'=>'', 'legalWork'=>'', 'crimeRecord'=>'', 'yesWhat'=>'', 'permission'=>'', 'noWhy'=>'', 'pastBonding'=>'', 
'eligibleBonding'=>'','employerStatus'=>'', 'workType'=>'');
$education = array('apptID'=>0, 'educationLevel'=>'', 'student'=>'', 'studyData'=>'', 'language'=>'');
$expertise = array('apptID'=>0, 'accountingEX'=>'', 'administrative'=>'', 'bookKeeping'=>'', 'business'=>'', 'construction'=>'', 
'customerService'=>'', 'dataEntry'=>'', 'engineering'=>'', 'equipment'=>'', 'foodService'=>'', 'generalLabour'=>'', 'healthSafety'=>'', 
'healthCare'=>'', 'hospitality'=>'', 'humanResources'=>'', 'infoTechnology'=>'', 'landscaping'=>'', 'legalAssistant'=>'', 'manufacture'=>'', 
'marketing'=>'', 'management'=>'', 'medical'=>'', 'oilGas'=>'', 'payrollEX'=>'', 'projectM'=>'', 'reception'=>'', 'sales'=>'', 'transport'=>'', 
'trades'=>'', 'warehouse'=>'');
$skillPrograms = array('apptID'=>0, 'accounting'=>'', 'banking'=>'', 'CRManagement'=>'', 'DBManagement'=>'', 'designDraft'=>'', 
'healthCare'=>'', 'spreadsheets'=>'', 'payroll'=>'', 'presentations'=>'', 'PManagment'=>'', 'publish'=>'', 'transript'=>'', 
'wordProcess'=>'', 'otherSkillP'=>'');
$moneySkills = array('apptID'=>0, 'payable'=>'', 'receivable'=>'', 'backups'=>'', 'bankR'=>'', 'collections'=>'', 'deposits'=>'', 
'financial'=>'', 'fullCycleAcc'=>'', 'journal'=>'', 'taxBusiness'=>'', 'taxPersonal'=>'', 'entities'=>'', 'payrollBenefits'=>'', 
'trialBalances'=>'', 'yearEndFin'=>'', 'otherMoneySkill'=>'');
$skills = array('apptID'=>0, 'MAssembly'=>'', 'MConstruction'=>'', 'MLine'=>'', 'MPieceWork'=>'', 'MPrinting'=>'', 'MShipping'=>'', 'MWarehouse'=>'', 
'EAKitting'=>'', 'EAPCBoards'=>'', 'TIQCAutomated'=>'', 'TIQCManual'=>'', 'TIQCFinal'=>'', 'MADiscDrive'=>'', 'MAMachineParts'=>'', 'HCatering'=>'', 
'HBartending'=>'', 'HHost'=>'', 'HWaitstaff'=>'', 'HCookChef'=>'', 'certificates'=>'', 'lifting'=>'', 'driverLicense'=>'', 'driveClass'=>'');
$cities = array('apptID'=>0, 'armstrong'=>'', 'enderby'=>'', 'kamloops'=>'', 'kelowna'=>'', 'lakeCountry'=>'', 'OKFalls'=>'', 'oliver'=>'', 'osoyoos'=>'', 
'oyama'=>'', 'peachland'=>'', 'penticton'=>'', 'salmonArm'=>'', 'sicamous'=>'', 'summerland'=>'', 'vernon'=>'', 'westKelowna'=>'', 'winfield'=>'', 'otherCity'=>'');
$available = array('apptID'=>0, 'dayTimes'=>'', 'partTimes'=>'', 'fullTimes'=>'', 'eveNweekends'=>'', 'monday'=>'', 'tuesday'=>'', 'wednesday'=>'', 
'thursday'=>'', 'friday'=>'', 'saturday'=>'', 'sunday'=>'', 'mainTransport'=>'', 'notice'=>'', 'hourlyRate'=>'');
$references = array('apptID'=>0, 'nameTitle1'=>'', 'companyName1'=>'', 'referenceEmail1'=>'', 'referencePhone1'=>'', 'nameTitle2'=>'', 'companyName2'=>'', 
'referenceEmail2'=>'', 'referencePhone2'=>'', 'nameTitle3'=>'', 'companyName3'=>'', 'referenceEmail3'=>'', 'referencePhone3'=>'', 'filePath'=>'');
//Table Creation Data
$tableStaff = "create table staff(
	firstName varchar(25),
	lastName varchar(25),
	passwords varchar(25),
	username varchar(25));";
$tableJobs = "create table jobs(
	applicantID int,
	jobNum int,
	jobName varchar(80),
	jobDate varchar(10),
	jobType varchar(25));";
$tablePersonal = "create table personal(
	applicationID int,
	applicantID int,
	firstName varchar(25),
	lastName varchar(25),
	street varchar(25),
	city varchar(25),
	province varchar(3),
	postal varchar(7),
	homePhone varchar(15),
	cellPhone varchar(15),
	email varchar(50),
	PCMethod varchar(15),
	dateForm varchar(10),
	findOKStaff varchar(50));";
$tablePermanentData = "create table permanentData(
	applicantID int,
	mainExpertise varchar(250),
	roleInterest varchar(250),
	perfectCandidate varchar(250),
	salaryExpect varchar(250),
	employment varchar(250),
	filePath varchar(100));";
$tableCitizenOther = "create table citizenOther(
	applicantID int,
	citizen varchar(3),
	legalWork varchar(3),
	crimeRecord varchar(3),
	yesWhat varchar(100),
	permission varchar(3),
	noWhy varchar(100),
	pastBonding varchar(3),
	eligibleBonding varchar(3),
	workType varchar(4),
	employerStatus varchar(50))";
$tableEducation = "create table education(
	applicantID int, 
	educationLevel varchar(250),
	student varchar(3),
	studyData varchar(250),
	language varchar(250));";
$tableExpertise = "create table expertise(
	applicantID int,
	accountingEX varchar(50),
	administrative varchar(50),
	bookKeeping varchar(50),
	business varchar(50),
	construction varchar(50),
	customerService varchar(50),
	dataEntry varchar(50),
	engineering varchar(50),
	equipment varchar(50),
	foodService varchar(50),
	generalLabour varchar(50),
	healthSafety varchar(50),
	healthCare varchar(50),
	hospitality varchar(50),
	humanResources varchar(50),
	infoTechnology varchar(50),
	landscaping varchar(50),
	legalAssistant varchar(50),
	manufacture varchar(50),
	marketing varchar(50),
	management varchar(50),
	medical varchar(50),
	oilGas varchar(50),
	payrollEX varchar(50),
	projectM varchar(50),
	reception varchar(50),
	sales varchar(50),
	transport varchar(50),
	trades varchar(50),
	warehouse varchar(50));";
$tableSkillPrograms = "create table skillPrograms(
	applicantID int,
	accounting varchar(100),
	banking varchar(100),
	CRManagement varchar(100),
	DBManagement varchar(100),
	designDraft varchar(100),
	healthCare varchar(100),
	spreadsheets varchar(100),
	payroll varchar(100),
	presentations varchar(100),
	PManagment varchar(100),
	publish varchar(100),
	transript varchar(100),
	wordProcess varchar(100),
	otherSkillP varchar(100));";
$tableMoneySkills = "create table moneySkills(
	applicantID int,
	payable varchar(40),
	receivable varchar(40),
	backups varchar(40),
	bankR varchar(40),
	collections varchar(40),
	deposits varchar(40),
	financial varchar(40),
	fullCycleAcc varchar(40),
	journal varchar(40),
	taxBusiness varchar(40),
	taxPersonal varchar(40),
	entities varchar(40),
	payrollBenefits varchar(40),
	trialBalances varchar(40),
	yearEndFin varchar(40),
	otherMoneySkill varchar(40));";
$tableOtherSkills = "create table otherSkills(
	applicantID int,
	MAssembly varchar(25),
	MConstruction varchar(25),
	MLine varchar(25),
	MPieceWork varchar(25),
	MPrinting varchar(25),
	MShipping varchar(25),
	MWarehouse varchar(25),
	EAKitting varchar(25),
	EAPCBoards varchar(25),
	TIQCAutomated varchar(25),
	TIQCManual varchar(25),
	TIQCFinal varchar(25),
	MADiscDrive varchar(25),
	MAMachineParts varchar(25),
	HCatering varchar(25),
	HBartending varchar(25),
	HHost varchar(25),
	HWaitstaff varchar(25),
	HCookChef varchar(25),
	certificates varchar(100),
	lifting varchar(3),
	driverLicense varchar(3),
	driveClass varchar(100));";
$tableCities = "create table cities(
	applicantID int,
	armstrong varchar(3),
	enderby varchar(3),
	kamloops varchar(3),
	kelowna varchar(3),
	lakeCountry varchar(3),
	OKFalls varchar(3),
	oliver varchar(3),
	osoyoos varchar(3),
	oyama varchar(3),
	peachland varchar(3),
	penticton varchar(3),
	salmonArm varchar(3),
	sicamous varchar(3),
	summerland varchar(3),
	vernon varchar(3),
	westKelowna varchar(3),
	winfield varchar(3),
	otherCity varchar(100));";
$tableAvailability = "create table availability(
	applicantID int,
	dayTimes varchar(5),
	partTimes varchar(5),
	fullTimes varchar(5),
	eveNweekends varchar(5),
	monday varchar(50),
	tuesday varchar(50),
	wednesday varchar(50),
	thursday varchar(50),
	friday varchar(50),
	saturday varchar(50),
	sunday varchar(50),
	mainTransport varchar(25),
	notice varchar(100),
	hourlyRate varchar(25));";	
$tableApplicantReferences = "create table applicantReferences(
	applicantID int,
	nameTitle1 varchar(50),
	companyName1 varchar(50),
	referenceEmail1 varchar(50),
	referencePhone1 varchar(50),
	nameTitle2 varchar(50),
	companyName2 varchar(50),
	referenceEmail2 varchar(50),
	referencePhone2 varchar(50),
	nameTitle3 varchar(50),
	companyName3 varchar(50),
	referenceEmail3 varchar(50),
	referencePhone3 varchar(50),
	filePath varchar(100));";
	
//Table Insertion Data
$staffInsertion = "insert into staff(firstName, lastName, passwords, username) values (";
$jobsInsertion = "insert into jobs(applicantID, jobNum, jobName, jobDate, jobType) values (";
$personalInsertion = "insert into personal(applicationID, applicantID, firstName, lastName, 
	street, city, province, postal, homePhone, cellPhone, email, PCMethod, dateForm, findOKStaff) values (";
$permanentDataInsertion = "insert into permanentData(applicantID, mainExpertise, roleInterest, perfectCandidate, 
	salaryExpect, employment, filePath) values (";
$citizenOtherInsertion = "insert into citizenOther(applicantID, citizen, legalWork, crimeRecord, yesWhat, permission, 
	noWhy, pastBonding, eligibleBonding, workType, employerStatus) values (";
$educationInsertion = "insert into education(applicantID, educationLevel, student, studyData, language) values (";
$expertiseInsertion = "insert into expertise(applicantID, accountingEX, administrative, bookKeeping, business, construction, 
	customerService, dataEntry, engineering, equipment, foodService, generalLabour, healthSafety, healthCare, hospitality, 
	humanResources, infoTechnology, landscaping, legalAssistant, manufacture, marketing, management, medical, oilGas, 
	payrollEX, projectM, reception, sales, transport, trades, warehouse) values (";
$skillProgramsInsertion = "insert into skillPrograms(applicantID, accounting, banking, CRManagement, DBManagement, 
	designDraft, healthCare, spreadsheets, payroll, presentations, PManagment, publish, transript, wordProcess, 
	otherSkillP) values (";
$moneySkillsInsertion = "insert into moneySkills(applicantID, payable, receivable, backups, bankR, collections, deposits, 
	financial, fullCycleAcc, journal, taxBusiness, taxPersonal, entities, payrollBenefits, trialBalances, yearEndFin, 
	otherMoneySkill) values (";
$otherSkillsInsertion = "insert into otherSkills(applicantID, MAssembly, MConstruction, MLine, MPieceWork, MPrinting, 
	MShipping, MWarehouse, EAKitting, EAPCBoards, TIQCAutomated, TIQCManual, TIQCFinal, MADiscDrive, MAMachineParts, 
	HCatering, HBartending, HHost, HWaitstaff, HCookChef, certificates, lifting, driverLicense, driveClass) values (";
$citiesInsertion = "insert into cities(applicantID, armstrong, enderby, kamloops, kelowna, 
	lakeCountry, OKFalls, oliver, osoyoos, oyama, peachland, penticton, salmonArm, sicamous, summerland, vernon, 
	westKelowna, winfield, otherCity) values (";
$availabilityInsertion = "insert into availability(applicantID, dayTimes, partTimes, fullTimes, eveNweekends, 
monday, tuesday, wednesday, thursday, friday, saturday, sunday, mainTransport, notice, hourlyRate) values (";
$applicantReferencesInsertion = "insert into applicantReferences(applicantID, nameTitle1, 
	companyName1, referenceEmail1, referencePhone1, nameTitle2, companyName2, referenceEmail2, 
	referencePhone2, nameTitle3, companyName3, referenceEmail3, referencePhone3, filePath) values (";
// Table Selection Data
$StaffSelection ="select s.firstName, s.lastName, s.passwords, distinct s.username 
	from staff s;";
$PermanentSelection = "select distinct p.applicationID, p.applicantID, p.firstName, p.lastName, 
	p.street, p.city, p.province, p.postal, p.homePhone, p.cellPhone, p.email, p.PCMethod, 
	p.dateForm, p.findOKStaff,
	pd.mainExpertise, pd.roleInterest, pd.perfectCandidate, pd.salaryExpect, 
	pd.employment, pd.filePath,
	j.jobNum, j.jobName, j.jobDate, j.jobType
	from personal p, permanentData pd, jobs j
	where p.applicantID = pd.applicantID
	and p.applicantID = j.applicantID
	and j.jobType = 'OP';";
$TemporySelection = "select distinct p.applicationID, p.applicantID, p.firstName, p.lastName, 
	p.street, p.city, p.province, p.postal, p.homePhone, p.cellPhone, p.email, p.PCMethod, p.dateForm, p.findOKStaff,
	j.jobNum, j.jobName, j.jobDate, j.jobType,
	co.citizen, co.legalWork, co.crimeRecord, co.yesWhat, co.permission, co.noWhy, co.pastBonding,
	co.eligibleBonding, co.workType, co.employerStatus, 
	ed.educationLevel, ed.student, ed.studyData, ed.language,
	ex.accountingEX, ex.administrative, ex.bookKeeping, ex.business, ex.construction, ex.customerService, ex.dataEntry, 
	ex.engineering, ex.equipment, ex.foodService, ex.generalLabour, ex.healthSafety, ex.healthCare, ex.hospitality, 
	ex.humanResources, ex.infoTechnology, ex.landscaping, ex.legalAssistant, ex.manufacture, ex.marketing, ex.management, 
	ex.medical, ex.oilGas, ex.payrollEX, ex.projectM, ex.reception, ex.sales, ex.transport, ex.trades, ex.warehouse, 
	sp.accounting, sp.banking, sp.CRManagement, sp.DBManagement, sp.designDraft, sp.healthCare, sp.spreadsheets, 
	sp.payroll, sp.presentations, sp.PManagment, sp.publish, sp.transript, sp.wordProcess, sp.otherSkillP,
	ms.payable, ms.receivable, ms.backups, ms.bankR, ms.collections, ms.deposits, ms.financial, ms.fullCycleAcc, 
	ms.journal, ms.taxBusiness, ms.taxPersonal, ms.entities, ms.payrollBenefits, ms.trialBalances, 
	ms.yearEndFin, ms.otherMoneySkill,
	os.MAssembly, os.MConstruction, os.MLine, os.MPieceWork, os.MPrinting, os.MShipping, os.MWarehouse, os.EAKitting, 
	os.EAPCBoards, os.TIQCAutomated, os.TIQCManual, os.TIQCFinal, os.MADiscDrive, os.MAMachineParts, os.HCatering, 
	os.HBartending, os.HHost, os.HWaitstaff, os.HCookChef, os.certificates, os.lifting, os.driverLicense, os.driveClass,
	c.armstrong, c.enderby, c.kamloops, c.kelowna, c.lakeCountry, c.OKFalls, c.oliver, c.osoyoos, c.oyama, c.peachland,
	c.penticton, c.salmonArm, c.sicamous, c.summerland, c.vernon, c.westKelowna, c.winfield, c.otherCity,
	a.dayTimes, a.partTimes, a.fullTimes, a.eveNweekends, a.monday, a.tuesday, a.wednesday, a.thursday,
	a.friday, a.saturday, a.sunday, a.mainTransport, a.notice, a.hourlyRate,
	ar.nameTitle1, ar.companyName1, ar.referenceEmail1, ar.referencePhone1, 
	ar.nameTitle2, ar.companyName2, ar.referenceEmail2, ar.referencePhone2, 
	ar.nameTitle3, ar.companyName3, ar.referenceEmail3, ar.referencePhone3, ar.filePath
	from jobs j, personal p, citizenOther co, education ed, expertise ex, skillPrograms sp, moneySkills ms, 
	otherSkills os, cities c, availability a, ApplicantReferences ar
	where p.applicantID = j.applicantID
	and p.applicantID = co.applicantID
	and p.applicantID = ed.applicantID
	and p.applicantID = ex.applicantID
	and p.applicantID = sp.applicantID
	and p.applicantID = ms.applicantID
	and p.applicantID = os.applicantID
	and p.applicantID = c.applicantID
	and p.applicantID = a.applicantID
	and p.applicantID = ar.applicantID
	and j.jobType <> 'OP';";
?>