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
if(isset($_REQUEST['ClientSubmitBtn']))
{
	if(($_REQUEST['c_name'] == "") || ($_REQUEST['c_email'] == "") || ($_REQUEST['c_pass'] == "") || ($_REQUEST['c_occu'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_occu = $_POST['c_occu'];
		
		$sql = "INSERT INTO client (c_name, c_email, c_pass, c_occ) VALUES ('$c_name', '$c_email', '$c_pass', '$c_occu')";
		if($conn->query($sql) == TRUE)
		{
			$Msg = '<div class="alert alert-success col-sm-6 mt-2">Client Successfully Added.</div>';
		}
		else
		{
			$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Add Client !</div>';
		}
	}
}

?>
<!-- End header -->

<title>Wages | Add Client</title>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Client</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="c_name">Client Name</label>
			<input type="text" name="c_name" class="form-control" id="c_name">
		</div>

		<div class="form-group">
			<label for="c_email">Email-Id</label>
			<input type="email" name="c_email" class="form-control" id="c_email">
			<small class="form-text">***Client email-id Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="c_pass">Create Password</label>
			<input type="password" name="c_pass" class="form-control" id="c_pass">
		</div>

		<div class="form-group">
			<label for="c_occu">Client Occupation</label>
			<input type="text" name="c_occu" class="form-control" id="c_occu">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ClientSubmitBtn" name="ClientSubmitBtn">Submit</button>
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