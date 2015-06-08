<!DOCTYPE HTML>
<html>
<center>
<head>
    <meta charset = "UTF-8">
    <title>recipes.php</title>
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
        <h2>Recipes</h2>
        <a href='recipes_exec.php'>Add new recipe</a>
        <div></div><br>
        <?php
            session_start();
            include('database.php');
            include('login_check.php');
            $user=$_SESSION['SESS_USER_NAME'];
            $recipes_db=mysql_query("SELECT * FROM recipes");
            echo "<table>";
            echo "<tr><th>Name</th>";
            echo "<th>Added by</th>";
            echo "<th></th>";
            echo "<th></th></tr>";
            while($recipes_row=mysql_fetch_array($recipes_db)){
                echo "<tr><td class='norm'>".$recipes_row['recipe_name']."</td>";
                echo "<td class='norm'>".$recipes_row['username']."</td>";
                echo "<form action='recipe_details.php' method='post'>";
                echo "<input type='hidden' name='recipe' value='".$recipes_row['recipe_name']."'>";
                echo "<td class='button'><input type='submit' name='view_recipe' value='view'></td></form>";
                if($user==$recipes_row['username']){
                    echo "<form action='recipes_exec.php' method='post'>";
                    echo "<input type='hidden' name='del_recipe' value='".$recipes_row['recipe_name']."'>";
                    echo "<td class='button'><input type='submit' name='delete_recipe' value='delete'></td></form>";
                }
                else{
                    echo "<td></td>";
                }
            }
            echo "</tr></table>";
        ?>
    </div>
</body>
</center>
</html>