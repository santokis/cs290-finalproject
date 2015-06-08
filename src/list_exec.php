<?php
	session_start();
 	include('database.php');
 	$l_user=$_SESSION['SESS_USER_NAME'];
 	$l_item=$_POST['item'];
 	$d_item=$_POST['d_item'];
 	if(isset($d_item)){
 		mysql_query("DELETE FROM shopping WHERE user='$l_user' AND item='$d_item'");
 	}
 	else{
 		mysql_query("INSERT INTO shopping(user,item) VALUES('$l_user','$l_item')");
	}
	header("location: list.php");
?>