<?php include('includes/overallheader.php'); ?>
<h2>Change your profile image</h2><br/>
<?php

//print_r($_FILES);//$_FILES is a multidimensionalArray :Array ( [image] => Array ( [name] => bbc_one.mp4 [type] => video/mp4 [tmp_name] => /tmp/phpZ5MrN0 [error] => 0 [size] => 601104 ) ) 
if(isset($_SESSION['user_id'])){
$_SESSION['username']=$user_data['username'];
$username=$_SESSION['username'];
//echo $username;
}
if(isset($_FILES['image'])){
	$errors=array();//instead of echo individual error, echo the error in a loop
	$allowed_ext=array('jpg','jpeg','png','gif');
	
	$file_name=$_FILES['image']['name'];
	$file_ext=strtolower(end(explode('.',$file_name)));
	
	//print_r($file_ext);
	$file_size=$_FILES['image']['size'];
	$file_tmp=$_FILES['image']['tmp_name'];
	
	if(in_array($file_ext, $allowed_ext)===false){
		$errors[]='Extension not allowed';
	}
	//print_r($errors);
	
	if($file_size>2097152){
		$errors[]='File size must be under 2mb';
	}
	
	if(empty($errors)){
		//upload file 'images/'.$file_name
		$location="images/$file_name";
		if(move_uploaded_file($file_tmp,$location)){
			$query=mysql_query("UPDATE cwusers SET imagelocation='$location' WHERE username='$username'");
			echo "Your image has been uploaded!<br/>";
			//header('Location:view.php');
		}
	}else{
		foreach($errors as $error){
		echo $error, '<br/>';
		}
	}
}


include 'display.php';
?>	

<form action="" method="POST" enctype="multipart/form-data">
	<p>
		<input type="file" name="image">
		<input type="submit" value="Upload">
	</p>
	<a href="<?php echo $user_data['username'];?>">Back to Profile</a>
</form>

<?php include 'includes/overallfooter.php';?>	