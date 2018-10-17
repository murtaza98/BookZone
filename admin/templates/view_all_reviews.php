<script>
	$(document).ready(function() {
	    $('#reviewTable').DataTable();
	} );
</script>

<h3 class="text-center"><b><u>ALL REVIEWS</u></b></h3>

<div id="reviewModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px;">&times;</button>
                <h3 class="modal-title"><b>&nbsp;Edit review</b></h3>
            </div>
            <div class="modal-body">
                <form method="post" action="reviews.php">
                    <input id="modal_book_id" type="text" value="" name="book_id" style="display:none;">
                    <textarea id="review_modal" name="review" rows="5" class="form-control" cols="30" rows="10" style="width: 100%; resize: none;" ></textarea>
                    <br>
                    <input type="submit" class="btn btn-primary" name="review_submit">
                </form>                
            </div>
            <div class="modal-footer" style="margin-right: 10px;">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
            </div>	
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
		<table class="table table-bordered table-hover" id="reviewTable">
			<thead>
				<tr>
					<th class="text-center" onclick="sortTable(0)">BookId</th>
					<th class="text-center" onclick="sortTable(1)>Username</th>
					<th class="text-center" onclick="sortTable(2)">BookName</th>
					<th class="text-center" onclick="sortTable(3)">Ratings</th>
					<th class="text-center" onclick="sortTable(4)">Review</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?php
					$query = "SELECT * from reviews";

					$query_result = mysqli_query($connection,$query);

					if(!$query_result){
						die("QUERY FAILED " .mysqli_error($connection));
					}else{
						while ($row = mysqli_fetch_assoc($query_result)) {
							$bookid = $row['book_id'];
							$username = $row['username'];
							$ratings = $row['ratings'];
							$review = $row['review_content'];
							
							$bookquery = "SELECT * FROM books WHERE book_id={$bookid}";
							$bookquery_result = mysqli_query($connection, $bookquery);
							if(!$bookquery_result){
								die("QUERY FAILED " .mysqli_error($connection));
							}else{	
								$bookrow = mysqli_fetch_assoc($bookquery_result);
								$bookname = $bookrow['book_name'];	
							}
				?>
							<tr>
								<td class="text-center"><?php echo $bookid ?></td>
								<td class="text-center"><?php echo $username ?></td>
								<td class="text-center"><?php echo $bookname ?></td>
								<td class="text-center"><?php echo $ratings ?></td>
								<td id="content_<?php echo $bookid; ?>" class="text-center"><?php echo $review ?></td>
								<td  class="text-center">
								    <a data-toggle="modal" href="" data-target="#reviewModal" style="color: white">
								        <button onclick="javacript: showReviewModal(<?php echo $bookid; ?>)" class="btn btn-primary">Edit Review</button>
								    </a>
								</td>
								<td class="text-center">
								    <a onClick="javascript: return confirm('Are you sure you want to delete this review'); " href="reviews.php?delete=<?php echo $bookid ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
				<?php
						}
					}
				?>
			</tbody>						
		</table>
	</div>	
</div>

