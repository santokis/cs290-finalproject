<?php
    session_start();  
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_USER_NAME']);
?>

<script>
    function validation() {
        var username=document.forms["login"]["username"].value;
        var password=document.forms["login"]["password"].value;
        if(username==null || username==""){
            alert("Please enter your username");
            return false;
        }
        if(password==null || password==""){
            alert("Please enter your password");
            return false;
        }
    }
</script>


<!DOCTYPE HTML>
<html>
<center>
<head>
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
    <div class="heading"><b>Quick Recipes</b></div>
    <img class="heading" src="images/bread.png">
    <img class="heading" src="images/apple.png">
    <img class="heading" src="images/cabbage.png">
    <img class="heading" src="images/corn.png">
    <img class="heading" src="images/egg.png">
    <img class="heading" src="images/melon.png">
    <img class="heading" src="images/orange.png">
    <img class="heading" src="images/pepper.png"><br><br>
    <form name="login" action="login_exec.php" onsubmit="return validation()" method="post">
    <input class="login" name="username" type="text" placeholder="Username"><br>
    <input class="login" name="password" type="password" placeholder="Password"><br><br>
    <?php
        if(isset($_SESSION['invalid'])){
            echo "<script>alert('Invalid username/password')</script>";
        }
        unset($_SESSION['invalid']);
    ?>
    <input class="login" type="submit" value="Login"> 
    <a class="login" href="register.php">Register</a>
    </form>
</center>
</body>
</html>