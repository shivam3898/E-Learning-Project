<?php 
	session_start();
	include_once("config.php"); 
	if(!isset($_SESSION['username'])){
   header("Location:login.php");
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
		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Videos</div>
            <?php
          $rows=$mysqli->query("select uploaded_by,name,type from files");
      
        while(list($user,$name,$type)=$rows->fetch_row()){
              if($user == $_SESSION['username']){
                if($type == 'video/mp4'){    
                    echo "<br>";
        ?>
                    <video width="320" height="240" controls>
                    <source src="<?php echo "uploads/videos/".$name; ?>">
                    </video><br>
                    <form method="post" action="index.php">
                      <input type="submit" name="delete" value="delete">
                    </form> 
        <?php
                    if(isset($_POST['delete'])){
                      $sql = "delete from files where name='$name'";
                      $mysqli->query($sql);  
                      $folder_path = "uploads/videos/"; 
                      $file='$name';                        
                      // List of name of files inside 
                      // specified folder 
                      $files = glob($folder_path.''.$file);  
                        
                      // Deleting all the files in the list 
                      foreach($files as $file) { 
                        
                          if(is_file($file))  
                          
                              // Delete the given file 
                              unlink($file);  
                      }  
                      header("location:index.php");
                    } 
                    echo "<br><br>";
                }
              }
        }
        ?>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Pdfs</div>
        <?php
		      $rows=$mysqli->query("select uploaded_by,name,type from files");
		      while(list($user,$name,$type)=$rows->fetch_row()){
            if($user == $_SESSION['username']){
            if($type == 'application/pdf'){    
                echo "<br>";
        ?>
        <object width="320" height="400" data=<?php echo "uploads/pdfs/".$name; ?>></object>
        <form method="post" action="index.php">
          <input type="submit" name="delete" value="delete">
        </form>
        <?php
              if(isset($_POST['delete'])){
                $sql = "delete from files where name='$name'";
                $mysqli->query($sql);
                $files = glob('uploads/pdfs'.$name);      
                foreach($files as $file) { 
                  
                    if(is_file($file))   
                        unlink($file);  
                }
                header("location:index.php");
              }
                echo "<br><br>";
            }
          }
        }
	      ?>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Images</div>
        <?php
	      	$rows=$mysqli->query("select uploaded_by,name,type from files");	
		      while(list($user,$name,$type)=$rows->fetch_row()){
            if($user == $_SESSION['username']){
            if($type == 'image/jpeg'){    
                echo "<br>";
        ?>
        <object width="320" height="400" data=<?php echo "uploads/images/".$name; ?>></object>
        <form method="post" action="index.php">
          <input type="submit" name="delete" value="delete">
        </form>
        <?php
                if(isset($_POST['delete'])){
                  $sql = "delete from files where name='$name'";
                  $mysqli->query($sql);
                  $files = glob('uploads/images'.$name);      
                  foreach($files as $file) { 
                    
                      if(is_file($file))   
                          unlink($file);  
                  }
                  header("location:index.php");
                }
                echo "<br><br>";
            }
          }
        }
	      ?>
      </div>
    </div>
  </div>
</div>


<br><br>

<footer class="container-fluid text-center">
  Anthem e-Learning Platform
</footer>

</body>
</html>
