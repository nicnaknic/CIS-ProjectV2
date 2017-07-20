<?php
session_start();
if($_SESSION['loginName'] == NULL){ //makes sure a user is logged in in order to view this page
    session_unset(); //if not loged in clear the session
    session_destroy(); //destroy the session
	header("location: staffLogin.php"); //link to login page
}else{
	if(isset($_POST['delSubmit'])){
		$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
        $sql = 'DELETE FROM staffTable WHERE username LIKE \''.$_POST['delStaff'].'\';';
        $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
	}

    $firstname = "";
    $lastname = "";
    $username = "";
    $admin = "";

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#222222">
    <title>Manage Staff</title>
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
            margin-left: 15px;
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
                    <a style="margin-right: 10px;" class="navbar-brand active" href="findApps.php">OKS Applicant System</a> <!--In the space after "back" and before the "!" add the name of who is signed in -->
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
		<?php 
        
            if($_SESSION['adminCheck'] != 1){ //if the current user is not an admin, display message. Otherwise display page
        ?>        

            <div class="page-header">
                <h1><strong>Oops! </strong>You're not signed in under an admin account and cannot view this page :(</h1>
            </div>

            <a href="findApps.php"><button type="button" name="return" class="btn btn-primary" style="width: 150px; margin-top: 5px;">Go Back</button></a>

        <?php
            }else{ //else display the rest of the page
        ?>
        
        
        
        
        <div class="page-header">
            <h1><strong>Manage Staff Accounts</strong></h1>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="well">
                        <div class="form-group">
                            <label>Create new Staff Account:</label><br><br>
                            <form action="addStaff.php" method="post">
                                <input type="text" name="fname" class="form-control" maxlength="30" placeholder="Firstname" required><br>
                                <input type="text" name="lname" class="form-control" maxlength="30" placeholder="Lastname" required><br>
                                <input type="text" name="uname" class="form-control" maxlength="30" placeholder="Username" required><br>
                                <input type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="psswd" class="form-control" maxlength="30" placeholder="Password" title="Password must be 8 characters long, contain an Upper-case, Lower-case and Special Character" required><br>
                                <div class="checkbox" style="margin-bottom: 20px; margin-top: -5px;">
                                    <label><input type="checkbox" class="" name="isAdmin" value="yes">Would you like this to be an Admin Account?</label>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 25px;">Create Account</button>
                            </form>
                        </div>
                </div>
            </div>
            <div class="col-sm-7">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Admin</th>
                            <th><div class="pull-right">Actions</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
                            $sql = 'SELECT * FROM staffTable;';
                            $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            while ($row = mysqli_fetch_array($query)) {
                                $firstname = $row['firstname'];
                                $lastname = $row['lastname'];
                                $username = $row['username'];
                                $admin = $row['admin'];
                                if($admin == 1){ $admin = 'Yes';}else{$admin = 'No';}

                                echo 
                                '<tr>
                                    <td>'.$firstname.'</td>
                                    <td>'.$lastname.'</td>
                                    <td>'.$username.'</td>
                                    <td>'.$admin.'</td>
                                    <td>
                                        <div class="pull-right">
                                            <form action="manageStaff.php" method="post">
                                                <input type="hidden" name="delStaff" value="'.$username.'"><!--INSERT username INTO THE VALUE ATTRIBUTE-->
												<button type="submit" name="delSubmit" class="btn-link"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a><!--INSERT APP-ID INTO THE data-id FIELD-->
                                            </form>
                                        </div>
                                    </td>
                                </tr>';
                            }

                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
            <?php } ?>
	</div><!--END BODY CONTAINER ELEMENT-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--Required script references-->
    <script src="../js/bootstrap.min.js"></script>
</body> 

<?php } ?>