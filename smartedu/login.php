<!DOCTYPE html>
<html>
<head>
<title>Index</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min1.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">Per Ne</a></li>
						<li class="nav-item"><a class="nav-link" href="signup.php">Regjistrohu</a></li>
						<li class="nav-item"><a class="nav-link" href="login.php">Kyçu</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1 style="color: white;text-shadow: 1px 1px 8px black;">Kyçu ketu..</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
				<form action="#" method="post">		
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="email" placeholder="Email adresa" name="email"  required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" placeholder="Fjalekalimi" name="password" required=""/>
					</div>
			       
					<div class="bottom">
						<button class="btn" type="submit" name="submit">Log In</button>
					</div>
					<div class="links">
						<p class="right"><a href="admin/AdminLogin.php">Profesore..? Kyçu ketu</a></p>
						<div class="clear"></div>
					</div>
				</form>	
			</div>
		</div>
		
	</div>
</div>	
<!-- //main -->

<?php
          session_start();
	      require 'Classes/init.php';
          $func = new Operation();
         
	
     if(isset($_POST['submit']))
        {     
        
                $invalidErr="";
               $email = $_POST["email"]; 
               $password = $_POST["password"];
               $status=1;
           
               //$sql = "SELECT * FROM user WHERE user_email = '".$email."' AND  user_password = '".$password."' AND  user_status = '1'";
              
                $result = $func->select_with_multiple_condition(array('*'),'user',"user_email = '".$email."'",'AND',"user_status = '".$status."'");
               while($row = $result->fetch_assoc())
                {
                   $myId=$row["user_id"];
                }
             
              session_regenerate_id();
              $_SESSION['user_id']=$myId;
              session_write_close();
        
                 if ($result->num_rows > 0 )
                {                  
                   header("location: user/UserHome.php");
                }
           
               else
               {
                $message="Invalid Username or Password..!! Or Blocked By Admin";
                 echo "<script type='text/javascript'>alert('$message');</script>"; 
                }          
}
?>

</body>
</html>