
    <title>Our Services</title>

<!-- include header and Navigation -->
<?php
     include('dbconnection.php');
    include('./include/header.php');
?>
<!-- End include header and Navigation -->

<!-- start Our Services page banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="projectimg/ourservices.jpg" alt="ourservices" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>
<!-- End Our services page banner -->


<!-- Start Our Services -->

<div class="container mt-5">
  <h1 class="text-center">Our Services</h1>
  <!--Start 1st card deck -->
 
    <div class="row mb-5">

      <?php 

    $sql = "SELECT * FROM services";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
          $service_id = $row['s_id'];
      echo ' 
       <div class="col-sm-4 mb-4">
      <div class="card">
        <img src="' . str_replace('..', '.', $row['s_img']) . '" alt="simg" style="height:200px;" class="card-img-top img-thumbnail"/>
        <div class="card-body">
          <h5 class="card-title">' . $row['s_name'] . '</h5>
          <p class="card-text" >
          ' . $row['s_decs'] . '
          </p>
        </div>
        <div class="card-footer bg-dark"> 
        <p class="text-white">Create Date: ' . $row['s_creation_date'] . '</p>
        </div>
      </div></div>';
     }
   }
   ?>
  </div>
 
 
</div>

<!-- End Our Services -->



<!-- start footer and Login or Registration Model -->

<?php
  include('./include/footer.php');
?>

<!-- End footer -->
