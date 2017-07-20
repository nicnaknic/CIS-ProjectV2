<?php
session_start();
if($_SESSION['loginName'] == NULL){ //makes sure a user is logged in in order to view this page
    session_unset(); //if not loged in clear the session
    session_destroy(); //destroy the session
	header("location: staffLogin.php"); //link to login page
}else{
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#222222">
    <title>Delete Applicant</title>
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
        .action-margins{
            margin-left: 8px;
        }
        form{
            margin: 0 0 0 0;
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
            <div class="row">
                <div class="col-sm-8">
                    <h1><strong>Manage Old Applicants</strong></h1>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" style="margin-top: 20px;" data-toggle="modal" data-target="#delAll"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;Delete All</button>
                    </div>
                </div>
            </div>
        </div>

       <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date Applied</th>
                    <th>Name &amp; Number</th>
                    <th>Job Name &amp; Number</th>
                    <th><div class="pull-right">Actions</div></th>
                </tr>
            </thead>
			<tbody>
			<?php
			//connect to database
			$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
		
			$sql = "SELECT p.applicantID, p.firstName, p.lastName, j.jobName, j.jobNum, p.dateForm
					FROM personal p, jobs j
					WHERE p.applicantID = j.applicantID AND
						  p.dateForm <= DATE_SUB(NOW(), INTERVAL 30 DAY);"; 
			$query = mysqli_query($mysqli, $sql);

			while ($row = mysqli_fetch_array($query)) {
				$applicantID = $row['applicantID'];
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$jobName = $row['jobName'];
				$jobNum = $row['jobNum'];						
				$dateForm = $row['dateForm'];
	        
				echo '
                <tr>
                    <td>'.$dateForm.'</td>
                    <td>[#'.$applicantID.'] - '.$firstName.' '.$lastName.'</td>
                    <td>[#'.$jobNum.'] - '.$jobName.'</td>
                    <td>
                        <div class="pull-right">
                            <form action="viewApp.php" method="get">
                                 <a class="appRef" data-id="1" data-toggle="modal" href="#delModal" title="none"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a><!--INSERT APP-ID INTO THE data-id FIELD-->
                                <input type="hidden" name="AppID" value="'.$applicantID.'"><!--INSERT APP-ID INTO THE VALUE ATTRIBUTE-->
                                <button type="submit" name="subViewDelApp" value="set" class="btn-link"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button><!--Link to the "viewApp" page so the staff can view the applicant and decide if they want to delete them-->
                            </form>
                        </div>
                    </td>
                </tr>';
			}
			?>
            </tbody>

       </table>
        

	</div><!--END BODY CONTAINER ELEMENT-->

    <!--========================================================================================================================================-->
    <div class="modal fade" id="delModal" role="dialog"><!--MODAL FOR DELETING A SINGLE APPLICANT-->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong>Are you sure you wish to remove this applicant?</strong></h4>
				</div>
				<div class="modal-footer" style="margin-bottom: 0px;">
                    <form class="modal-form" style="margin-bottom: 0px;">
                        <input type="hidden" id="delApplicant" name="delApplicant" value=""/><!--!IMPORTANT; THE VALUE ATTRIBUTE GETS POPULATED AUTOMATICALLY, INSERT NOTHING HERE-->
					    <button type="submit" class="btn btn-default">Confirm</button>
                    </form>
				</div>
			</div>
		</div>
    </div>
    <!--========================================================================================================================================-->

    <div class="modal fade" id="delAll" role="dialog"><!--MODAL FOR DELETING A SINGLE APPLICANT-->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong>Are you sure you wish to remove ALL old applicants?</strong></h4>
				</div>
                <div class="modal-body">
                    <p>This action will remove all old applicants; including their resume, cover letter and all their associated data.</p>
                </div>
				<div class="modal-footer" style="margin-bottom: 0px;">
                    <form class="modal-form" style="margin-bottom: 0px;" action="delAllApplicants.php" method="post">
					    <button type="submit" name="delAllApplicants" class="btn btn-default">Confirm</button>
                    </form>
				</div>
			</div>
		</div>
    </div>







	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--Required script references-->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mod.js"></script>
</body> 
	
<?php } ?>