<?php 
//general function

function protect_page(){
	if(logged_in()===false){
		header('Location:protected.php');
		exit();
	}
}

function array_sanitize(&$item){
	$item=htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function output_errors($errors){
	/*$output=array();
	foreach($errors as $error){
		//echo $error, ',';
		$output[]='<li>'.$error.'</li>';
	}
	//implode(separator,array) returns a string from an array
	return '<ul>'. implode('',$output).'</ul>';*/
	
	return '<ul><li>'. implode('</li><li>',$errors).'</li></ul>';
}
?>