<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wages | User Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- Font Awesome Css -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- custome css -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Jquery and Bootstrap Javascript -->

     <!-- pluning css -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.green.css">

    <style type="text/css">
      #scrollUp {
    bottom: 20px;
    right: 20px;
    background-image: url(img/top.png);
    height: 40px;
    width: 40px;
}
    </style>
  
</head>
<body>
<!-- Start Navigation -->

<nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
  <a class="navbar-brand" href="index.php">Wages Portal</a>
  <span class="navbar-text">Any time or Any where</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav custom-nav pl-5">
      <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item custom-nav-item"><a href="projects.php" class="nav-link">Projects</a></li>
      <li class="nav-item custom-nav-item"><a href="services.php" class="nav-link">Services</a></li>

      <?php 
      session_start();
      if(isset($_SESSION['is_login']))
      {
        echo '<li class="nav-item custom-nav-item"><a href="client/clientProfile.php" class="nav-link">My Profile</a></li>
      <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
      }
      else
      {
        echo ' <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#ClientLogin">Login</a></li>
      <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#ClientReg">SignUp</a></li>';
      }

      ?>

     
      <li class="nav-item custom-nav-item"><a href="feedback.php" class="nav-link">Feedback</a></li>
      <li class="nav-item custom-nav-item"><a href="contact-us.php" class="nav-link">Contact</a></li>
    </ul>
  </div>
</nav>

<!-- End Navigation -->
