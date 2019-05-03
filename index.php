<?php 
	session_start();
	include_once("config.php"); 

	if(isset($_POST['commit'])){
		$username = $_POST['username'];
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = $_POST['password'];
		$password = mysqli_real_escape_string($mysqli, $password);
		$sql = "SELECT * FROM `users` WHERE `username`='$username' and `password`='$password'";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("Location:account.php");
		}
		else{
			echo '<br>Username or password is invalid!';
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
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Something</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Something</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Something</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Something</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Something</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Something</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Something</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Something</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Something</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Something</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Something</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Something</div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <form class="form-inline" action="index.php" method="post">
    <input type="text" name="username" class="form-control" size="50" placeholder="Username">
	<input type="password" name="password" class="form-control" size="50" placeholder="Password">
    <input type="submit" name="commit" class="btn btn-danger" value="Sign In">
	<button type="button" class="btn btn-danger" onclick="window.location.href='signup.php'">Sign Up</button>
  </form>
</footer>

</body>
</html>
