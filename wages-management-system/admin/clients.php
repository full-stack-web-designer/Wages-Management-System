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

<title>Wages | Clients</title>

<div class="col-sm-9 mt-5" style="position: relative;">
				<!-- Table -->
				<p class="bg-dark text-white p-2">List of Clients</p>
				<?php 
					$sql = "SELECT * FROM client";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
				?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">S.No</th>
							<th scope="col">Client Name</th>
							<th scope="col">Client Email</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$cnt = 1;
							while($row = $result->fetch_assoc()){
						echo '<tr>';
							echo '<td scope="row">' . $cnt . '</td>';
							echo '<td>' . $row['c_name'] . '</td>';
							echo '<td>' . $row['c_email'] . '</td>';
							echo '<td>';
								echo '<form action="editclient.php" method="POST" class="d-inline">
										<input type="hidden" name="cid" value='.$row["c_id"].'>
										<button class="btn btn-info mr-3" name="view" value="View" type="submit"><i class="fa fa-pen"></i></button>
									</form>';
								echo '<form action="" method="POST" class="d-inline">
										<input type="hidden" name="cid" value='.$row["c_id"].'>
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
						$sql = "DELETE FROM client WHERE c_id = {$_REQUEST['cid']}";
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
	<a href="addClient.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>


<!-- start footer -->
<?php

include('./include/footer.php');

?>
<!-- End footer-->