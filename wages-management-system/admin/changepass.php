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

$adminEmail = $_SESSION['adminLogEmail'];

if(isset($_REQUEST['ChangePass'])){
	if(($_REQUEST['inputnewpass']) == ""){
		$Msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fields</div>';
	}else{
		$sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$adminPass = $_REQUEST['inputnewpass'];
			 $hashPass = password_hash($adminPass, PASSWORD_BCRYPT);  
			$sql = "UPDATE admin SET admin_pass = '$hashPass' WHERE admin_email = '$adminEmail'";
			if($conn->query($sql) == TRUE){
				$Msg = '<div class="alert alert-success col-sm-12 mt-2">Admin Password Successfully Updated.</div>';
			}
			else{
				$Msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Update !</div>';
			}
		}
	}
}

?>
<!-- End header -->

<title>Wages | Update Admin Password</title>

<div class="col-sm-9 mt-5">
	<div class="row">
		<div class="col-sm-6">
			<form class="mt-5 mx-5">
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="email" name="inputEmail" class="form-control" id="inputEmail" value="<?php echo $adminEmail; ?>" readonly>
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