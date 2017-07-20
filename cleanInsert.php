<?php

/**

IMPORTANT: This file is used for removeing/adding escape characters to any data being inserted into the 
Database. It is important that all INSERT values that originate from a user Made string be filtered/modified by
this file before being processed by MySql. Failure to do so could lead to corrupt data or data not being inserted
into the database. For more information please reference:
http://php.net/manual/en/mysqli.real-escape-string.php
Or
http://www.tech-evangelist.com/2007/11/05/preventing-sql-injection-attack/

Example Usage:
'INSERT INTO personal VALUES \''.cleanQuery($_POST['firstname']).';';

**/



$mysqli = mysqli_connect("localhost", "OkStaff", 'A11a11a11', "okstaff");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

function cleanQuery($string)
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  if (phpversion() >= '4.3.0') 
  {
    $string = $mysqli->real_escape_string($string);
  }
  else
  {
    $string = $mysqli->real_escape_string($string);
  }
	echo $string;
  return $string;  
}


?> 