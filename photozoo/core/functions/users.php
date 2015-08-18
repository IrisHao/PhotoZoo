<?php  
//create function here

function update_date($update_data){
	global $session_user_id;
	$update=array();
	array_walk($update_data,'array_sanitize');

	foreach($update_data as $field=>$data){
	$update[]='`'.$field.'`=\''.$data. '\'';
	}
	//mysql_query("UPDATE `cwusers` SET " . implode(',',$update) . " WHERE `user_id` = $session_user_id") or die(mysql_error());
	mysql_query("UPDATE `cwusers` SET " . implode(',',$update) . " WHERE `user_id` = ".$_SESSION['user_id']);
}

function register_user($register_data){

	//array_walk(array,function) function runs each array element in a user-made function
	array_walk($register_data,'array_sanitize');
	$register_data['password']=md5($register_data['password']);
	//print_r($register_data);
	
	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	//echo $fields;
	$data='\''.implode('\',\'',$register_data).'\'';
	//echo $data;
	
	//echo "INSERT INTO `cwusers` ($fields) VALUES ($data)";
	//die();
	mysql_query("INSERT INTO `cwusers` ($fields) VALUES ($data)");
}

function user_count(){
	//return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `cwusers` WHERE `active`=1"),0);
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `cwusers`"),0);
}

function user_data($user_id){
	$data=array();
	$user_id=(int)$user_id;
	
	//func_num_args() gets the number of arguments passed to the function
	$func_num_args=func_num_args();
	//echo $func_num_args;  7
	//func_get_args(void) gets an array of the function's argument list, returns an array
	$func_get_args=func_get_args();
	//print_r($func_get_args);
	
	if($func_num_args>1){
		unset($func_get_args[0]);
		
		$fields='`'.implode('`,`',$func_get_args).'`';
		//echo $fields;
		
		//echo "SELECT $fields FROM `cwusers` WHERE `user_id`=$user_id";
		//$data=mysql_query("SELECT $fields FROM `cwusers` WHERE `user_id`=$user_id");
		$data=mysql_fetch_assoc(mysql_query("SELECT $fields FROM `cwusers` WHERE `user_id`=$user_id"));
		//print_r($data);
		return $data;
	}
	
	//print_r($func_get_args);
}


function logged_in(){
return (isset($_SESSION['user_id']))?true:false;	
}

function user_exists($username){
	$username=sanitize($username);
	//$query=mysql_query("SELECT COUNT(`user_id`) FROM `cwusers` WHERE `username`='$username'");
	//return (mysql_result($query,0)==1)?true:false;
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `cwusers` WHERE `username`='$username'"),0)==1)?true:false;
}

function email_exists($email){
	$email=sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `cwusers` WHERE `email`='$email'"),0)==1)?true:false;
}

/*function user_active($username){
	$username=sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `cwusers` WHERE `username`='$username' AND `active`=1"),0)==1)?true:false;
}*/

function user_id_from_username($username){
	$username=sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` from `cwusers` WHERE `username`='$username'"),0,'user_id' );
}

function login($username, $password)
{
	$user_id=user_id_from_username($username);
	
	$username=sanitize($username);
	$password=md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `cwusers` WHERE `username`='$username' AND `password`='$password'"),0)==1)?$user_id:false;
}
?>