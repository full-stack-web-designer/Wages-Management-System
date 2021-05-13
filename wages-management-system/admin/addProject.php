<!--start header -->
<?php

if(!isset($_SESSION))
{
	session_start();
}
include('./include/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_admin_login'])){
	$adminEmail = $_SESSION['adminLogEmail'];
}
else{
	echo "<script>location.href = '../index.php';</script>";
}
if(isset($_REQUEST['ProjectSubmitBtn']))
{
	if(($_REQUEST['service_name'] == "") || ($_REQUEST['contract_name'] == "") || ($_REQUEST['project_id'] == "") || ($_REQUEST['project_area'] == "") || ($_REQUEST['project_elevation'] == "") || ($_REQUEST['project_configuration'] == "") || ($_REQUEST['project_status'] == "") || ($_REQUEST['project_location'] == "") || ($_FILES['project_img'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$project_id = $_POST['project_id'];
		$service_name = $_POST['service_name'];
		$contract_name = $_POST['contract_name'];
		$project_area = $_POST['project_area'];
		$project_elevation = $_POST['project_elevation'];
		$project_configuration = $_POST['project_configuration'];
		$project_status = $_POST['project_status'];
		$project_location = $_POST['project_location'];
		$project_img = $_FILES['project_img']['name'];
		$project_img_temp = $_FILES['project_img']['tmp_name'];
		$img_folder = '../img/projectimg/'.$project_img;
		move_uploaded_file($project_img_temp, $img_folder);

		$sql = "INSERT INTO projects (p_id, s_id, contract_mn, p_area, p_elevation, p_configuration, p_status, p_location, p_img) VALUES ('$project_id', '$service_name', '$contract_name', '$project_area', '$project_elevation', '$project_configuration', '$project_status', '$project_location', '$img_folder')";
		if($conn->query($sql) == TRUE)
		{
			$Msg = '<div class="alert alert-success col-sm-6 mt-2">Project Successfully Added.</div>';
		}
		else
		{
			$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Add Project !</div>';
		}
	}
}

?>
<!-- End header -->

<title>Wages | Add Project</title>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Project</h3>
	<form action="" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="service_name">Select Service Name</label>
			<select class="form-control" name="service_name" id="service_name" required>

               <option value="">Select Service</option>

                   <?php

                    $sql="SELECT * from services";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                    {    
                   ?>

                    <option value="<?php if(isset($row['s_id'])){ echo $row['s_id'];} ?>"><?php if(isset($row['s_name'])){ echo $row['s_name'];} ?></option>

                   <?php } ?>

             </select>
		</div>

		<div class="form-group">
			<label for="contract_name">Select Contractor Name</label>
			<select class="form-control" name="contract_name" id="contract_name" required>

               <option value="">Select Contractor</option>

                   <?php

                    $sql="SELECT contract_mn,contract_name from contractors";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                    {    
                   ?>

                    <option value="<?php if(isset($row['contract_mn'])){ echo $row['contract_mn'];} ?>"><?php if(isset($row['contract_name'])){ echo $row['contract_name'];} ?></option>

                   <?php } ?>

             </select>
		</div>


		<div class="form-group">
			<label for="project_id">Project Id</label>
			<input type="text" name="project_id" class="form-control" id="project_id">
			<small class="form-text">***Project Id Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="project_area">Project Area</label>
			<input type="text" name="project_area" class="form-control" id="project_area">
		</div>

		<div class="form-group">
			<label for="project_elevation">Project Elevation</label>
			<input type="text" name="project_elevation" class="form-control" id="project_elevation">
		</div>

		<div class="form-group">
			<label for="project_configuration">Project Configuration</label>
			<input type="text" name="project_configuration" class="form-control" id="project_configuration">
		</div>

		<div class="form-group">
			<label for="project_status">Project Status</label>
			<input type="text" name="project_status" class="form-control" id="project_status">
		</div>
		<div class="form-group">
			<label for="project_location">Project Location</label>
			<input type="text" name="project_location" class="form-control" id="project_location">
		</div>

		<div class="form-group">
			<label for="project_img">Project Image</label>
			<input type="file" name="project_img" class="form-control-file" id="project_img">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ProjectSubmitBtn" name="ProjectSubmitBtn">Submit</button>
			<a href="projects.php" class="btn btn-secondary">Close</a>
		</div>

		<?php if(isset($Msg)){ echo $Msg; } ?>

	</form>
</div>
 
<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->