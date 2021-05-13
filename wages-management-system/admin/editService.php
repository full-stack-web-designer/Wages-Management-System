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
if(isset($_REQUEST['ServiceUpdateBtn']))
{
	//Checking Empty fileds
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
		$service_img = '../img/serviceimg/'.$_FILES['service_img']['name'];
		
		$sql = "UPDATE services SET s_id = '$service_id', s_name = '$service_name', s_decs = '$service_decs', s_creation_date = '$service_create_date', s_img = '$service_img' WHERE s_id = '$service_id'";

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

<title>Wages | Edit Service Details</title>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Update Service Details</h3>
	

	<?php
	if(isset($_REQUEST['view'])){
		$sql = "SELECT * FROM services WHERE s_id = {$_REQUEST['sid']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	?>


	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="service_id">Service Id</label>
			<input type="text" name="service_id" class="form-control" id="service_id" value="<?php if(isset($row['s_id'])){ echo $row['s_id'];} ?>" readonly>
		</div>

		<div class="form-group">
			<label for="service_name">Service Name</label>
			<input type="text" name="service_name" class="form-control" id="service_name" value="<?php if(isset($row['s_name'])){ echo $row['s_name'];} ?>">
		</div>

		<div class="form-group">
			<label for="service_decs">Service Description</label>
			<textarea class="form-control" id="service_decs" name="service_decs" rows="2"><?php if(isset($row['s_decs'])){ echo $row['s_decs'];} ?></textarea>
		</div>

		<div class="form-group">
			<label for="service_create_date">Creation Date</label>
			<input type="date" name="service_create_date" class="form-control" id="service_create_date" value="<?php if(isset($row['s_creation_date'])){ echo $row['s_creation_date'];} ?>">
		</div>

		<div class="form-group">
			<label for="service_img">Service Image</label>
			<img src="<?php if(isset($row['s_img'])){ echo $row['s_img'];} ?>" alt="service img" class="img-thumbnail">
			<input type="file" name="service_img" class="form-control-file" id="service_img">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ServiceUpdateBtn" name="ServiceUpdateBtn">Update</button>
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