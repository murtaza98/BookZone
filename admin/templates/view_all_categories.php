<?php if (isset($_SESSION['edit_category'])): ?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Changes Made</strong>!!!
    </div>'
<?php
	$_SESSION['edit_category'] = null;
	endif 
?>

<?php if (isset($_SESSION['add_category'])): ?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>New category added</strong>!!!
    </div>
<?php
	$_SESSION['add_category'] = null;
	endif 
?>
<script>
	$(document).ready(function() {
	    $('#categoriesTable').DataTable();
	} );
</script>
<div class="row">
	<h3 class="text-center"><b><u>ALL CATEGORIES</u></b></h3>
	<div class="col-sm-4">
		<h3>ADD CATEGORY</h3>
			<form method="POST" action="add_category.php">
				<div class='form-group'>
                    <label for="category-name">Category Name</label>
                    <input name="category-name" type="text" class="form-control" id="category-name" placeholder="Name" required="true">                
                </div>
                <div class='form-group'>
                    <input name="add_category" type="submit" class="btn btn-primary" value="ADD CATEGORY">
            	</div>
			</form>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 table-responsive">
		<br>
		<table class="table table-bordered table-hover" id="categoriesTable">
			<thead>
				<tr>
					<th class="text-center">Category Id</th>
					<th class="text-center">Category name</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?php
					$query = "SELECT * from categories";

					$query_result = mysqli_query($connection,$query);

					if(!$query_result){
						die("QUERY FAILED " .mysqli_error($connection));
					}else{
						while ($row = mysqli_fetch_assoc($query_result)) {
							$category_id = $row['category_id'];
							$category_name = $row['category_name']
				?>
							<tr>
								<td class="text-center"><?php echo $category_id ?></td>
								<td class="text-center"><?php echo $category_name ?></td>
								<td class="text-center"><a href="categories.php?source=edit_category&edit=<?php echo $category_id ?>" class="btn btn-primary">Edit</a></td>
								<td class="text-center"><a onClick="javascript: return confirm('Are you sure you want to delete this review'); " href="categories.php?delete=<?php echo $category_id ?>" class="btn btn-danger">Delete</a></td>
							</tr>
				<?php
						}

					}

				?>
			</tbody>						
		</table>	
	</div>
</div>




		