<?php 
	include_once("config.php");
	session_start();
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
      <a class="navbar-brand">ANTHEM</a>
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
	<?php
		$rows=$mysqli->query("select username,image from users where image is not null");
	
		while(list($user,$img)=$rows->fetch_row()){ 
			echo "Uploaded by user: $user";
			echo "<br>";
		?>
		<embed src="<?php echo "uploads/".$img; ?>" height=580 width=550>
		<?php
		  echo "<br><br>";
		}
	?>
</div>


<footer class="container-fluid text-center">
  <p>Anthem e-Learning Platform</p>
</footer>

</body>
</html>