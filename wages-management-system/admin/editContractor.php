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
if(isset($_REQUEST['ContractorUpdateBtn']))
{
	//Checking Empty fileds
	if(($_REQUEST['service_id'] == "") || ($_REQUEST['contract_name'] == "") || ($_REQUEST['contract_mn'] == "") || ($_REQUEST['contract_email'] == "") || ($_REQUEST['join_date'] == ""))
	{
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}
	else
	{
		$service_id = $_POST['service_id'];
		$contract_name = $_POST['contract_name'];
		$contract_mn = $_POST['contract_mn'];
		$contract_email = $_POST['contract_email'];
		$join_date = $_POST['join_date'];


		$sql = "UPDATE contractors SET s_id = '$service_id', contract_name = '$contract_name', contract_mn = '$contract_mn', contract_email = '$contract_email', join_date = '$join_date' WHERE contract_mn = '$contract_mn'";
		if($conn->query($sql) == TRUE)
		{
			$Msg = '<div class="alert alert-success col-sm-6 mt-2">Contractor Details Successfully Updated.</div>';
		}
		else
		{
			$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Update !</div>';
		}
	}
}

?>
<!-- End header -->

<title>Wages | Update Contractor Details</title>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
	<h3 class="text-center">Update Contractor Details</h3>

	<?php
	if(isset($_REQUEST['view'])){
		$sql = "SELECT * from services INNER JOIN contractors ON services.s_id = contractors.s_id WHERE contractors.contract_mn = {$_REQUEST['contract_mn']}";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
	?>


	<form action="" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="service_id">Select Service Name</label>
			<select class="form-control" name="service_id" id="service_id" required>

               <option value="<?php if(isset($row['s_id'])){ echo $row['s_id'];} ?>"><?php if(isset($row['s_name'])){ echo $row['s_name'];} ?></option>

                   <?php

                    $sql1="SELECT s_id,s_name from services";
                    $result1 = $conn->query($sql1);
                    while($row1 = $result1->fetch_assoc())
                    {    
                   ?>

                    <option value="<?php if(isset($row1['s_id'])){ echo $row1['s_id'];} ?>"><?php if(isset($row1['s_name'])){ echo $row1['s_name'];} ?></option>

                   <?php } ?>

             </select>
		</div>

		<div class="form-group">
			<label for="contract_name">Contractor Name</label>
			<input type="text" name="contract_name" class="form-control" id="contract_name" value="<?php if(isset($row['contract_name'])){ echo $row['contract_name'];} ?>">
		</div>

		<div class="form-group">
			<label for="contract_mn">Contractor Mobile Number</label>
			<input type="number" name="contract_mn" class="form-control" id="contract_mn" maxlength="10" value="<?php if(isset($row['contract_mn'])){ echo $row['contract_mn'];} ?>">
			<small class="form-text">***Contractor Mobile Number Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="contract_email">Contractor Email-Id</label>
			<input type="email" name="contract_email" class="form-control" id="contract_email" value="<?php if(isset($row['contract_email'])){ echo $row['contract_email'];} ?>">
			<small class="form-text">***Contractor Email-Id Must Be Uniqe***</small>
		</div>

		<div class="form-group">
			<label for="join_date">Joining Date</label>
			<input type="date" name="join_date" class="form-control" id="join_date" value="<?php if(isset($row['join_date'])){ echo $row['join_date'];} ?>">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-danger" id="ContractorUpdateBtn" name="ContractorUpdateBtn">Submit</button>
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