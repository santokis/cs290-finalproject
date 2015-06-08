<script>
    function item_check() {
        var x = document.forms["list"]["item"].value;
        if (x == null || x == "") {
            alert("Please enter an item");
            return false;
        }
    }
</script>

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
        <h2>Grocery List</h2>
        <form name="list" action="list_exec.php" onsubmit="return item_check()" method="post" >
        <input type="text" name="item" placeholder="new item here">
        <input type = "submit" value = "Add">
        </form>
        <?php
            session_start();
            include('database.php');
            include('login_check.php');
            $user=$_SESSION['SESS_USER_NAME'];
            $shopping_db=mysql_query("SELECT * FROM shopping WHERE user='$user'");
            echo "<table>";
            while($shopping_row=mysql_fetch_array($shopping_db)){
                echo "<tr><td class='norm'>".$shopping_row['item']."</td>";
                echo "<form action='list_exec.php' method='post'>";
                echo "<input type='hidden' name='d_item' value = '".$shopping_row['item']."'/>";
                echo "<td class='button'><input type='submit' name='delete_item' value='delete'/></td></tr></form>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</center>
</html>