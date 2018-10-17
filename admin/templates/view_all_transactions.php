<script>
	$(document).ready(function() {
	    $('#orderTable').DataTable();
	} );
</script>

<h3 class="text-center"><b><u>ALL TRANSACTIONS</u></b></h3>
<div class="table-responsive">
	<table class="table table-bordered table-hover" id="orderTable">
		<thead>
			<tr>
				<th class="text-center">Buyer name</th>
				<th class="text-center">Seller name</th>
				<th class="text-center">Book name</th>
				<th class="text-center">Price</th>
				<th class="text-center">Date</th>
				<th class="text-center">Method</th>
			</tr>
		</thead>
		<tbody>

			<?php
				$query = "SELECT * from buyers";

				$query_result = mysqli_query($connection,$query);

				if(!$query_result){
					die("QUERY FAILED " .mysqli_error($connection));
				}else{
					while ($row = mysqli_fetch_assoc($query_result)) {
						$buyername = $row['username'];
						$sellername = $row['seller_name'];
						$bookname = $row['book_name'];
						$date = $row['date'];
						$price = $row['price'];
						$method = $row['transaction_method'];
			?>
						<tr>
							<td class="text-center"><?php echo $buyername ?></td>
							<td class="text-center"><?php echo $sellername ?></td>
							<td class="text-center"><?php echo $bookname ?></td>
							<td class="text-center"><?php echo $price ?></td>
							<td class="text-center"><?php echo $date ?></td>
							<td class="text-center"><?php echo $method ?></td>
						</tr>
			<?php
					}
				}
			?>
		</tbody>						
	</table>	
</div>
