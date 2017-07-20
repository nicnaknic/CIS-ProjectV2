<?php
session_start();

$_SESSION['otherCityTxt'] = "no";


//Current Availability
if(isset($_POST['availability']) && $_POST['availability']!="")
    $_SESSION['availability'] = $_POST['availability']; 
else
	$_SESSION['availability'] ='';

//Available Times	
$_SESSION['availMon'] = $_POST['monStart']."-".$_POST['monFinish'];
$_SESSION['availTue'] = $_POST['tuesStart']."-".$_POST['tuesFinish'];
$_SESSION['availWed'] = $_POST['wedStart']."-".$_POST['wedFinish'];
$_SESSION['availThu'] = $_POST['thursStart']."-".$_POST['thursFinish'];
$_SESSION['availFri'] = $_POST['friStart']."-".$_POST['friFinish'];
$_SESSION['availSat'] = $_POST['satStart']."-".$_POST['satFinish'];
$_SESSION['availSun'] = $_POST['sunStart']."-".$_POST['sunFinish'];
$_SESSION['notice'] = $_POST['notice'];
$_SESSION['main_transport'] = $_POST['main_transport'];
$_SESSION['minWage'] = $_POST['minWage'];

//List of cities
if (isset($_POST['armstrong']))
	$_SESSION['armstrong'] = $_POST['armstrong'];
else
	$_SESSION['armstrong'] = '';

if (isset($_POST['enderby']))
	$_SESSION['enderby'] = $_POST['enderby'];
else
	$_SESSION['enderby'] = '';
	
if (isset($_POST['kamloops']))
	$_SESSION['kamloops'] = $_POST['kamloops'];
else
	$_SESSION['kamloops'] = '';
	
	
if (isset($_POST['kelowna']))
	$_SESSION['kelowna'] = $_POST['kelowna'];
else
	$_SESSION['kelowna'] = '';
		
if (isset($_POST['lakeCountry']))
	$_SESSION['lakeCountry'] = $_POST['lakeCountry'];
else
	$_SESSION['lakeCountry'] = '';

if (isset($_POST['okanaganFalls']))
	$_SESSION['okanaganFalls'] = $_POST['okanaganFalls'];
else
	$_SESSION['okanaganFalls'] = '';
	
if (isset($_POST['oliver']))
	$_SESSION['oliver'] = $_POST['oliver'];
else
	$_SESSION['oliver'] = '';
	
if (isset($_POST['osoyoos']))
	$_SESSION['osoyoos'] = $_POST['osoyoos'];
else
	$_SESSION['osoyoos'] = '';
	
if (isset($_POST['oyama']))
	$_SESSION['oyama'] = $_POST['oyama'];
else
	$_SESSION['oyama'] = '';
	
if (isset($_POST['peachland']))
	$_SESSION['peachland'] = $_POST['peachland'];
else
	$_SESSION['peachland'] = '';

if (isset($_POST['penticton']))
	$_SESSION['penticton'] = $_POST['penticton'];
else
	$_SESSION['penticton'] = '';

if (isset($_POST['salmonArm']))
	$_SESSION['salmonArm'] = $_POST['salmonArm'];
else
	$_SESSION['salmonArm'] = '';
	
if (isset($_POST['sicamous']))
	$_SESSION['sicamous'] = $_POST['sicamous'];
else
	$_SESSION['sicamous'] = '';

if (isset($_POST['summerland']))
	$_SESSION['summerland'] = $_POST['summerland'];
else
	$_SESSION['summerland'] = '';

if (isset($_POST['vernon']))
	$_SESSION['vernon'] = $_POST['vernon'];
else
	$_SESSION['vernon'] = '';


if (isset($_POST['westKelowna']))
	$_SESSION['westKelowna'] = $_POST['westKelowna'];
else
	$_SESSION['westKelowna'] = '';

if (isset($_POST['winfield']))
	$_SESSION['winfield'] = $_POST['winfield'];
else
	$_SESSION['winfield'] = '';

if (isset($_POST['otherCityCB1']))
	$_SESSION['otherCitytxt1'] = $_POST['otherCitytxt1'];
else
	$_SESSION['otherCitytxt1'] ='';

//Go to the next section of the form
header("location:uploadSubmit.html");
?>