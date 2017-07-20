<?php

function send_verification_application($applicantID, $jobNumber, $email, $jobName)
{
	//Email Confirmation
	$emailReply="edgard.ernesto.silva@gmail.com";
	$headers = "From: " .$email. "\r\n";
	$headers .= "Reply-To: ".$emailReply. "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	$subject = "Email Confirmation";

	$msg = '
		<html>

		<head>
			<title>Email Confirmation</title>
		</head>

		<body style="font-family: sans-serif;">

			<div style="background-color:#600A16">
				<h2 style="color:white; margin-left:10px;"><br>Your application has been submitted</h2><br>
					
			</div>

			<div id = "center"><br>
				<h4>Please, save the following information for future reference</h4>		
			</div>
			
			<div id="info">
				<ul style="list-style: none;">
					<li>
						<label><strong>Applicant ID: </strong></label>
						'.$applicantID.'
					</li>

					<li>
						<label><strong>Job#: </strong></label>
						'.$jobNumber.'
					</li>

					<li>
						<label><strong>Job Name: </strong></label>
						'.$jobName.'
					</li>
					<li>
						<label><strong>Application date:</strong></label>
						'.date('d/m/Y').'
					</li>
				</ul>

				<br><p>Please, be advised that your application may take longer to process depending on the volume of applicants per job posted.</p>
			</div><hr>

			<div>
				
				<a style="text-decoration: none; color: inherit;" href="http://www.okanaganstaffingapplicants.site/ApplicantFormSystem/basicForm.html">Start another Application</a><br>		
				<a style="text-decoration: none; color: inherit;" href="http://www.okanaganstaffing.com/">Go to the Okanagan Staffing homepage</a><br>	
				<a style="text-decoration: none; color: inherit;"  href="http://www.okanaganstaffing.com/job-seeker-services/job-openings/">Available Positions</a><br> 
			</div><br>

			<div style="background-color:#600A16; text-align: center;">
			<p style="color:white">
			Okanagan Staffing<br>
			250-717-0506<br>
			jobs@okanaganstaffing.com<br>
			1476 St. Paul Street<br>
			Kelowna, BC V1Y 2E6<br>
			</p>		
			</div>
			
		</body>';

	mail($email, $subject, $msg, $headers);
}

