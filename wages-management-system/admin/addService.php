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
if(isset($_REQUEST['ServiceSubmitBtn']))
{
	if(($_REQUEST['service_id'] == "") || ($_REQUEST['service_name'] == "") || ($_REQUEST['service_decs'] == "") || ($_REQUEST['service_create_date'] == "") || ($_FILES['service_img'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$service_id = $_POST['service_id'];
		$service_name = $_POST['service_name'];
		$service_decs = $_POST['service_decs'];
		$service_create_date = $_POST['service_create_date'];
		$service_img = $_FILES['service_img']['name'];
		$service_img_temp = $_FILES['service_img']['tmp_name'];
		$img_folder = '../img/serviceimg/'.$service_img;
		move_uploaded_file($service_img_temp, $img_folder);

		$sql = "INSERT INTO services (s_id, s_name, s_decs, s_creation_date, s_img) VALUES ('$service_id', '$service_name', '$service_decs', '$service_create_date', '$img_folder')";
		if($conn->query($sql) == TRUE)
		{
			$Msg = '<div class="alert alert-success col-sm-6 mt-2">Service Successfully Added.</div>';
		}
		else
		{
			$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Add Service !</div>';
		}
	}
}

?>
<!-- End header -->

<title>Wages | Add Service</title>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Service</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="service_id">Service Id</label>
			<input type="text" name="service_id" class="form-control" id="service_id">
			<small class="form-text">***Service Id Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="service_name">Service Name</label>
			<input type="text" name="service_name" class="form-control" id="service_name">
		</div>

		<div class="form-group">
			<label for="service_decs">Service Description</label>
			<textarea class="form-control" id="service_decs" name="service_decs" rows="2"></textarea>
		</div>

		<div class="form-group">
			<label for="service_create_date">Creation Date</label>
			<input type="date" name="service_create_date" class="form-control" id="service_create_date">
		</div>

		<div class="form-group">
			<label for="service_img">Service Image</label>
			<input type="file" name="service_img" class="form-control-file" id="service_img">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ServiceSubmitBtn" name="ServiceSubmitBtn">Submit</button>
			<a href="services.php" class="btn btn-secondary">Close</a>
		</div>

		<?php if(isset($Msg)){ echo $Msg; } ?>

	</form>
</div>
 
<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->