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

<title>Wages | Services</title>

<div class="col-sm-9 mt-5" style="position: relative;">
				<!-- Table -->
				<p class="bg-dark text-white p-2">List of Services</p>
				<?php 
					$sql = "SELECT * FROM services";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
				?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Service ID</th>
							<th scope="col">Service Name</th>
							<th scope="col">Service Description</th>
							<th scope="col">Creation Date</th>
							<th scope="col">Updation Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							while($row = $result->fetch_assoc()){
						echo '<tr>';
							echo '<td scope="row">' . $row['s_id'] . '</td>';
							echo '<td>' . $row['s_name'] . '</td>';
							echo '<td>' . $row['s_decs'] . '</td>';
							echo '<td>' . $row['s_creation_date'] . '</td>';
							echo '<td>' . $row['s_updation_date'] . '</td>';
							echo '<td>';
								echo '<form action="editService.php" method="POST" class="d-inline">
										<input type="hidden" name="sid" value='.$row["s_id"].'>
										<button class="btn btn-info mr-3" name="view" value="View" type="submit"><i class="fa fa-pen"></i></button>
									</form>';
								echo '<form action="" method="POST" class="d-inline">
										<input type="hidden" name="sid" value='.$row["s_id"].'>
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
						$sql = "DELETE FROM services WHERE s_id = {$_REQUEST['sid']}";
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
	<a href="addService.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>


<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->