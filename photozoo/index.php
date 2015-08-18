<?php
include'includes/overallheaderbeforeloggedin.php';
include 'core/init.php';
if(empty($_POST)===false){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	//echo $username, ' ', $password;
	
	if(empty($username)===true||empty($password)===true){
		$errors[]='You need to enter a username and password';
	}else if(user_exists($username)===false){
		$errors[]='We cannot find that username. Have you registered?';
	}//else if(user_active(username)===false){
		//$errors[]='You have not activated your account!';
	//}
	else{	
		if(strlen($password)>21){
			$errors[]='password too long';
		}		
		//echo 'the user exist';
		//here we log the user in, pass the username and password to specific function to check whether the login is succeed. 
		$login=login($username, $password);
		if($login===false){
			$errors[]='That username/password combination is incorrect';
		}else{
			//set the user session
			//redirect user to home
			//echo "ok";
			//die($login);
			$_SESSION['user_id']=$login;
			header('Location:albums.php');
			//header('Location:albums.php');
			exit();
		}		
	}	
	//print_r($errors);
}else{
	//$errors[]='No data received';
}
?>

<div class="form">
<div class="inner">
	<?php  
	$user_count=user_count();
	$suffix=($user_count!=1)?'s':'';
	?>
	We current have <?php echo user_count(); ?> registered user<?php echo $suffix; ?>.
</div>

        <h1>Login</h1>
<?php
//nicely out put error
if(empty($errors)===false){		/Users/yilinhao/OneDrive/Documents/linuxproj_html/INFO2011/INFO2011/index.php
	echo output_errors($errors);
}
?>     
            <div class="inner">
                <form action="" method="post">
                    <ul id="login">
                        <li>
                            username:<br>
                            <input type="text" name="username">
                        </li>
                        <li>
                            password:<br>
                            <input type="password" name="password">
                        </li>
                        <li>
                            <input type="submit" value="Login">
                        </li>
                        <li>
                            <p>or <a href="register.php">Register</a>!</p>
                        </li>
                    </ul>
                </form>
            </div>               
      </div>  <!-- end .form -->        
<?php include('includes/overallfooterbeforeloggedin.php'); ?>