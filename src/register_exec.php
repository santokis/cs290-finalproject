<?php
  	session_start();
 	  include('database.php');
  	$username=$_POST['username'];
  	$password=$_POST['password'];
  	$firstname=$_POST['firstname'];
  	$lastname=$_POST['lastname'];
  	$email=$_POST['email'];
  
  	$unique_username="SELECT * FROM user WHERE username='$username'";
  	$result_username=mysql_query($unique_username);
  	if($result_username){
      	if(mysql_num_rows($result_username)>0){
        		$_SESSION['unique_username']=true;
        		session_write_close();
    		  	header("location: register.php");
    		  	exit();
      	}
  	}

  	$unique_email="SELECT * FROM user WHERE email='$email'";
  	$result_email=mysql_query($unique_email);
  	if($result_email){
      	if(mysql_num_rows($result_email)>0){
        		$_SESSION['unique_email']=true;
        		session_write_close();
      			header("location: register.php");
      			exit();
      	}
  	}

  	mysql_query("INSERT INTO user(username,password,firstname,lastname,email) VALUES('$username','$password','$firstname','$lastname','$email')");
    echo "<script>alert('Registration successful')</script>";
    echo "<script>window.location='/~santokis/cs290-FinalProject/login.php'</script>";
?>