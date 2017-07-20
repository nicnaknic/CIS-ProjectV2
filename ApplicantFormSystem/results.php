<?php
$mysqli = mysqli_connect("localhost", "OkStaff", "A11a11a11", "okstaff");
include 'DBFunctionDatabase.php';

$applicationID_query="SELECT applicantID 
					  FROM personal 
					  ORDER BY
					  applicantID 
					  DESC LIMIT 1";
$result = mysqli_query($mysqli, $applicationID_query);
$row = mysqli_fetch_assoc($result);

$applicantID = $row["applicantID"];

$firstname_query = "SELECT firstname
			   FROM personal
			   WHERE applicantID =".$applicantID;
$result = mysqli_query($mysqli, $firstname_query);
$row = mysqli_fetch_assoc($result);
$firstname = $row["firstname"];

$lastname_query = "SELECT lastname
			   FROM personal
			   WHERE applicantID =".$applicantID;
$result = mysqli_query($mysqli, $lastname_query);
$row = mysqli_fetch_assoc($result);
$lastname = $row["lastname"];
$name = $firstname." ".$lastname;
$applicationDate = date("d/m/Y");

$jobnumber_query = "SELECT jobNum
			   FROM jobs
			   WHERE applicantID =".$applicantID;
$result = mysqli_query($mysqli, $jobnumber_query);
$row = mysqli_fetch_assoc($result);
$jobNum = $row["jobNum"];

$jobName_query = "SELECT jobName
			   FROM jobs
			   WHERE applicantID =".$applicantID;
$result = mysqli_query($mysqli, $jobName_query);
$row = mysqli_fetch_assoc($result);
$jobName = $row["jobName"];

$email_query = "SELECT email
				FROM personal
				WHERE applicantID =".$applicantID;
$result = mysqli_query($mysqli, $email_query);
$row = mysqli_fetch_assoc($result);
$email = $row["email"];
//$email = 'ernestoubc0@gmail.com';

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You!</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sticky-footer.css" rel="stylesheet">
    <style>/**Minor CSS changes that didnt need their own file**/    
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus { /*Change the color of navbar items on hover*/
            background-color: #EEEEEE;
        }
        li, select{
            padding-top: 5px;
        }
        .form-container-padding{
            padding-top: 30px;
        }
        h1{
            color: rgb(28, 158, 203);
        }
        .no-link{
            color: #337ab7;
        }
        textarea{
            resize: none;
        }
    </style>
</head>
<body>
    <!--=======================NAVBAR ELEMENTS DOWN BELOW, THIS IS THE DEFAULT NAV SYSTEM====================-->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand active" href="#">Okanagan Staffing &nbsp; / &nbsp;<small>Application Submitted</small></a>            
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="http://www.okanaganstaffing.com/">Home</a></li>
                    <li><a href="http://www.okanaganstaffing.com/testing/">Testing</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Staffing Solutions<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://www.okanaganstaffing.com/staffing-solutions/staffing-solutions/">Staffing Solutions</a></li>
                            <li><a href="http://www.okanaganstaffing.com/staffing-solutions/temporary-staffing/">Temporary Staffing</a></li>
                            <li><a href="http://www.okanaganstaffing.com/staffing-solutions/permanent-saffing/">Permanent Staffing</a></li>
                            <li style="padding: 5px 0px 5px 0px;"><a href="http://www.okanaganstaffing.com/staffing-solutions/frequently-asked-questions/">Frequenty Asked Questions</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Client Solutions<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://www.okanaganstaffing.com/client-solutions/client-solutions/">Client Solutions</a></li>
                            <li><a href="http://www.okanaganstaffing.com/client-solutions/business-skill-evaluations/">Business Skill Evaluations</a></li>
                            <li><a href="http://www.okanaganstaffing.com/client-solutions/human-resources-consulting/">Human Resources Consulting</a></li>
                            <li><a href="http://www.okanaganstaffing.com/client-solutions/corporate-outplacement-services/">Corporate Outplacement Services</a></li>
                            <li style="padding: 5px 0px 5px 0px;"><a href="http://www.okanaganstaffing.com/client-solutions/client-testimonials/">Client Testimonials</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Job Seeker Services<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://www.okanaganstaffing.com/job-seeker-services/job-seeker-services/">Job Seeker Services</a></li>
                            <li><a href="http://www.okanaganstaffing.com/job-seeker-services/job-openings/">job Openings</a></li>
                            <li><a href="http://www.okanaganstaffing.com/job-seeker-services/application-process/">Application Process</a></li>
                            <li><a href="http://www.okanaganstaffing.com/staffing-solutions/frequently-asked-questions/">Frequenty Asked Questions</a></li>
                            <li><a href="http://www.okanaganstaffing.com/job-seeker-services/applicants-success-stories/">Applicant Success Stories</a></li>
                            <li style="padding: 5px 0px 5px 0px;"><a href="http://www.okanaganstaffing.com/job-seeker-services/resume-tips/">Resume Writing Tips</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://www.okanaganstaffing.com/about-us/about-us/">About Us</a></li>
                            <li><a href="http://www.okanaganstaffing.com/about-us/community-events/">Community Events</a></li>
                            <li style="padding: 5px 0px 5px 0px;"><a href="http://www.okanaganstaffing.com/about-us/kelowna/">About Kelowna</a></li>
                        </ul>
                    </li>
                    <li><a href="http://www.okanaganstaffing.com/contact/">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=========================================END NAVBAR=============================================-->

    <div class="container" style="margin-top: 35px;"> <!--Main body contents, footer will be added in a container-fluid later on -->

        
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6">
                <div id="top">
			<img src="../img/email_image.png">
		</div><br>
		<h2>Thank you for applying through Okanagan Staffing</h2>
		<br>
		<div id="request">
			<p>Please, save a copy of the following information for future reference:</p>
		</div>


			<ul style="list-style: none">
				
				<li>
					<label><strong>ApplicantID: </strong></label>
					<?php echo $applicantID;?>
				</li>

				<li>
					<label><strong>Name: </strong></label>
					<?php echo $name;?>
				</li>

				<li>
					<label><strong>Job#: </strong></label>
					<?php echo $jobNum;?>	
				</li>

				<li>
					<label><strong>Job Name: </strong></label>
					<?php echo $jobName;?>
				</li>

				<li>
					<label><strong>Application Date: </strong></label>
					<?php echo $applicationDate;?>		
				</li>
			</ul>

            <p style="margin-right: 15%;">
				In a few moments you will receive an confirmation message. Please check
				your inbox and make sure you have provided the correct Email address.<br><br>
				<strong>Provided Email address:</strong> <?php echo $email; ?>
			</p>
            </div>
            <div class="col-sm-3">&nbsp;</div>
        </div>






    </div>

    <!--========================= FOOTER SECTION =========================-->
    <footer class="footer">
        <div class="container" style="padding-top: 35px;">
            <div class="row">
                    <div class="col-sm-12">
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span><a class="foot-text" href="tel: 250-717-0506">&nbsp;250-717-0506</a>&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a class="foot-text" href="mailto: jobs@okanaganstaffing.com">&nbsp;jobs@okanaganstaffing.com</a>&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span><fade>&nbsp;1476 St. Paul Street&nbsp;&nbsp;&nbsp;</fade>
                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span><fade>&nbsp;Kelowna, BC V1Y 2E6&nbsp;&nbsp;&nbsp;</fade>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span><a class="foot-text" href="https://www.linkedin.com/in/kevinrenwickatokanaganstaffing">&nbsp;LinkedIn</a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="col-sm-12">
                        <p class="foot-text">Copyright &copy; 2017 Okanagan staffing Services Inc. All rights reserved. Website Design by Nic Henseleit xD</p>
                    </div>
            </div>
        </div>
    </footer>
    <!--======================= END FOOTER SECTION ========================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

