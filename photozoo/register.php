<?php include('includes/overallheaderbeforeloggedin.php'); ?>

<?php 
include 'core/init.php';

if(empty($_POST)===false){
	//echo 'Form submitted';
	$required_fields=array('username','password','password_again','first_name','email');
	//echo '<pre>', print_r($_POST,true), '</pre>';
	foreach($_POST as $key=>$value){
		//echo $key, ' ';
		//echo $value.' ';
		//in_array(search,array) function if the search parameter is found in array returns true
		if(empty($value) && in_array($key,$required_fields)===true){
			$errors[]='Fields marked with an asterisk are required';
			break 1;
		}
	}
	if(empty($errors)===true){
		if(user_exists($_POST['username'])===true){
			$errors[]='Sorry, the username \''.htmlentities($_POST['username']).'\' is already taken';
		}
		if(preg_match("/\\s/",$_POST['username'])==true){
			$errors[]='Your username must not contain any spaces';
		}
		if(strlen($_POST['password'])<6 || strlen($_POST['password'])>20){
			$errors[]='Your password must be at leaast 6 characters or not greater than 20 characters';
		}
		if($_POST['password']!=$_POST['password_again']){
			$errors[]='Your passwords do not match';
		}
		//filter_var(variable,filter) function filters a variable with the specified filter
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
			$errors[]='A vaild email address is required';
		}
		if(email_exists($_POST['email'])===true){
			$errors[]='Sorry, the email\''.$_POST['email'].'\' is already in use.';
		}
	}
}
//print_r($errors);
?>
    <div class="form">

<div class="inner">
	<?php  
	$user_count=user_count();
	$suffix=($user_count!=1)?'s':'';
	?>
	We current have <?php echo user_count(); ?> registered user<?php echo $suffix; ?>.
</div>

	
<h1>Register</h1>
<?php
if(isset($_GET['success'])&&empty($_GET['success'])){
	echo 'You\'ve been registered successfully!<br/>';
	echo 'Click  to <a href="index.php">Login</a> here!';
}else{
	if(empty($_POST)===false&&empty($errors)===true){
		//register user
		$register_data=array(
			'username'		=>$_POST['username'],
			'password'		=>$_POST['password'],
			'first_name'	=>$_POST['first_name'],
			'last_name'		=>$_POST['last_name'],
			'email'			=>$_POST['email']
		);
		//print_r($register_data);
		register_user($register_data);
		//redirect
		//header('Location:index.php');
		header('Location:register.php?success');
		exit();
	}
	else if(empty($errors)===false){
		//output errors
		echo output_errors($errors);
	}
?>
				
		<form action="" method="post">
			<ul>
				<li>
					Username*:<br>
					<input type="text" name="username">
				</li>
				<li>
					Password*:<br>
					<input type="password" name="password">
				</li>
				<li>
					Password again*:<br>
					<input type="password" name="password_again">
				</li>
				<li>
					First name*:<br>
					<input type="text" name="first_name">
				</li>
				<li>
					Last name:<br>
					<input type="text" name="last_name">
				</li>
				<li>
					Email*:<br>
					<input type="text" name="email">
				</li>	
				<li>
					<input type="submit" value="Register">
				<li>
			</ul>
		</form>
	</div><!-- end .form --> 
<?php 
}
include 'includes/footer.php';
?>
</div> <!-- end #content -->
	</body>
</html>