<?php 
include 'core/init.php';
protect_page();

if(image_check($_GET['image_id'])===false){
	header('Location:albums.php');
	exit();
}

if(isset($_GET['image_id'])||empty($_GET['image_id'])){
	delete_image($_GET['image_id']);
	//redirect the user to the last page they come from 
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit();
}
?>	