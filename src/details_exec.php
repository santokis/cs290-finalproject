<?php
	session_start();
 	include('database.php');
 	$user=$_SESSION['SESS_USER_NAME'];
 	$recipe=$_POST['add_recipe'];
 	$ingredients=$_POST['add_ingredients'];
 	$directions=$_POST['add_directions'];

	mysql_query("INSERT INTO recipes(username,recipe_name,ingredients,directions) VALUES('$user','$recipe','$ingredients','$directions')");
 	header("location: recipes.php");
?>