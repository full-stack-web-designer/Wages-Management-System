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
if(isset($_REQUEST['ClientUpdateBtn']))
{
	//Checking Empty fileds
	if(($_REQUEST['c_id'] == "") || ($_REQUEST['c_name'] == "") || ($_REQUEST['c_email'] == "") || ($_REQUEST['c_pass'] == "") || ($_REQUEST['c_occu'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$c_id = $_POST['c_id'];
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_occu = $_POST['c_occu'];
		
		$sql = "UPDATE client SET c_name = '$c_name', c_email = '$c_email', c_occ = '$c_occu', c_pass = '$c_pass' WHERE c_id = $c_id";

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

<title>Wages | Edit Client Details</title>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Update Client Details</h3>
	

	<?php
	if(isset($_REQUEST['view'])){
		$sql = "SELECT * FROM client WHERE c_id = {$_REQUEST['cid']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	?>


	<form action="" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="c_name">Client ID</label>
			<input type="text" name="c_id" class="form-control" id="c_id" value="<?php if(isset($row['c_id'])) { echo $row['c_id']; } ?>" readonly>
		</div>

		<div class="form-group">
			<label for="c_name">Client Name</label>
			<input type="text" name="c_name" class="form-control" id="c_name" value="<?php if(isset($row['c_name'])) { echo $row['c_name']; } ?>">
		</div>

		<div class="form-group">
			<label for="c_email">Email-Id</label>
			<input type="email" name="c_email" class="form-control" id="c_email" value="<?php if(isset($row['c_email'])) { echo $row['c_email']; } ?>">
			<small class="form-text">***Client email-id Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="c_pass">Password</label>
			<input type="password" name="c_pass" class="form-control" id="c_pass" value="<?php if(isset($row['c_pass'])) { echo $row['c_pass']; } ?>">
		</div>

		<div class="form-group">
			<label for="c_occu">Client Occupation</label>
			<input type="text" name="c_occu" class="form-control" id="c_occu" value="<?php if(isset($row['c_occ'])) { echo $row['c_occ']; } ?>">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ClientUpdateBtn" name="ClientUpdateBtn">Update</button>
			<a href="clients.php" class="btn btn-secondary">Close</a>
		</div>

		<?php if(isset($Msg)){ echo $Msg; } ?>

	</form>

</div>



<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->