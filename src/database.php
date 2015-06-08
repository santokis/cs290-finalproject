<?php
    $db_host="oniddb.cws.oregonstate.edu";
	$db_user="santokis-db";
	$db_pass="DVH5s4mcKEd4E9Lj";
	$db_name="santokis-db";	
	$db=@mysql_connect($db_host,$db_user,$db_pass) or die("Error connecting to database");
	mysql_select_db($db_name, $db) or die("Error selecting database");
?>