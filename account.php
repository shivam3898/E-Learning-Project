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
    echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> Unsupported file type! <br>
					Only mp4 videos, PDFs and jpeg images can be uploaded.</div>';
	}
}
?>
<html>
<head>
  <title>Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="icon" type="image/ico" href="favicon.ico" />
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>ANTHEM</h1>      
    <p>A Shared e-Learning Platform</p>
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
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" >All Notes
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="videos.php">Videos</a></li>
			  <li><a href="pdfs.php">PDFs</a></li>
			  <li><a href="images.php">Images</a></li>
			</ul>
		  </li>
        <li><a href="about.html">About</a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">    
	<div class="well">
		<p style="font-size:20px; text-align: center"><b>Username : </b><?php echo"".$username;?></p>
		Upload mp4 video file/PDF/jpeg image so that others can learn as well.
	</div>
	  <a href="#demo" class="btn btn-primary" data-toggle="collapse">Upload file</a>
			<div id="demo" class="collapse">
			<form action="account.php" method="post" enctype="multipart/form-data">
				<input type="text" name="file_name" placeholder="Enter File Name *" required><br>
				<input type="file" name="file" required>
				<input type="submit" name="upload" value="Upload" >
			</form>	  
	</div>
</div>

<footer class="container-fluid text-center">
  <p>Anthem e-Learning Platform</p>
</footer>

</body>
</html>
