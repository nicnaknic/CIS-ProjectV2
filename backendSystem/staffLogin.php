<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#224f77">
    <title>Staff Login</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> <!--Included CSS Files-->
    <link href="../css/sticky-footer.css" rel="stylesheet">
    <style>/**Minor CSS changes that didnt need their own file**/       
        body {
            padding-bottom: 40px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: #eee;
        }
        h1{
            color: rgb(28, 158, 203);
            float: center;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

    </style>
</head>

<?php
    session_start();
    session_unset(); //TEST
    $_SESSION['loginName'] = "";
?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <?php
                if (!isset($_POST['submit'])){
            ?>
                <div class="page-header">
                    <h1>Okanagan Staffing  <small>Applicant System</small></h1>
                </div>
                <label>Please sign in with your provided credentials</label>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" name="userName" class="form-control" placeholder="Username:" required><br>
                    <input type="password" name="passWord" class="form-control" placeholder="Password:" required><br>
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 25px;">Sign In</button>
                </form>
            <?php 
                }else{
                    $mysqli = mysqli_connect("localhost", "clientUse", 'A12gCz45sty3%23pd#', "okstaff");

                    if ($mysqli->connect_errno) {
		                echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                        exit();
                    }

                    $username = $mysqli->real_escape_string($_POST['userName']);
                    $password = $mysqli->real_escape_string($_POST['passWord']);
                    $firstname = "";
                    $lastname = "";

                    $stmt =  $mysqli->stmt_init();
                    if($stmt = $mysqli->prepare("SELECT * from staffTable WHERE username  = ? AND password = PASSWORD(?) LIMIT 1")){
                        $stmt->bind_param('ss', $username, $password);
                        $stmt->execute();
                        $stmt->store_result();
                        $countRows = $stmt->num_rows;

                        if ($countRows != 1) { 
                            $stmt->close();
                            $mysqli->close();
                        ?>
		                    <div class="page-header">
                                <h1>Okanagan Staffing  <small>Applicant System</small></h1>
                            </div>
                            <label>Something went wrong: (Invalid Username/Password)</label>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="text" name="userName" class="form-control" placeholder="Username:"required><br>
                                <input type="password" name="passWord" class="form-control" placeholder="Password:" required><br>
                                <button type="submit" name="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 25px;">Sign In</button>
                            </form>

                        <?php
                    } else {
                        $stmt->close();
                        $sql = "SELECT firstname, lastname, admin FROM staffTable WHERE username LIKE '{$username}'";
                        $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                        while ($row = mysqli_fetch_array($query)) {
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];
                            $admin = $row['admin'];
                        }    
                        $_SESSION['loginName'] = $firstname . " " . $lastname;

                        $_SESSION['adminCheck'] = $admin;
                        $mysqli->close();

		                echo "<p>Logged in successfully: " .$_SESSION['loginName']. "</p>";
                        header("location: findApps.php");
	                }
                }else{
                    $stmt->close();
                    $mysqli->close();
                    error_log("This user attempted an SQL Injection");
                    echo '
                    <div class="page-header">
                        <h1>HEY! I see you there, pls stop trying to get in; thx</h1>
                    </div>';
                    header("location: https://www.hackcanada.com/canadian/freedom/canadacode.html");
                }
            }
                ?>    
            </div>
        </div>
    </div>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--Required script references-->
    <script src="../js/bootstrap.min.js"></script>
</body> 
</html>