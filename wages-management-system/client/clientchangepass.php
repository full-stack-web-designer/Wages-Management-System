<!--start header -->
<?php
if(!isset($_SESSION))
{
	session_start();
}
include('./include/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_login'])){
	$clientEmail = $_SESSION['clientLogEmail'];
}
else{
	echo "<script>location.href = '../index.php';</script>";
}

$clientEmail = $_SESSION['clientLogEmail'];

if(isset($_REQUEST['ChangePass'])){
	if(($_REQUEST['inputnewpass']) == ""){
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}else{
		$sql = "SELECT * FROM client WHERE c_email = '$clientEmail'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$clientPass = $_REQUEST['inputnewpass'];
			$sql = "UPDATE client SET c_pass = '$clientPass' WHERE c_email = '$clientEmail'";
			if($conn->query($sql) == TRUE){
				$Msg = '<div class="alert alert-success col-sm-12 mt-2">Client Password Successfully Updated.</div>';
			}
			else{
				$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Update !</div>';
			}
		}
	}
}

?>
<!-- End header -->

<title>Wages | Update Client Password</title>

<div class="col-sm-9 mt-5">
	<div class="row">
		<div class="col-sm-6">
			<form class="mt-5 mx-5">
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="email" name="inputEmail" class="form-control" id="inputEmail" value="<?php echo $clientEmail; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="inputnewpass">New Password</label>
					<input type="password" name="inputnewpass" class="form-control" id="inputnewpass" placeholder="Enter New Password">
				</div>

				<button class="btn btn-danger mr-4 mt-4" type="submit" name="ChangePass">Update</button>
				<button class="btn btn-secondary mt-4" type="reset" name="Reset">Reset</button>
				<?php if(isset($Msg)) { echo $Msg; } ?>
			</form>
		</div>
	</div>
</div>

<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->