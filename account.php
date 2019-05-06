<?php 
include_once("config.php");
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
$username = $_SESSION['username'];
if(isset($_POST['upload'])){
	$_FILES['file']['name'] = $_POST['file_name'];
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
  $file_tem_loc = $_FILES['file']['tmp_name'];
  if($file_type == 'video/mp4'){
    $file_store = "uploads/videos/".$file_name;
  }elseif($file_type == 'application/pdf'){
    $file_store = "uploads/pdfs/".$file_name;
  }else{
    $file_store = "uploads/images/".$file_name;
  }
	
	if($file_type == 'video/mp4' or $file_type == 'application/pdf' or $file_type == 'image/jpeg'){
		move_uploaded_file($file_tem_loc, $file_store);
		$sql = "insert into files values('$file_name', '$username', '$file_type')";
		$mysqli->query($sql);
	}else{
    echo"<br>Unsupported file type";
    echo"<br>".$file_type;
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
		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
	<p style="font-size:20px; text-align: center"><b>Username : </b><?php echo"".$username;?></p>	
  <a href="#demo" class="btn btn-info" data-toggle="collapse" >Upload file</a>
			<div id="demo" class="collapse">
			<form action="account.php" method="post" enctype="multipart/form-data">
        <input type="text" name="file_name" placeholder="Enter File Name *" required>
				<input type="file" name="file" required>
				<input type="submit" name="upload" value="Upload" >
      </form>
</div>


<footer class="container-fluid text-center">
  <p>Anthem e-Learning Platform</p>
</footer>

</body>
</html>
