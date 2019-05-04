<?php
include_once("config.php");
session_start();
if(isset($_POST['submit'])){
 $username = $_POST['username']; 
 $username = mysqli_real_escape_string($mysqli, $username);
 $password = $_POST['password'];
 $password = mysqli_real_escape_string($mysqli, $password);	
 $cpass = $_POST['confirm_password'];
 $cpass = mysqli_real_escape_string($mysqli, $cpass);	
    if(empty($username) || empty($password) || empty($cpass)){
        echo "Some fileds are empty.";
    }
    else{
		if($password!=$cpass)
		{
			echo "Password do not match";
		}
		else{
			$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
			if($mysqli->query($sql)){
				echo "data inserted successfully...";
				echo "<script>window.location.href='index.php';</script>";
			}
			elseif(($mysqli->error) == "Duplicate entry '$username' for key 'PRIMARY'"){
				echo '<br>Username Taken';
			}
			else{
				echo "Error....".$mysqli->error;
			}
		}
    }
}

?>
<html>
<head>
  <title>E-Learning Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
     .jumbotron {
      margin-bottom: 0;
    }
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>E-Learning Website</h1>      
    <p>B.Tech 6th Semester</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" >ANTHEM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
		<li><a href="notes.php">All Notes</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
	<form action="signup.php" method="post">
	  <div class="form-group">
		<label for="email">Username:</label>
		<input name="username" type="text" class="form-control" id="email">
	  </div>
	  <div class="form-group">
		<label for="pwd">Password:</label>
		<input name="password" type="password" class="form-control" id="pwd">
	  </div>
	  <div class="form-group">
		<label for="pwd">Confirm Password:</label>
		<input name="confirm_password" type="password" class="form-control" id="pwd2">
	  </div>
	  <div class="checkbox">
		<label><input type="checkbox"> Remember me</label>
	  </div>
	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
</div>
<script>
	var password = document.getElementById("pwd")
		 , confirm_password = document.getElementById("pwd2");

	function validatePassword(){
		 if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>

<footer class="container-fluid text-center">
  <p>Anthem e-Learning Platform</p>
</footer>

</body>
</html>
