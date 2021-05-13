<?php 
include_once('../dbconnection.php');
if(!isset($_SESSION)){
	session_start();
}


if(isset($_SESSION['is_login'])){
	$clientLogEmail = $_SESSION['clientLogEmail'];
}
else{
	echo "<script>location.href='../index.php'</script>";
}

if(isset($clientLogEmail))
{
	$sql = "SELECT c_img FROM client WHERE c_email = '$clientLogEmail'";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$client_img = $row['c_img'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wages | User Profile Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- custome css -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
	<!-- Top navbar -->
	<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
	<a href="../index.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Wages Portal</a>
	 <span class="navbar-text pr-2">Any time or Any where</span>	
	</nav>

	<!-- side bar -->
	<div class="container-fluid mb-5" style="margin-top: 40px;">
		<div class="row">
			<nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item mb-3">
							<img src="<?php echo $client_img ?>" alt="client_img" class="img-thumbnail rounded-circle">
						</li>

						<li class="nav-item">
							<a href="clientProfile.php" class="nav-link">
								<i class="fas fa-user"></i>
								Profile <span class="sr-only">(current)</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="clientfeedback.php" class="nav-link">
								<i class="fab fa-accessible-icon"></i>
								Feedback
							</a>
						</li>

						<li class="nav-item">
							<a href="clientchangepass.php" class="nav-link">
								<i class="fas fa-key"></i>
								Change Password
							</a>
						</li>

						<li class="nav-item">
							<a href="../logout.php" class="nav-link">
								<i class="fas fa-sign-out-alt"></i>
								Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>
		


