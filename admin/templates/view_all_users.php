<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("usersTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<script>
function searchUsers() {
  // Declare variables 
  var input, filter, table, tr, td, i, j;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("usersTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		tr[i].style.display = "";
		} else {
		tr[i].style.display = "none";
		}
	    }
    } 
  }
</script>

<h3 class="text-center"><b><u>ALL USERS</u></b></h3>
<input type="text" class="form-control" id="myInput" onkeyup="searchUsers()" placeholder="Search for names.."><br>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
		<table class="table table-bordered table-hover" id="usersTable">
			<thead>
				<tr>
					<th class="text-center" onclick="sortTable(0)">UserName</th>
					<th class="text-center" onclick="sortTable(1)">Email</th>
					<th class="text-center" onclick="sortTable(2)">Name</th>
					<th class="text-center" onclick="sortTable(3)">Role</th>
					<th class="text-center" onclick="sortTable(4)">City</th>
					<th class="text-center" onclick="sortTable(5)">Pincode</th>
					<th class="text-center" onclick="sortTable(6)">Contact</th>
					<th class="text-center" onclick="sortTable(7)">User Category</th>
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