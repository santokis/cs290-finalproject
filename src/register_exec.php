<?php
  	session_start();
 	  include('database.php');
  	$username=$_POST['username'];
  	$password=$_POST['password'];
  	$firstname=$_POST['firstname'];
  	$lastname=$_POST['lastname'];
  	$email=$_POST['email'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if($result_username = $mysqli->query("SELECT * FROM user WHERE username='$username'")){
      //printf("Select returned %d rows.\n", $result->num_rows);
      $row_cnt = $result_username->num_rows;
    }
    if($result_username){
        if($row_cnt>0){
            $_SESSION['unique_username']=true;
            session_write_close();
            header("location: register.php");
            exit();
        }
    }
    if($result_email = $mysqli->query("SELECT * FROM user WHERE email='$email'")){
      //printf("Select returned %d rows.\n", $result->num_rows);
      $row_cnt = $result_email->num_rows;
    }
    if($result_email){
        if($row_cnt>0){
            $_SESSION['unique_username']=true;
            session_write_close();
            header("location: register.php");
            exit();
        }
    }
  	$mysqli->query("INSERT INTO user(username,password,firstname,lastname,email) VALUES('$username','$password','$firstname','$lastname','$email')");
    echo "<script>alert('Registration successful')</script>";
    echo "<script>window.location='/~santokis/cs290-FinalProject/login.php'</script>";
?>