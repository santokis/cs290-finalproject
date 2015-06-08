<?php
    $db_host="oniddb.cws.oregonstate.edu";
	$db_user="santokis-db";
	$db_pass="DVH5s4mcKEd4E9Lj";
	$db_name="santokis-db";	
	$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
	if($mysqli->connect_errno){
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	if($result=$mysqli->query("SELECT DATABASE()")){
	    $row=$result->fetch_row();
	    //printf("Default database is %s.\n", $row[0]);
	    $result->close();
	}
	$mysqli->close();
?>