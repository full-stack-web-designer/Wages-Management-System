<?php 

if(!isset($_SESSION)){
	session_start();
}


include('include/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
	$clientLogEmail = $_SESSION['clientLogEmail'];
}
else{
	echo "<script>location.href='../index.php'</script>";
}

$sql = "SELECT * FROM client WHERE c_email = '$clientLogEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
	$row = $result->fetch_assoc();
	$client_id = $row['c_id'];
	$client_name = $row['c_name'];
	$client_occ = $row['c_occ'];
	$client_img = $row['c_img'];
}

if(isset($_REQUEST['clientNameBtn'])){
	if(isset($_REQUEST['client_name']) == ""){
		$passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields.</div>';
	}
	else{
		
		$client_name = $_REQUEST['client_name'];
		$client_occ = $_REQUEST['client_occ'];
		$client_img = $_FILES['client_img']['name'];
		$client_img_temp = $_FILES['client_img']['tmp_name'];
		$img_folder = '../img/client/'.$client_img;
		move_uploaded_file($client_img_temp, $img_folder);

		$sql = "UPDATE client SET c_name = '$client_name', c_occ = '$client_occ', c_img = '$img_folder' WHERE c_email = '$clientLogEmail'";
		if($conn->query($sql) == TRUE){
			$passmsg = '<div class="alert alert-success col-sm-6 mt-2" role = "alert">Client Details Successfully Updated.</div>';
		}
		else{
			$passmsg = '<div class="alert alert-danger col-sm-6 mt-2" role = "alert">Unable to Update Client Details !</div>';
		}
	}
}

?>
<title>Client Profile</title>
<div class="col-sm-6 mt-5">
	<form class="mx-5" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="client_id">Client Id</label>
			<input type="text" name="client_id" class="form-control" id="client_id" readonly="" value="<?php if(isset($client_id)){ echo $client_id;} ?>">
		</div>

		<div class="form-group">
			<label for="client_email">Client Email</label>
			<input type="email" name="client_email" class="form-control" id="client_email" readonly="" value="<?php echo $clientLogEmail; ?>">
		</div>

		<div class="form-group">
			<label for="client_name">Client Name</label>
			<input type="text" name="client_name" class="form-control" id="client_name" value="<?php if(isset($client_name)){ echo $client_name;} ?>">
		</div>

		<div class="form-group">
			<label for="client_occ">Client Occupation</label>
			<input type="text" name="client_occ" class="form-control" id="client_occ" value="<?php if(isset($client_occ)){ echo $client_occ;} ?>">
		</div>

		<div class="form-group">
			<label for="client_img">Upload Image</label>
			<input type="file" name="client_img" class="form-control-file" id="client_img">
		</div>

		<button type="submit" class="btn btn-primary" name="clientNameBtn">Update</button>
		<?php if(isset($passmsg)) {echo $passmsg;} ?>
	</form>
</div>
</div>
</div>
<?php 
include('include/footer.php');
?>
