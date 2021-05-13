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
//Update fileds code
if(isset($_REQUEST['projectUpdateBtn']))
{
	//Checking Empty fileds
	if(($_REQUEST['project_id'] == "") || ($_REQUEST['project_area'] == "") || ($_REQUEST['project_elevation'] == "") || ($_REQUEST['project_configuration'] == "") || ($_REQUEST['project_status'] == "") || ($_REQUEST['project_location'] == "") || ($_FILES['project_img'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$project_id = $_POST['project_id'];
		$project_area = $_POST['project_area'];
		$project_elevation = $_POST['project_elevation'];
		$project_configuration = $_POST['project_configuration'];
		$project_status = $_POST['project_status'];
		$project_location = $_POST['project_location'];
		$project_img = '../img/projectimg/'.$_FILES['project_img']['name'];
		
		$sql = "UPDATE projects SET p_id = '$project_id', p_area = '$project_area', p_elevation = '$project_elevation', p_configuration = '$project_configuration', p_status = '$project_status', p_location = '$project_location', p_img = '$project_img' WHERE p_id = '$project_id'";

		if($conn->query($sql) == TRUE){
			$Msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully.</div>';
		}else
		{
			$Msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update !</div>';
		}

	}
}

?>
<!-- End header -->

<title>Wages | Edit Project Details</title>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Update Project Details</h3>
	

	<?php
	if(isset($_REQUEST['view'])){
		$sql = "SELECT * from  services INNER JOIN contractors ON services.s_id = contractors.s_id INNER JOIN projects ON contractors.contract_mn = projects.contract_mn WHERE projects.p_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	?>


	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="project_id">Project Id</label>
			<input type="text" name="project_id" class="form-control" id="project_id" value="<?php if(isset($row['p_id'])){ echo $row['p_id'];} ?>" readonly>
		</div>

		<div class="form-group">
			<label for="service_name">Select Service Name</label>
			<select class="form-control" name="service_name" id="service_name" required readonly>

               <option value="<?php if(isset($row['s_id'])){ echo $row['s_id'];} ?>"><?php if(isset($row['s_name'])){ echo $row['s_name'];} ?></option>

                   <?php

                    $sql1="SELECT * from services";
                    $result1 = $conn->query($sql1);
                    while($row1 = $result1->fetch_assoc())
                    {    
                   ?>

                    <option value="<?php if(isset($row1['s_id'])){ echo $row1['s_id'];} ?>"><?php if(isset($row1['s_name'])){ echo $row1['s_name'];} ?></option>

                   <?php } ?>

             </select>
		</div>

		<div class="form-group">
			<label for="contract_name">Select Contractor Name</label>
			<select class="form-control" name="contract_name" id="contract_name" required readonly>

               <option value="<?php if(isset($row['contract_mn'])){ echo $row['contract_mn'];} ?>"><?php if(isset($row['contract_name'])){ echo $row['contract_name'];} ?></option>

                   <?php

                    $sql2="SELECT contract_mn,contract_name from contractors";
                    $result2 = $conn->query($sql2);
                    while($row2 = $result2->fetch_assoc())
                    {    
                   ?>

                    <option value="<?php if(isset($row2['contract_mn'])){ echo $row2['contract_mn'];} ?>"><?php if(isset($row2['contract_name'])){ echo $row2['contract_name'];} ?></option>

                   <?php } ?>

             </select>
		</div>

		<div class="form-group">
			<label for="project_area">Project Area</label>
			<input type="text" name="project_area" class="form-control" id="project_area" value="<?php if(isset($row['p_area'])){ echo $row['p_area'];} ?>">
		</div>

		<div class="form-group">
			<label for="project_elevation">Project Elevation</label>
			<input type="text" name="project_elevation" class="form-control" id="project_elevation" value="<?php if(isset($row['p_elevation'])){ echo $row['p_elevation'];} ?>">
		</div>

		<div class="form-group">
			<label for="project_configuration">Project Configuration</label>
			<input type="text" name="project_configuration" class="form-control" id="project_configuration" value="<?php if(isset($row['p_configuration'])){ echo $row['p_configuration'];} ?>">
		</div>

		<div class="form-group">
			<label for="project_status">Project Status</label>
			<input type="text" name="project_status" class="form-control" id="project_status" value="<?php if(isset($row['p_status'])){ echo $row['p_status'];} ?>">
		</div>
		<div class="form-group">
			<label for="project_location">Project Location</label>
			<input type="text" name="project_location" class="form-control" id="project_location" value="<?php if(isset($row['p_location'])){ echo $row['p_location'];} ?>">
		</div>

		<div class="form-group">
			<label for="project_img">Project Image</label>
			<img src="<?php if(isset($row['p_img'])){ echo $row['p_img'];} ?>" alt="project img" class="img-thumbnail">
			<input type="file" name="project_img" class="form-control-file" id="project_img">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="projectUpdateBtn" name="projectUpdateBtn">Update</button>
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