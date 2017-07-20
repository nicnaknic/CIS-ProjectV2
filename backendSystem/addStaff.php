<?php
if(isset($_POST['submit'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $password = $_POST['psswd'];
    
    if($_POST['isAdmin'] == 'yes'){ $admin = 1; }else{ $admin = 0; }

    $mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");
    $sql  = 'INSERT INTO `staffTable` (`username`, `lastname`, `firstname`, `password`, `admin`) VALUES (\''.$username.'\', \''.$lastname.'\', \''.$firstname.'\', PASSWORD(\''.$password.'\'), \''.$admin.'\')';
    $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    header("location: manageStaff.php");

}else{
    echo "Some strange shit went down here";
}

?>