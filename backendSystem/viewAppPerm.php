<?php

session_start();
// Let's get some count Rock&Roll going here:
if($_SESSION['loginName'] == NULL){
    session_unset(); 
    session_destroy();
	header("location: staffLogin.php");
}else{

$applicantID = $_GET['AppID'];
$page = "findApps.php";

$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
if ($mysqli->connect_errno) {
	echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}

if(isset($_GET['submitStaffData'])){ //DO NOT CHANGE OR MOVE, SQL query for inserting tags or rating into the DB for staff use
    $applicantID = $_GET['AppID'];
    $mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
	$appTags = $mysqli->real_escape_string($_GET['appTags']);
    $sql = 'UPDATE appStaffData SET tags = \''.$appTags.'\', rating = \''.$_GET['appRating'].'\' WHERE applicantID = \''.$_GET['AppID'].'\';';
    $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
}

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

$sql = 'SELECT * FROM permanentData WHERE applicantID = ' . $applicantID. ';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
while ($row = mysqli_fetch_array($query)) {
    $mainExpertise = $row['mainExpertise'];
    $roleInterest = $row['roleInterest'];
    $perfectCandidate = $row['perfectCandidate'];
    $salaryExpect = $row['salaryExpect'];
    $employment = $row['employment'];
}
$sql = 'SELECT jobNum, jobName FROM jobs WHERE applicantID = ' . $applicantID. ';';
$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
while ($row = mysqli_fetch_array($query)) {
    $jobNum = $row['jobNum'];
	$jobName = $row['jobName'];
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
                    <a style="margin-right: 10px;" class="navbar-brand active" href="#">OKS Applicant System</a> <!--In the space after "back" and before the "!" add the name of who is signed in -->
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
                <h1><strong>[#<?php echo $applicantID; ?>] <?php echo $firstName; ?> <?php echo $lastName; ?>: </strong><?php echo $jobName;?> [#<?php echo $jobNum;?>]</h1>
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



        <div class="panel panel-default panel-margins"><!--BASIC INFORMATION SECTION-->
			<div class="panel-heading">
				<strong  style="font-size: 18px;">Detailed Information:</strong>
			</div>
			<div class="panel-body">
                <label>What are your main area's of expertise?</label>
				<p><?php echo $mainExpertise; ?></p><!--INSERT TABLE VALUES INTO THE <p> TAGS-->

                <label>Why are you interested in this role?</label>
				<p><?php echo $roleInterest; ?></p>

                <label>Why do you think you are the perfect candidate?</label>
				<p><?php echo $perfectCandidate; ?></p>

                <label>Why did you leave your last job position? If you are still employed, why are you seeking new employment?</label>
				<p><?php echo $employment; ?></p>

                <label>What are your salary expectations for this job opening?</label>
				<p><?php echo $salaryExpect; ?></p>
			</div>
		</div>

        <label>Add Tags and/or give a rating (1-5)</label>
        <form action="viewAppPerm.php" method="get">
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
</html>

<?php } ?>