<script>
	$(document).ready(function() {
	    $('#usersTable').DataTable();
	} );
</script>

<h3 class="text-center"><b><u>ALL USERS</u></b></h3>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
		<table class="table table-bordered table-hover" id="usersTable">
			<thead>
				<tr>
					<th class="text-center">UserName</th>
					<th class="text-center">Email</th>
					<th class="text-center">Name</th>
					<th class="text-center">Role</th>
					<th class="text-center">City</th>
					<th class="text-center">Pincode</th>
					<th class="text-center">Contact</th>
					<th class="text-center">User Category</th>
					<th class="text-center"></th>
					<th class="text-center"></th>
				</tr>
			</thead>
			<tbody>

				<?php
					$query = "SELECT * from users WHERE username != 'admin' ORDER BY date DESC" ;

					$query_result = mysqli_query($connection,$query);

					if(!$query_result){
						die("QUERY FAILED " .mysqli_error($connection));
					}else{
						while ($row = mysqli_fetch_assoc($query_result)) {
							$username = $row['username'];
							$email = $row['email'];
							$name = $row['first_name'] . " " . $row['middle_name']. " " .$row['last_name'];
							$role = $row['role'];
							$city = $row['city'];
							$pincode = $row['pincode'];
							$user_category = $row['user_category'];
							$contactQuery = "SELECT contact_no FROM contacts WHERE username='$username'";
						    $contacts_set = mysqli_query($connection, $contactQuery);
						    if(!$contacts_set){
						            die("QUERY FAILED ".mysqli_error($connection));
					        }else{
					                $contact_row = mysqli_fetch_assoc($contacts_set); 
					                $contact = $contact_row['contact_no'];  
					        } 
				?>
							<tr>
								<td class="text-center"><?php echo $username ?></td>
								<td class="text-center"><?php echo $email ?></td>
								<td class="text-center"><?php echo $name ?></td>
								<td class="text-center"><?php echo $role ?></td>
								<td class="text-center"><?php echo $city ?></td>
								<td class="text-center"><?php echo $pincode ?></td>
								<td class="text-center"><?php echo $contact ?></td>
								<td class="text-center"><?php echo $user_category ?></td>
								<td class="text-center"><a href="users.php?source=edit_user&edit=<?php echo $username ?>" class="btn btn-primary">Edit</a></td>
								<td class="text-center"><a onClick="javascript: return confirm('Are you sure you want to delete this review'); " href="users.php?delete=<?php echo $username ?>" class="btn btn-danger">Delete</a></td>
							</tr>
				<?php
						}

					}

				?>
			</tbody>						
		</table>
	</div>	
</div>	