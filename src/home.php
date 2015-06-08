<?php
    session_start();
    include('database.php');
    include('login_check.php');
    $id=$_SESSION['SESS_MEMBER_ID'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $user_db=$mysqli->query("SELECT * FROM user WHERE id='$id'");
    while($user_row=mysqli_fetch_array($user_db,MYSQLI_BOTH)){
        $user_username=$user_row['username'];
        $user_firstname=$user_row['firstname'];
        $user_lastname=$user_row['lastname'];
        $user_email=$user_row['email'];
    }
?>

<!DOCTYPE HTML>
<html>
<center>
<head>
    <meta charset = "UTF-8">
    <title>home.php</title>
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
        <h2>Profile</h2>
        <div><b>Username: </b><?php echo $user_username?></div><br>
        <div><b>Firstname: </b><?php echo $user_firstname?></div><br>
        <div><b>Lastname: </b><?php echo $user_lastname?></div><br>
        <div><b>Email: </b><?php echo $user_email?></div><br>
    </div>
</body>
</center>
</html>