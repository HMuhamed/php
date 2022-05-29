<?php
  //session_start();
  if(!isset($_SESSION['admin_id']))
  {       
    header("location:../../Logout.php");    
  }
  ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
.name { 
  font-family: sans-serif;
  color: white;
  text-shadow: 
    1px 1px 8px black,  
    1.5em .4em 10vw orange, 
    0 0 10vw gold;
  font-size: 03vw;
  }
  .logout { 
  font-family: sans-serif;
  color: white;
  text-shadow: 
    1px 1px 8px black,  
    1.5em .4em 10vw orange, 
    0 0 10vw gold;
  font-size: 02vw;
  }
</style>
  </head>
  <body>
       	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="../images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="AdminHome.php">Home</a></li>
            <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Lendet </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="programimi_ne_internet.php">Programimi ne Internet </a>
								<a class="dropdown-item" href="DB.php">DB  </a>
								<a class="dropdown-item" href="sistemet_operative.php">SO</a>
                <a class="dropdown-item" href="algoritmet.php">Algoritmet</a>
                <a class="dropdown-item" href="AddNewSubject.php">Shto Lendet</a>
                <a class="dropdown-item" href="AddProject.php">Shto Projektet</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="UserTaskSender.php">Dorezimet</a></li>
						<li class="nav-item"><a class="nav-link" href="signup.php">Vleresimet</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php">FAQ</a></li>
            <li class="nav-item"><a class="nav-link" href="../Logout.php">Dil</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
    <?php 
        require '../Classes/init.php';
        $func = new Operation();
        $imagePath="";
        $myId=$_SESSION['admin_id'];
       

        // $sql = "SELECT * FROM admin WHERE admin_id = '".$myId."'";
         $result = $func->select_with_condition(array('*'),'admin',"admin_id = '".$myId."'");
         while($row = $result->fetch_assoc())
         {         
          $imagePath=$row["admin_image"];
          $fname=$row['admin_name'];
        }
      
  ?>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    <script src="js/custom.js"></script>
  </body>
</html>