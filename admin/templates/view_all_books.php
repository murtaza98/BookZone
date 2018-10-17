<?php if (isset($_SESSION['edit_book'])): ?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Changes Made</strong>!!!
    </div>'
<?php
	$_SESSION['edit_book'] = null;
	endif 
?>
<script>
	$(document).ready(function() {
	    $('#booksTable').DataTable();
	} );
</script>

<h3 class="text-center"><b><u>ALL BOOKS</u></b></h3>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
		<table class="table table-bordered table-hover" id="booksTable">
			<thead>
				<tr>
					<th class="text-center">SellerName</th>
					<th class="text-center">BookName</th>
					<th class="text-center">Author</th>
					<th class="text-center">Edition</th>
					<th class="text-center">Subject</th>
					<th class="text-center">Price</th>
					<th class="text-center">OriginalPrice</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?php
					$query = "SELECT * from books";

					$query_result = mysqli_query($connection,$query);

					if(!$query_result){
						die("QUERY FAILED " .mysqli_error($connection));
					}else{
						while ($row = mysqli_fetch_assoc($query_result)) {
							$bookid = $row['book_id'];
							$sellername = $row['username'];
							$bookname = $row['book_name'];
							$author = $row['author'];
							$edition = $row['edition'];
							$subject = $row['subject'];
							$price = $row['book_price'];
							$originalprice = $row['book_original_price'];
				?>
							<tr>
								<td class="text-center"><?php echo $sellername ?></td>
								<td class="text-center"><?php echo $bookname ?></td>
								<td class="text-center"><?php echo $author ?></td>
								<td class="text-center"><?php echo $edition ?></td>
								<td class="text-center"><?php echo $subject ?></td>
								<td class="text-center"><?php echo $price ?></td>
								<td class="text-center"><?php echo $originalprice ?></td>
								<td class="text-center"><a href="view_more_books.php?bookid=<?php echo $bookid ?>" class="btn btn-primary">View More</a></td>
								<td class="text-center"><a href="books.php?source=edit_book&editId=<?php echo $bookid ?>" class="btn btn-primary">Edit</a></td>
								<td class="text-center"><a onClick="javascript: return confirm('Are you sure you want to delete this review'); " href="books.php?delete=<?php echo $bookid ?>" class="btn btn-danger">Delete</a></td>
							</tr>
				<?php
						}

					}

				?>
			</tbody>						
		</table>
	</div>	
</div>	


<!-- SELECT * FROM `books` ORDER BY `books`.`date` DESC
SELECT * FROM `books` ORDER BY `books`.`username` ASC
SELECT * FROM `books` ORDER BY `books`.`book_name` ASC
 -->