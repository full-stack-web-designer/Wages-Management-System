<title>Project Detail</title>

<!-- include header and Navigation -->
<?php
     include('dbconnection.php');
    include('./include/header.php');
?>
<!-- End include header and Navigation -->

<!-- start Course detail page banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="img/coursedetail.png" alt="DetailProject" style="height:400px; width:100%; object-fit:cover; box-shadow:10px; margin-top: 80px;" />
    </div>
</div>
<!-- End Course detail page banner -->

<!-- start course detail content -->

<div class="container mt-5 mb-3"> 
     <?php 

        if(isset($_GET['p_id'])){
            $project_id = $_GET['p_id'];
            $sql = "SELECT * FROM projects WHERE p_id = '$project_id'";
           $result = $conn->query($sql);
           $row = $result->fetch_assoc();
        }

        ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..', '.', $row['p_img']); ?>" alt="Project" class="card-img-top" height="180px" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Project Name: Project <?php echo $row['p_id']; ?></h5>
                <p class="card-text"><b>Execution Date:</b> <?php echo $row['p_date']; ?></p>
            </div>
        </div>
    </div>

    <div class="container p-2">

        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Project Detail</th>
                        <th scope="col">Values</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Area</th>
                        <td><?php echo $row['p_area']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Elevation</th>
                        <td><?php echo $row['p_elevation']; ?></td>
                    </tr>
                    <tr>
                       <th scope="row">Configuration</th>
                        <td><?php echo $row['p_configuration']; ?></td> 
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td><?php echo $row['p_status']; ?></td> 
                    </tr>
                    <tr>
                       <th scope="row">Location</th>
                        <td><?php echo $row['p_location']; ?></td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- End course detail content -->

<!-- start footer and Login or Registration Model -->

<?php
  include('./include/footer.php');
?>

<!-- End footer -->

