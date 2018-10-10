<?php
    function customPageHeader(){
    }
?>
<?php include "./templates/header.php"; ?>
<div id="wrapper">
<?php include "./templates/navigation.php"; ?>
<div class= "container close_bookmark_sidebar" id="page-content-wrapper" style="margin: 0px; padding: 0px">	

<div class="container close_bookmark_sidebar" id='container'>
	<div class="container">
		<div style="font-size: 35px;font-weight: 550; font-family: Karla, Arial, Helvetica">Order History</div>
		<div class="table-responsive">          
	  		<table class="table">
	    		<thead>
	      			<tr>
				        <th>Seller Name</th>
				        <th>Book Name</th>
				        <th>Price</th>
				        <th>Date</th>
				        <th>Transaction method</th>
	      			</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    				if (isset($_SESSION['username'])) {
	    					$username = $_SESSION['username'];
	    					$query = "SELECT * FROM buyers WHERE username = '{$username}'";
	    					$query_result = mysqli_query($connection, $query);
	    					if(!$query_result){
	    						die("FAILED" . mysqli_error($connection));
					        }else{
					        	while ($row = mysqli_fetch_assoc($query_result)) {
					        		$seller_username = $row['seller_name'];
					        		$date = $row['date'];
					        		$price = $row['price'];
					        		$transaction_method = $row['transaction_method'];
					        		$book_name = $row['book_name'];	
	    			?>
		      			<tr>
					        <td><?php echo $seller_username; ?></td>
					        <td><?php echo $book_name ?></td>
					        <td><?php echo $price ?></td>
					        <td><?php echo $date ?></td>
					        <td><?php echo $transaction_method ?></td>
		      			</tr>
		      		<?php  
		      			}}}
		      		?>
	    		</tbody>
	  		</table>
	  	</div>
	</div>
<div class="container close_bookmark_sidebar" id='container'>