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

?>
<!-- End header -->

<title>Wages | Projects</title>

<div class="col-sm-9 mt-5" style="position: relative;">
				<!-- Table -->
				<p class="bg-dark text-white p-2">List of Projects</p>
				<?php 
					$sql = "SELECT * from  services INNER JOIN contractors ON services.s_id = contractors.s_id INNER JOIN projects ON contractors.contract_mn = projects.contract_mn";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
				?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Project ID</th>
							<th scope="col">Service Name</th>
							<th scope="col">Contractor Name</th>
							<th scope="col">Area</th>
							<th scope="col">Elevation</th>
							<th scope="col">Configuration</th>
							<th scope="col">Status</th>
							<th scope="col">Location</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							while($row = $result->fetch_assoc()){
						echo '<tr>';
							echo '<td scope="row">' . $row['p_id'] . '</td>';
							echo '<td>' . $row['s_name'] . '</td>';
							echo '<td>' . $row['contract_name'] . '</td>';
							echo '<td>' . $row['p_area'] . '</td>';
							echo '<td>' . $row['p_elevation'] . '</td>';
							echo '<td>' . $row['p_configuration'] . '</td>';
							echo '<td>' . $row['p_status'] . '</td>';
							echo '<td>' . $row['p_location'] . '</td>';
							echo '<td>';
								echo '<form action="editProject.php" method="POST" class="d-inline">
										<input type="hidden" name="id" value='.$row["p_id"].'>
										<button class="btn btn-info mr-3" name="view" value="View" type="submit"><i class="fa fa-pen"></i></button>
									</form>';
								echo '<form action="" method="POST" class="d-inline">
										<input type="hidden" name="id" value='.$row["p_id"].'>
										<button class="btn btn-secondary" name="delete" value="delete" type="submit"><i class="fa fa-trash-alt"></i></button>
									</form>';
							echo '</td>';
						 echo '</tr>';
						 } ?>
					</tbody>
					
				</table>
				<?php }
					else
					{
						echo '<div class="alert alert-secondary col-sm-6 mt-2">No Recode Found.</div>';
					}

					if(isset($_REQUEST['delete']))
					{
						$sql = "DELETE FROM projects WHERE p_id = {$_REQUEST['id']}";
						if($conn->query($sql) == TRUE)
						{
							echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
						}
						else{
							echo '<div class="alert alert-warning col-sm-6 mt-2">Unable to delete data.</div>';
						}
					}
				 ?>

</div>

<!-- plus button -->

<div>
	<a href="addProject.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>


<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->