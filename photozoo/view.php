<?php include('includes/overallheader.php'); ?> 	
<h1>Home</h1>
<p>Just a template.</p>

<?php
//_SESSION['username']="Alex";
if(isset($_SESSION['user_id'])){
$_SESSION['username']= $user_data['username'] ;
$username=$_SESSION['username'];
//echo $username;
}
$query=mysql_query("SELECT * FROM cwusers WHERE username='$username' ");
if(mysql_num_rows($query)==0){
	die("User not found!");
}
else{
	$row=mysql_fetch_assoc($query);
	//echo $row['imagelocation'];
	$location=$row['imagelocation'];
	echo "<img src='$location' width='100' height='100'>";
	}
?>
<?php include 'includes/overallfooter.php';?>	