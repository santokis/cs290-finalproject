<?php
    session_start();
 	include('database.php');
 	$username=$_POST['username'];
	$password=$_POST['password'];

	$query="SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result=mysql_query($query);
	if($result){
		if(mysql_num_rows($result)>0){
			session_regenerate_id();
			$user_database=mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID']=$user_database['id'];
			$_SESSION['SESS_USER_NAME']=$user_database['username'];
			session_write_close();
			header("location: recipes.php");
			exit();
		}
        else{
        	$_SESSION['invalid']=true;
			session_write_close();
			header("location: login.php");
			exit();
		}
	}
	header("location: login.php");
?>