<!-- start Navigation Bar -->

<?php
  include('dbconnection.php');
  include('./include/header.php');
?>

<!-- End Navigation Bar -->

<style type="text/css">
  /* Feedback Client Start */
.happyclients{
    width: 100%;
    height: auto;
}

.box{
    text-align: center;
    width: 300px;
    height: 450px;
    margin-left: 50px;
    border:1px solid rgba(0,0,0,0.2);
    box-shadow: 0 5px 10px 0 rgba(0,0,0,0.3);
    border-radius: 2px;
    transition: 0.3s ease;
}

.box:hover{
    background: #16c9f6;
}

.box:hover p{
    color: white;
}

.box img{
   
     width: 50px;
     height: 250px;
    border-radius: 50%;
   padding: 40px;
}

.box h1{
    font-size: 18px;
    font-weight: 700;
    color: #000;
    margin-bottom: 10px;
}

.box h2{
    font-size: 13px;
    font-weight: 400;
    color: #666666;
    margin-bottom: 20px;
}
/* Feedback Client End */

</style>


<!-- Start Video background -->

<div class="container-fluid remov-vid-marg">
  <div class="video-bg">
    <video playsinline autoplay muted loop>
      <source src="video/worker.mp4">
    </video>
    <div class="v-overlap"> 
    </div>
  </div>

  <div class="vid-content">
   <h1 class="my-content">Welcome to our Website Wages</h1>
   <small class="my-content">Practice Makes Perfect</small><br><br>

   <?php 
     if(!isset($_SESSION['is_login']))
     {
        echo '<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#ClientReg">Get Started</a>';
     }
     else
     {
        echo '<a href="client/clientProfile.php" class="btn btn-danger">My Profile</a>';
     }
   ?>

   
  </div>
</div>

<!-- End Video background -->

<!-- Start Text Banner -->

<div class="container-fluid bg-danger text-banner">
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5><i class="fas fa-book-open mr-3"></i>100+ See Online Projects</h5>
    </div>

    <div class="col-sm">
      <h5><i class="fas fa-users mr-3"></i>Best Partners</h5>
    </div>

    <div class="col-sm">
      <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
    </div>

    <div class="col-sm">
      <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee*</h5>
    </div>
  </div>
</div>

<!-- End Text Banner -->

<!-- Start Most Popular Projects -->

<div class="container mt-5">
  <h2 class="text-center mb-5">Recently Projects</h2>
  <!--Start 1st card deck -->
  <div class="card-deck mt-4">
     <?php 

    $sql = "SELECT * FROM projects LIMIT 3";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
          $project_id = $row['p_id'];
          echo ' 
          <div class="col-sm-4 mt-5">
          <div class="card">
        <img src="' . str_replace('..', '.', $row['p_img']) . '" alt="project-img" class="card-img-top" height="175px" />
        <div class="card-body">
          <h5 class="card-title">Project ' . $project_id . '</h5>
          <p class="card-text" style="font-size: 15px">
            <b>Area : </b>' . $row['p_area'] . '<br>
            <b>Elevation : </b>' . $row['p_elevation'] . '<br>
            <b>Configuration : </b>' . $row['p_configuration'] . '<br>
            <b>Status : </b>' . $row['p_status'] . '<br>
            <b>Location : </b>' . $row['p_location'] . '
          </p>
        </div>
        <div class="card-footer">
       
          <a href="projectdetail.php?p_id='.$row['p_id'].'" class="btn btn-primary text-white font-weight-bolder float right">More details</a>
        </div>
      </div></div>';
      }
    }

    ?>
     
  
  </div>
  <!-- End 1st card deck -->

 
  <div class="text-center p-3">
    <a href="projects.php" class="btn btn-danger btn-sm">View All Projects</a>
  </div>
</div>

<!-- End Most Popular Projects -->

<!-- Start Contact Us -->

<?php
  include('./contactus.php');
?>

<!-- End contact us -->
 
<!-- start client Testimonial -->


 
  <section class="happyclients container-fluid mb-4" id="clients">
  <div class="text-center">
    <h2 class="text-center">Clients Feedback</h2>
    <p class="text-capitalize pt-1">Our Satisfied Customer Says</p>
    <hr>
  </div> 
 
  <div class="owl-carousel owl-theme">
          <?php 

            $sql1 = "SELECT * FROM client JOIN feedback ON client.c_id = feedback.c_id";
            $result1 = $conn->query($sql1);
             if($result1->num_rows > 0){

              while($row1 = $result1->fetch_assoc()){
                $c_img = str_replace('..', '.', $row1['c_img']);
            
            ?>
          <div class="item">
            
         
              <div class="col-lg-4 col-md-4 col-12">
                <div class="box">
                  <img src="<?php echo $c_img; ?>">
                  <p class="m-4"><?php echo $row1['f_content']; ?></p>
                  <h1><?php echo $row1['c_name']; ?></h1>
                  <h2><?php echo $row1['c_occ']; ?></h2>
                </div>
              </div>
             
        </div>
        <?php }} ?> 
        
</div>
  
</section>


<!-- End client Testimonial -->

<!-- Start Social Follow -->

<div class="container-fluid bg-danger">
  <div class="row text-white text-center p-1">
    <div class="col-sm">
      <a href="#" class="text-white social-hover"><i class="fab fa-facebook-f"></i> Facebook</a>
    </div>

    <div class="col-sm">
      <a href="#" class="text-white social-hover"><i class="fab fa-twitter"></i> Twittere</a>
    </div>

    <div class="col-sm">
      <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp"></i> Whatsapp</a>
    </div>

    <div class="col-sm">
      <a href="#" class="text-white social-hover"><i class="fab fa-instagram"></i> Instagram</a>
    </div>
  </div>
</div>

<!-- End Social Follow -->

<!-- Start About Section -->

<div class="container-fluid p-4" style="background-color: #E9ECEF">
  <div class="container" style="background-color: #E9ECEF">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p>This is nice Construction Group for make a house with high Quality.</p>
      </div>
      <div class="col-sm mb-4">
        <h5>Services</h5>
        <a href="services.php" class="text-dark" style="text-decoration: none;">Architectural Design</a><br />
        <a href="services.php" class="text-dark" style="text-decoration: none;">Structural Engineering And Drafting</a><br />
        <a href="services.php" class="text-dark" style="text-decoration: none;">End To End Construction Services</a><br />
        <a href="services.php" class="text-dark" style="text-decoration: none;">Sale of Construction Systems</a><br />
        <a href="services.php" class="text-dark" style="text-decoration: none;">Turnkey/Greenfield Projects</a><br />
        <a href="services.php" class="text-dark" style="text-decoration: none;">Joint Project Development</a><br />
      </div>
      <div class="col-sm">
        <h5>Contact Now</h5>
        <p>Wages Construction Pvt Ltd<br>
          Near Hanuman Tample,<br>
          Anand Nagar,<br>
          Bhopal (m.p)<br>
          Ph. +91 9516161756<br>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- End About Section  -->

<!-- start footer and Login or Registration Model -->

<?php
  include('./include/footer.php');
?>

<!-- End footer -->




 