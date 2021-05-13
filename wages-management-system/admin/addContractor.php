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
if(isset($_REQUEST['ContractorSubmitBtn']))
{
	if(($_REQUEST['service_name'] == "") || ($_REQUEST['contract_name'] == "") || ($_REQUEST['contract_mn'] == "") || ($_REQUEST['contract_email'] == "") || ($_REQUEST['join_date'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$service_name = $_POST['service_name'];
		$contract_name = $_POST['contract_name'];
		$contract_mn = $_POST['contract_mn'];
		$contract_email = $_POST['contract_email'];
		$join_date = $_POST['join_date'];

		$sql = "INSERT INTO contractors (s_id, contract_name, contract_mn, contract_email, join_date) VALUES ('$service_name', '$contract_name', '$contract_mn', '$contract_email', '$join_date')";
		if($conn->query($sql) == TRUE)
		{
			$Msg = '<div class="alert alert-success col-sm-6 mt-2">Contractor Successfully Added.</div>';
		}
		else
		{
			$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Add Contractor !</div>';
		}
	}
}

?>
<!-- End header -->

<title>Wages | Add Contractor</title>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Add New Contractor</h3>
	<form action="" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="service_name">Select Service Name</label>
			<select class="form-control" name="service_name" id="service_name" required>

               <option value="">Select Service</option>

                   <?php

                    $sql="SELECT s_id,s_name from services";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                    {    
                   ?>

                    <option value="<?php if(isset($row['s_id'])){ echo $row['s_id'];} ?>"><?php if(isset($row['s_name'])){ echo $row['s_name'];} ?></option>

                   <?php } ?>

             </select>
		</div>

		<div class="form-group">
			<label for="contract_name">Contractor Name</label>
			<input type="text" name="contract_name" class="form-control" id="contract_name">
		</div>

		<div class="form-group">
			<label for="contract_mn">Contractor Mobile Number</label>
			<input type="number" name="contract_mn" class="form-control" id="contract_mn" maxlength="10">
			<small class="form-text">***Contractor Mobile Number Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="contract_email">Contractor Email-Id</label>
			<input type="email" name="contract_email" class="form-control" id="contract_email">
			<small class="form-text">***Contractor Email-Id Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="join_date">Joining Date</label>
			<input type="date" name="join_date" class="form-control" id="join_date">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ContractorSubmitBtn" name="ContractorSubmitBtn">Submit</button>
			<a href="contractors.php" class="btn btn-secondary">Close</a>
		</div>

		<?php if(isset($Msg)){ echo $Msg; } ?>

	</form>
</div>
 
<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->