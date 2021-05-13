<!-- start header -->
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
?>
<!-- End header -->

<title>Wages | Admin Dashboard</title>
		<!-- view cards -->
		<div class="col-sm-9 mt-5">
			<div class="row mx-5 text-center">
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
						<div class="card-header">Projects</div>
						<div class="card-body">
							<h4 class="card-title">5</h4>
							<a href="#" class="btn text-white">View</a>
						</div>
					</div>
				</div>

				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
						<div class="card-header">Services</div>
						<div class="card-body">
							<h4 class="card-title">10</h4>
							<a href="#" class="btn text-white">View</a>
						</div>
					</div>
				</div>

				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header">Clients</div>
						<div class="card-body">
							<h4 class="card-title">15</h4>
							<a href="#" class="btn text-white">View</a>
						</div>
					</div>
				</div>
			</div>

			<div class="mx-5 mt-5 text-center">
				<!-- Table -->
				<p class="bg-dark text-white p-2">Complete Projects</p>

				<table class="table">
					<thead>
						<tr>
							<th scope="col">Project ID</th>
							<th scope="col">Client Email</th>
							<th scope="col">Configuration</th>
							<th scope="col">Location</th>
							<th scope="col">Amount</th>
							<th scope="col">Complete Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row">1</td>
							<td>sandeep@gmail.com</td>
							<td>2 BHK</td>
							<td>Indore</td>
							<td>5,00000</td>
							<td>20/10/2020</td>
							<td><button class="btn btn-secondary" name="delete" value="delete" type="submit"><i class="fa fa-trash-alt"></i></button></td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>

	</div>
</div>
<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer -->


</body>
</html>