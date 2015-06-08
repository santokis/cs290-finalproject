<!DOCTYPE HTML>
<html>
<center>
<head>
    <meta charset = "UTF-8">
    <title>list.php</title>
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
        <?php
            session_start();
            include('database.php');
            $recipe=$_POST['recipe'];
            $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
            if($mysqli->connect_errno){
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }
            $recipe_db=$mysqli->query("SELECT * FROM recipes WHERE recipe_name='$recipe'");
            echo "<h2>".$recipe."</h2>";
            echo "<table>";
            while($details=mysqli_fetch_array($recipe_db,MYSQLI_BOTH)){
                echo "<tr><th>Ingredients</th></tr>";
                echo "<tr><td class='details'>".$details['ingredients']."</td></tr>";
                echo "<tr></tr>";
                echo "<tr><th>Directions</th></tr>";
                echo "<tr><td class='details'>".$details['directions']."</td></tr>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</center>
</html>