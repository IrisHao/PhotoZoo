<?php  
$dbhost = 'localhost';
$dbname = 'db_yh5e11';
$dbuser = 'yh5e11';
$dbpass = 'dbyh5e11';

$connect_error="sorry, we are experiencing connection problems.";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die($connect_error);
mysql_select_db($dbname, $conn) or die($connect_error);
?>