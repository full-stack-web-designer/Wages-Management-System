
    <title>All Projects</title>

<!-- include header and Navigation -->
<?php
  include('dbconnection.php');
    include('./include/header.php');
?>
<!-- End include header and Navigation -->

<!-- start courses page banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="projectimg/projectbanner.jpg" alt="ProjectBanner" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>
<!-- End courses page banner -->


<!-- Start Most Popular Projects -->

<div class="container mt-5 mb-5">
  <h1 class="text-center">All Projects</h1>
  <div class="row">
  <?php 

    $sql = "SELECT * FROM projects";
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
</div>

<!-- End Most Popular Projects -->



<!-- start footer and Login or Registration Model -->

<?php
  include('./include/footer.php');
?>

<!-- End footer -->
