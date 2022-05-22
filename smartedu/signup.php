<?php
	
$showAlert = false;
$showError = false;
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
    include 'signupconn.php';
	
	$Name = $_POST["Name"];
	$Surname = $_POST["Surname"];
	$Email = $_POST["Email"];
    $password = $_POST["password"];
    $cpassword=$_POST["cpassword"];
    $status=1;
    $role=$_POST["Role"];
			
	
	$sql1 = "Select * from user where user_fname='$Name'";
	
	$result1 = mysqli_query($conn, $sql1);
	
	$num1 = mysqli_num_rows($result1);

    $sql2 = "Select * from admin where admin_name='$Name'";
	
	$result2 = mysqli_query($conn, $sql2);
	
	$num2 = mysqli_num_rows($result2);
	
	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if($num1 == 0 && $role='student') {
		if(($password == $cpassword) && $exists==false ) {
            $sql1 = "INSERT INTO `user` ( `user_fname`, `user_lname`, `user_email`,
            `user_password`, `user_status`) VALUES ('$Name', '$Surname', '$Email',
            '$password', '$status')";

	
			$result1 = mysqli_query($conn, $sql1);
	
			if ($result1) {
				$showAlert = true;
			}
		}
		else {
			$showError = "Fjalekalimet nuk perputhen";
		}	
	}// end if
	
if($num1>0)
{
	$exists="Tashme ekziston nje perdorues me kete emer";
}

if($num2 == 0  && $role='profesor') {
    if(($password == $cpassword) && $exists==false) {
        $sql2 = "INSERT INTO `admin` ( `admin_name`, `admin_email`,
        `admin_password`, `admin_status`) VALUES ('$Name', '$Email',
        '$password', '$status')";


        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            $showAlert = true;
        }
    }
    else {
        $showError = "Fjalekalimet nuk perputhen";
    }	
}// end if

if($num2>0)
{
$exists="Tashme ekziston nje perdorues me kete emer";
}
	
}//end if




	
?>
	
<!doctype html>
	
<html lang="en">

<head>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1,
		shrink-to-fit=no">

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
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
		crossorigin="anonymous">
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
	
<?php
	
	if($showAlert) {
	
		echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
	
			<strong>Sukses!</strong>Ju u regjistruat me sukses dhe tani mund te kyçeni
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div> ';
	}
	
	if($showError) {
	
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $showError.'
	
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close">
			<span aria-hidden="true">×</span>
	</button>
	</div> ';
}
		
	if($exists) {
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
	
		<strong>Error!</strong> '. $exists.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div> ';
	}

?>
	
<div class="container my-4 ">
	
	<h1 class="text-center">Regjistrohu</h1>
	<form action="signup.php" method="post">
	
		<div class="form-group">
			<label for="name">Emri</label>
		<input type="text" class="form-control" id="Name"
			name="Name" aria-describedby="emailHelp">	
		</div>
        <div class="form-group">
			<label for="surname">Mbiemri</label>
		<input type="text" class="form-control" id="Surname"
			name="Surname" aria-describedby="emailHelp">	
		</div>
        <div class="form-group">
			<label for="role">Roli</label>
		<input type="text" class="form-control" id="Role"
			name="Role" aria-describedby="emailHelp">	
		</div>
        <div class="form-group">
			<label for="user">Shfrytezuesi</label>
		<input type="text" class="form-control" id="user"
			name="user" aria-describedby="emailHelp">	
		</div>
	
		<div class="form-group">
			<label for="password">Fjalekalimi</label>
			<input type="password" class="form-control"
			id="password" name="password">
		</div>
	
		<div class="form-group">
			<label for="cpassword">Konfirmo Fjalekalimin</label>
			<input type="password" class="form-control"
				id="cpassword" name="cpassword">
		</div>	

        <div class="form-group">
			<label for="email">Email</label>
		<input type="text" class="form-control" id="Email"
			name="Email" aria-describedby="emailHelp">	
		</div>
        <div class="form-group">
			<label for="cemail">Konfirmo Emailin</label>
		<input type="text" class="form-control" id="cemail"
			name="cemail" aria-describedby="emailHelp">	
		</div>
	
		<button type="submit" class="btn btn-primary">
		Regjistrohu
		</button>
	</form>
</div>
	
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	crossorigin="anonymous">
</script>
	
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous">
</script>
	
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
	integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
	crossorigin="anonymous">
</script>
</body>
</html>
