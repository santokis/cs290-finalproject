<?php
    session_start();
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_USER_NAME']);
?>

<script>
    function validation() {
        var username=document.forms["register"]["username"].value;
        var password=document.forms["register"]["password"].value;
        var firstname=document.forms["register"]["firstname"].value;
        var lastname=document.forms["register"]["lastname"].value;
        var email=document.forms["register"]["email"].value;
        if(username==null || username==""){
            alert("Please enter a username");
            return false;
        }
        else if(password==null || password==""){
            alert("Please enter a password");
            return false;
        }
        else if(firstname==null || firstname==""){
            alert("Please enter your firstname");
            return false;
        }
        else if(lastname==null || lastname==""){
            alert("Please enter your lastname");
            return false;
        }
        else if(email==null || email==""){
            alert("Please enter your email address");
            return false;
        }
    }
</script>

<!DOCTYPE HTML>
<html>
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
    <h2>Registration</h2>
    <form name="register" action="register_exec.php" onsubmit="return validation()" method="post">
        <input class="login" type="text" name="username" placeholder="Username"><br>
        <input class="login" type="password" name="password" placeholder="Password"><br>
        <input class="login" type="text" name="firstname" placeholder="Firstname"><br>
        <input class="login" type="text" name="lastname" placeholder="Lastname"><br>
        <input class="login" type="text" name="email" placeholder="Email"><br><br>
        <?php
            if(isset($_SESSION['unique_username'])){
                echo "<script>alert('Username already exists')</script>";
            }
            unset($_SESSION['unique_username']);
            if(isset($_SESSION['unique_email'])){
                echo "<script>alert('Email already exists')</script>";
            }
            unset($_SESSION['unique_email']);
        ?>
        <input class="login" type="submit" value="Submit"> 
        <a class="login" href="http://web.engr.oregonstate.edu/~santokis/cs290-FinalProject/login.php">Return to Login</a>
    </form>
</center>
</body>
</html>