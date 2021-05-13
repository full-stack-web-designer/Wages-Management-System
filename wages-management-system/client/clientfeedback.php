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
}

if(isset($_REQUEST['clientFeedbackBtn'])){
	if(isset($_REQUEST['client_feedback']) == ""){
		$passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields.</div>';
	}
	else{
		
		$client_feedback = $_REQUEST['client_feedback'];
	
		$sql1 = "INSERT INTO feedback (f_content,c_id) VALUES ('$client_feedback', '$client_id')";
		if($conn->query($sql1) == TRUE){
			$passmsg = '<div class="alert alert-success col-sm-6 mt-2" role = "alert">Client Feedback Successfully Submited.</div>';
		}
		else{
			$passmsg = '<div class="alert alert-danger col-sm-6 mt-2" role = "alert">Unable to Client Feedback inserted !</div>';
		}
	}
}

?>
<title>Client Feedback</title>
<div class="col-sm-6 mt-5">
	<form class="mx-5" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="client_id">Client Id</label>
			<input type="text" name="client_id" class="form-control" id="client_id" readonly="" value="<?php if(isset($client_id)){ echo $client_id;} ?>">
		</div>

		<div class="form-group">
			<label for="client_feedback">Write Feedback</label>
			<textarea class="form-control" id="client_feedback" name="client_feedback" row="2"></textarea>
		</div>

		<button type="submit" class="btn btn-primary" name="clientFeedbackBtn">Submit</button>
		<?php if(isset($passmsg)) {echo $passmsg;} ?>
	</form>
</div>
</div>

<?php 
include('include/footer.php');
?>