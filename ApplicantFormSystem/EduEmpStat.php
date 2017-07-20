<?php
session_start();

$_SESSION['isStudent'] = $_POST['isStudent'];

if($_SESSION['isStudent']=='yes')
	$_SESSION['careerGoals'] = $_POST['careerGoals']; 
else 
	$_SESSION['careerGoals'] ='';

if(!($_POST['profLanguages'] == ''))
	$_SESSION['profLanguages'] = $_POST['profLanguages'];
else
	$_SESSION['profLanguages'] = '';

$_SESSION['empStatus'] = $_POST['empStat'];
$_SESSION['educationLevel'] = $_POST['educationLevel'];
$_SESSION['typeOfWork'] = $_POST['opt1'];
$_SESSION['status1'] = $_POST['status1'];
$_SESSION['status2'] = $_POST['status2']; 
$_SESSION['status3'] = $_POST['status3']; 

if($_POST['status3'] == 'yes')
	$_SESSION['status3TB'] = $_POST['status3TB'];
else 
	$_SESSION['status3TB'] = '';

$_SESSION['status4'] = $_POST['status4']; 

if($_POST['status4'] == 'no')
	$_SESSION['status4TB'] = $_POST['status4TB'];
else
	$_SESSION['status4TB'] = '';
$_SESSION['status5'] = $_POST['status5']; 
$_SESSION['status6'] = $_POST['status6']; 

header('location:areaOfExp.html');

?>