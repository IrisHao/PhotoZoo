<?php

$query=mysql_query("SELECT * FROM cwusers WHERE username='$username' ");
//$query=mysql_query("SELECT * FROM cwusers WHERE username='Yilin'");pass other users' name
if(mysql_num_rows($query)==0){
	die("User not found!");
}
else{

	$row=mysql_fetch_assoc($query);
	//echo $row['imagelocation'];
	$location=$row['imagelocation'];
	echo "<img src='$location' width='65' height='65'>";
	}
	
?>