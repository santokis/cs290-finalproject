<?php
	session_start();
 	include('database.php');
 	$user=$_SESSION['SESS_USER_NAME'];
 	$del_recipe=$_POST['del_recipe'];

	if(isset($del_recipe)){
 		$delete=mysql_query("DELETE FROM recipes WHERE username='$user' AND recipe_name='$del_recipe'");
		header("location: recipes.php");
		exit();
 	}
?>

 <script>
 	function validation() {
        var recipe = document.forms["recipe"]["add_recipe"].value;
        var ingredients = document.forms["recipe"]["add_ingredients"].value;
        var directions = document.forms["recipe"]["add_directions"].value;
        if(recipe == null || recipe == ""){
            alert("Please enter a recipe name");
            return false;
        }
        else if(ingredients == null || ingredients == ""){
            alert("Please enter ingredients");
            return false;
        }
        else if(directions == null || directions == ""){
            alert("Please enter directions");
            return false;
        }
    }
</script>

<!DOCTYPE HTML>
<html>
<center>
<head>
    <meta charset = "UTF-8">
    <title>recipes_exec.php</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="heading"><b>Quick Recipes</b></div>
    <img class="heading" src="images/bread.png">
    <img class="heading" src="images/apple.png">
    <img class="heading" src="images/cabbage.png">
    <img class="heading" src="images/corn.png">
    <img class="heading" src="images/egg.png">
    <img class="heading" src="images/melon.png">
    <img class="heading" src="images/orange.png">
    <img class="heading" src="images/pepper.png"><br><br>
    <div class="links">
        <a href="recipes.php">Recipes</a> | 
        <a href="list.php">Grocery List</a> | 
        <a href="home.php">Profile</a> | 
        <a href="login.php">Logout</a>
    </div>
    <div class="container">
		<form name="recipe" action="details_exec.php" onsubmit="return validation()" method="post">
    	<input type="text" name="add_recipe" placeholder="recipe title here" style="width:300px;"><br>
    	<textarea name="add_ingredients" placeholder="ingredients here" style="width:300px; height:300px" wrap="hard"></textarea><br>
    	<textarea type="text" name="add_directions" placeholder="directions here" style="width:300px; height:300px" wrap="hard"></textarea><br><br>
    	<input type="submit" value="Submit">
    </form>
    </div>
</body>
</center>
</html>