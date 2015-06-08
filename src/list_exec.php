<?php
	session_start();
 	include('database.php');
 	$l_user=$_SESSION['SESS_USER_NAME'];
 	$l_item=$_POST['item'];
 	$d_item=$_POST['d_item'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if(isset($d_item)){
    	$delete=$mysqli->query("DELETE FROM shopping WHERE user='$l_user' AND item='$d_item'");
    	header("location: list.php");
    	exit();
 	}
    if(isset($l_item)){
 		if(!($stmt=$mysqli->prepare("INSERT INTO shopping(user,item) VALUES(?,?)"))){
	        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	    }
	    if(!$stmt->bind_param("ss",$l_user,$l_item)){
	        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	    }
	    if(!$stmt->execute()){
	        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	    }
	    $stmt->close();
	}
	header("location: list.php");
?>