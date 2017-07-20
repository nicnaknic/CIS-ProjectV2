<?php
session_start();
// Let's get some count Rock&Roll going here:
if($_SESSION['loginName'] == NULL){
	header("location: staffLogin.php");
}else{

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#222222">
    <title>Find Applicants</title>
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
			margin-bottom: 20px;
		}
		.head-mod{
            margin-top: 4px;
        }
		.btn-dark{
			background-color: #404040;
			border-color: #333333;
			color: #d9d9d9;
		}
		.btn-dark:hover{
			background-color: #404040;
			border-color: #333333;
			color: #b3b3b3;
		}
		.btn-dark:focus{
			background-color: #404040;
			border-color: #333333;
			color: #b3b3b3;
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
                    <a style="margin-right: 10px;" class="navbar-brand active" href="findApps.php">Welcome back <?php echo $_SESSION['loginName']; ?>!</a> <!--In the space after "back" and before the "!" add the name of who is signed in -->
            </div>
			<div class="navbar-left"><!--This button brings up the search functionality in a bootstrap modal object. I have decided to do it this way to allow for the staff to make a search easily from the top navbar -->
				
			</div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
					<li style="margin-right: 2px; margin-left: 13px;">
						<button type="button" class="btn btn-dark navbar-btn" data-toggle="modal" data-target="#myModal">
							<span class="glyphicon glyphicon-search"></span>&nbsp;Search Applicants
						</button>
					</li>
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

	<?php

	if(!isset($_GET['searchSubmit'])){ //if the searchSubmit button was not clicked
		$weekApplicantCount = "";
		$oldApplicantCount = "";

		//connect to database
		$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");

		// Grab the applicant count within the last week:	
		$sql = "SELECT dateForm, IFNULL(COUNT(applicantID), 0) count 
        FROM personal 
		WHERE dateForm >= DATE_SUB(NOW(), INTERVAL 7 DAY);";
		
		$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

		while ($row = mysqli_fetch_array($query)) {
			$weekApplicantCount = $row['count'];
		}

		// Grab the applicant count of old applicants 30 days or older:
		$sql = "SELECT dateForm, IFNULL(COUNT(applicantID), 0) count 
        		FROM personal 
				WHERE dateForm <= DATE_SUB(NOW(), INTERVAL 30 DAY);"; 
		
		$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

		while ($row = mysqli_fetch_array($query)) {
			$oldApplicantCount = $row['count'];
		}	    

	?>

		<div class="page-header">
                <h1>Latest Applicant submission results</h1><!--Change title depending on whether or not a search has been done. Ex change to "Search results" if a search has been made-->
        </div>
		<div class="row" style="margin-bottom: 35px;">
			<div class="col-sm-6">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="badge"><?php echo $weekApplicantCount; ?> </span><!--Do a quick query to get these values-->
						New Applicant submissions this week:
					</li>
				</ul>
			</div>
			<div class="col-sm-6">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="badge"><?php echo $oldApplicantCount; ?></span>
						Old Applicants to be deleted: 
					</li>
				</ul>
			</div>
			
		</div>
		
		<!-- PHP code to print out and loop all the applied applicants -->
		<?php
		

		//connect to database
		$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
		
		$sql = "SELECT * 
		        FROM personal p, jobs j, appStaffData ad
				WHERE p.applicantID = j.applicantID AND p.applicantID = ad.applicantID
				ORDER BY p.applicantID DESC LIMIT 80;"; 
		$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

		while ($row = mysqli_fetch_array($query)) {
		    $applicantID = $row['applicantID'];
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			$jobName = $row['jobName'];
			$jobNum = $row['jobNum'];
			$homePhone = $row['homePhone'];
			$cellPhone = $row['cellPhone'];
			$email = $row['email'];
			$dateForm = $row['dateForm'];
			$tags = $row['tags'];
			$rating = $row['rating'];
			if($tags == NULL){ $tags = "No tags added yet";}
			if($rating == NULL || $rating == 0){ $rating = "Not yet rated";}
			
			echo
			'<div class="panel panel-default panel-margins">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-9"><strong>[#' . $applicantID . '] ' . $firstName .' ' . $lastName .':&nbsp;<small>' .$jobName. ' - [#' .$jobNum.']</small></strong></div>
						<div class="col-sm-3"><div class="pull-right">' . $dateForm . '</div></div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<p><strong>Home Phone Number:</strong> ' . $homePhone . '</p>
							<p><strong>Cell Phone Number:</strong> ' . $cellPhone . '</p>
							<p><strong>Email Address:</strong> ' . $email . '</p>
						</div>
						<div class="col-sm-6">
							<p><strong>Applicant Rating:</strong> '.$rating.'</p>
							<p><strong>Applicant Tags:</strong> '.$tags.'</p>
							<form action="viewApp.php" method="get">
								<input type="hidden" name="AppID" value="' . $applicantID . '">
								<div class="pull-right"><input type="submit" class="btn btn-default" value="Show All"></div>
							</form>
						</div>
					</div>
				</div>
			</div>';
		}
		
		?>



	
	
	<?php }else{ //If the "searchSubmit" button was click, build a new query and print results

		$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff"); //Begin Building the search Query			
		$sql = 'SELECT * FROM personal p, jobs j, appStaffData ad WHERE '; //bass query linking tables together
		$countSql = 'SELECT COUNT(p.applicantID) AS counter FROM personal p, jobs j, appStaffData ad WHERE'; //query for the "COUNT(p.applicantID)" value
		
		$jobID = $mysqli->real_escape_string($_GET['jobID']);
		$nameNum = $mysqli->real_escape_string($_GET['nameNum']);
		$tags = $mysqli->real_escape_string($_GET['tags']);

			if($_GET['searchType'] == 'either'){
				$sql = $sql.' j.jobNum IS NOT NULL';
				$countSql = $countSql.' j.jobNum IS NOT NULL';
			}else if($_GET['searchType'] == 'temp'){
				$sql = $sql.' j.jobNum % 2 = 0';
				$countSql = $countSql.' j.jobNum % 2 = 0';
			}else if($_GET['searchType'] == 'perm'){
				$sql = $sql.' j.jobNum % 2 = 1';
				$countSql = $countSql.' j.jobNum % 2 = 1';
			}
			
			if($jobID != NULL){
				$sql = $sql.' AND (j.jobName LIKE \'%'.$jobID.'%\' OR j.jobNum = \''.$jobID.'\')';
				$countSql = $countSql.' AND (j.jobName LIKE \'%'.$jobID.'%\' OR j.jobNum = \''.$jobID.'\')';
			}
			if($nameNum != NULL){
				$appName = explode(' ', $nameNum); //break the string up with delimiter ', '
				foreach($appName as $value){
					$sql = $sql.' AND ((p.firstname LIKE \'%'.$value.'%\' OR p.lastname LIKE \'%'.$value.'%\') OR p.applicantID = \''.$value.'\')';
					$countSql = $countSql.' AND ((p.firstname LIKE \'%'.$value.'%\' OR p.lastname LIKE \'%'.$value.'%\') OR p.applicantID = \''.$value.'\')';
				}
			}
			if($tags != NULL){ //If the tags input is not null
				$tags = explode(', ', $tags); //break the string up with delimiter ', '
				foreach($tags as $value){
					$sql = $sql.' AND ad.tags LIKE \'%'.$value.'%\''; //then concat to SQL an and statement for each result
					$countSql = $countSql.' AND ad.tags LIKE \'%'.$value.'%\'';
				}
			}

			if($_GET['rating'] != NULL){
				$sql = $sql.' AND ad.rating >= '.$_GET['rating'].'';
				$countSql = $countSql.' AND ad.rating >= '.$_GET['rating'].'';
			}

			$sql = $sql.' AND p.applicantID = j.applicantID AND p.applicantID = ad.applicantID GROUP BY p.applicantID'; //Ending of SQL statement
			$countSql = $countSql.' AND p.applicantID = j.applicantID AND p.applicantID = ad.applicantID';

			if($_GET['orderBy'] == 'date'){
				$sql = $sql.' ORDER BY p.applicantID DESC';
			}else{
				$sql = $sql.' ORDER BY ad.rating DESC, p.applicantID DESC';
			}

			//echo $sql.'<br>';
			$queryCount = "";

			$query = mysqli_query($mysqli, $countSql) or die(mysqli_error($mysqli));
			while ($row = mysqli_fetch_array($query)) {
				$queryCount = $row['counter'];
			}
			?>

			<div class="page-header">
                <h1>Here are the results for your latest query: </h1><!--Change title depending on whether or not a search has been done. Ex change to "Search results" if a search has been made-->
        	</div>
			<div class="row" style="margin-bottom: 35px;">
				<div class="col-sm-6">
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge"><?php echo $queryCount; ?> </span><!--Do a quick query to get these values-->
							Query result count:
						</li>
					</ul>
				</div>
				<div class="col-sm-6"></div>
			</div>

			<?php 

			$query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
			while ($row = mysqli_fetch_array($query)) {
		    $applicantID = $row['applicantID'];
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			$jobName = $row['jobName'];
			$jobNum = $row['jobNum'];
			$homePhone = $row['homePhone'];
			$cellPhone = $row['cellPhone'];
			$email = $row['email'];
			$dateForm = $row['dateForm'];
			$tags = $row['tags'];
			$rating = $row['rating'];
			if($tags == NULL){ $tags = "No tags added yet";}
			if($rating == NULL || $rating == 0){ $rating = "Not yet rated";}
			
			echo
			'<div class="panel panel-default panel-margins">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-9"><strong>[#' . $applicantID . '] ' . $firstName .' ' . $lastName .':&nbsp;<small>' .$jobName. ' - [#' .$jobNum.']</small></strong></div>
						<div class="col-sm-3"><div class="pull-right">' . $dateForm . '</div></div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<p><strong>Home Phone Number:</strong> ' . $homePhone . '</p>
							<p><strong>Cell Phone Number:</strong> ' . $cellPhone . '</p>
							<p><strong>Email Address:</strong> ' . $email . '</p>
						</div>
						<div class="col-sm-6">
							<p><strong>Applicant Rating:</strong> '.$rating.'</p>
							<p><strong>Applicant Tags:</strong> '.$tags.'</p>
							<form action="viewApp.php" method="get">
								<input type="hidden" name="AppID" value="' . $applicantID . '">
								<div class="pull-right"><input type="submit" class="btn btn-default" value="Show All"></div>
							</form>
						</div>
					</div>
				</div>
			</div>';
		}
		//echo $countSql;

	}//End "else" for, if(!isset($_POST['searchSubmit']))statement

	?>
	</div><!--END BODY CONTAINER ELEMENT-->
	<!--==============================================================================================================-->
	<!-- ==================Modal Object for search functionality======================-->
    <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<form action="findApps.php" method="get"><!--FORM CONTAINER FOR SEARCH FUNCTIONALITY-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><strong>Search for Applicants:</strong></h4>
					</div>
					<div class="modal-body"><!--MAIN FIELDS FOR SEARCH FUNCTIONS-->
						<div class="row">
							<div class="col-sm-12">
								<label for="searchType" style="margin-right: 3px;">Please select which Applicant type to search for:</label><br>
								<div class="radio-inline">
									<label><input type="radio" name="searchType" value="either" checked>Either</label>
                                </div>
								<div class="radio-inline">
									<label><input type="radio" name="searchType" value="temp">Temporary</label>
                                </div>
								<div class="radio-inline">
									<label><input type="radio" name="searchType" value="perm">Permanent</label>
                                </div>
							</div>
						</div>

						<div class="page-header head-mod"></div>

						<div class="form-group">
							<div class="row">								
								<div class="col-sm-6">
									<input type="text" maxlength="100" class="form-control" name="jobID" placeholder="Job name or Number"></br>
								</div>
								<div class="col-sm-6">
									<input type="text" maxlength="100" class="form-control" name="nameNum" placeholder="Applicant Name or Number"></br>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<input type="text" maxlength="200" class="form-control" name="tags" placeholder="Applicant Tags"></br>
								</div>
							</div>
						</div><!--END FORM CONTROL 1-->
					
						<div class="page-header head-mod"></div>
					
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<input type="number" min="0" max="5" class="form-control" name="rating" placeholder="Applicant Rating">
								</div>
								<div class="col-sm-8">
									<label for="searchType" style="margin-right: 10px; margin-top: 7px;">Order search results by:</label>
									<div class="radio-inline">
										<label><input type="radio" name="orderBy" value="date" checked>Date</label>
                                	</div>
									<div class="radio-inline">
										<label><input type="radio" name="orderBy" value="rating">Rating</label>
                                	</div>
								</div>
							</div>
						</div><!--END FORM CONTROL 2-->

					</div><!--END MODAL BODY-->
					<div class="modal-footer">
						<button type="submit" name="searchSubmit" value="set"class="btn btn-default">Search</button>
					</div>
				</div>
			</form>
		</div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--Required script references-->
    <script src="../js/bootstrap.min.js"></script>
</body> 

<?php } ?>
