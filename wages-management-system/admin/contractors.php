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

<title>Wages | Contractors</title>

<div class="col-sm-9 mt-5" style="position: relative;">
				<!-- Table -->
				<p class="bg-dark text-white p-2">List of Contractors</p>
				<?php 
					$sql = "SELECT * from services INNER JOIN contractors ON services.s_id = contractors.s_id";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
				?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">S.No</th>
							<th scope="col">Contractor Name</th>
							<th scope="col">Service Name</th>
							<th scope="col">Contractor Email</th>
							<th scope="col">Mobile Number</th>
							<th scope="col">Joining Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$cnt=1;
							while($row = $result->fetch_assoc()){
						echo '<tr>';
							echo '<td scope="row">' . $cnt . '</td>';
							echo '<td>' . $row['contract_name'] . '</td>';
							echo '<td>' . $row['s_name'] . '</td>';
							echo '<td>' . $row['contract_email'] . '</td>';
							echo '<td>' . $row['contract_mn'] . '</td>';
							echo '<td>' . $row['join_date'] . '</td>';
							echo '<td>';
								echo '<form action="editContractor.php" method="POST" class="d-inline">
										<input type="hidden" name="contract_mn" value='.$row["contract_mn"].'>
										<button class="btn btn-info mr-3" name="view" value="View" type="submit"><i class="fa fa-pen"></i></button>
									</form>';
								echo '<form action="" method="POST" class="d-inline">
										<input type="hidden" name="contract_mn" value='.$row["contract_mn"].'>
										<button class="btn btn-secondary" name="delete" value="delete" type="submit"><i class="fa fa-trash-alt"></i></button>
									</form>';
							echo '</td>';
						 echo '</tr>';
						 $cnt++;
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
						$sql = "DELETE FROM contractors WHERE contract_mn = {$_REQUEST['contract_mn']}";
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
	<a href="addContractor.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>


<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->