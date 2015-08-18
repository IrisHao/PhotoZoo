<?php include('includes/overallheader.php'); 
//linuxproj.ecs.soton.ac.uk/~yh5e11/cw2/profile.php?username=Hao, get username from url
if (isset($_GET['username'])===true && empty($_GET['username'])===false){
	$username=$_GET['username'];
	//echo $username;
	
	if(user_exists($username)===true){
		$user_id=user_id_from_username($username);
		//echo $user_id;
		$profile_data=user_data($user_id,'first_name','last_name','email','username');
	?>
		<h1><?php echo $profile_data['first_name'];?>'s Profile</h1>
				
		
	<?php include 'display.php'; ?>
	
		<form method="link" action="upload.php">
				<input type="submit" value="change image">
			  </form>
		
		<p><strong>Username:</strong><?php echo $profile_data['username']?></p>
		<p><strong>First Name:</strong><?php echo $profile_data['first_name']?></p>
		<p><strong>Last Name:</strong><?php echo $profile_data['last_name']?></p>
		<p><strong>Email:</strong><?php echo $profile_data['email'];?></p>
	<?php
	}else{
		echo 'Sorry, that user doesn\'t exist!';
	}
}else{
	header('Location:home.php');
	//exit();

}
 include 'includes/overallfooter.php' ;?>		