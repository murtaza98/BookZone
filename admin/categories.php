<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/categories.css'>";
    }
?>
<?php include "./templates/admin-header.php"; ?>

<?php include "./templates/admin-navigation.php"; ?>

<?php

	if(isset($_POST['add_category'])){
		$category_name = $_POST['category-name'];
		$query = "INSERT INTO categories(category_name,parent_category_id) VALUES('$category_name',0)";
		
	}

?>

<div id="wrapper">
	

	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-sm-12">
					<h3>ADD CATEGORY</h3>
					<form method="POST" action="">
						<div class='form-group'>
	                        <label for="category-name">Category Name</label>
	                        <input name="category-name" type="text" class="form-control" id="category-name" placeholder="Name" required="true">                
	                    </div>
	                    <div class='form-group'>
		                    <input name="add_category" type="submit" class="btn btn-primary" value="ADD CATEGORY">
	                	</div>
					</form>
				</div>
				<div class="col-lg-6 col-sm-12">
					<h2 class="text-center"><b><u>All Categories</u></b></h2>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Parent Category</th>
								<th class="text-center">Sub Category</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM categories";

								$query_result = mysqli_query($connection,$query);

								if(!$query_result){
									die("QUERY FAILED ".mysqli_error($connection));
								}else{
									$num_categories = mysqli_num_rows($query_result);

									if($num_categories===0){
										echo "<h3 class='text-center text-warning'>No category found</h3>";
									}else{
										$category_result = array();
										while ($row = mysqli_fetch_assoc($query_result)) {
											$category_result[] = $row;
										}
										// echo print_r($category_result);

										$parent_category = array();

										foreach($category_result as $category){
											if( $category['parent_category_id'] == 0 ) {
												$category_id = $category['category_id'];
												$category_name = $category['category_name'];
												$parent_category_id = $category['parent_category_id'];
												
												$parent_category[$category_id] = array('category_name'=>$category_name);
											}
										}


										foreach ($category_result as $category) {
											if( $category['parent_category_id'] != 0 ) {
												$category_id = $category['category_id'];
												$category_name = $category['category_name'];
												$parent_category_id = $category['parent_category_id'];

												array_push($parent_category[$parent_category_id], $category); 
											}
										}

										foreach ($parent_category as $indi_category_key => $indi_category_value) {
											$parent_category_id = $indi_category_key;
											$parent_category_name = $indi_category_value['category_name'];
							?>
										<tr>
											<td class="text-center"><?php echo "{$parent_category_id}"; ?></td>
											<td class="text-center"><?php echo "{$parent_category_name}"; ?></td>
											<td class="text-center">-</td>
											<td class="text-center"><a href="#" class="btn btn-primary">Edit</a></td>
											<td class="text-center"><a href="#" class="btn btn-danger">Delete</a></td>
										</tr>
							<?php
											foreach ($indi_category_value as $key => $value) {
												if($key === 'category_name'){
													continue;
												}

												$sub_category_id = $value['category_id'];
												$sub_category_name = $value['category_name'];

							?>
											<tr>
												<td class="text-center"><?php echo "{$sub_category_id}"; ?></td>
												<td class="text-center">|___</td>
												<td class="text-center"><?php echo "{$sub_category_name}"; ?></td>
												<td class="text-center"><a href="#" class="btn btn-primary">Edit</a></td>
												<td class="text-center"><a href="#" class="btn btn-danger">Delete</a></td>
											</tr>
							<?php
											}
										}										
									}
								}
							?>
						</tbody>						
					</table>
				</div>		
			</div>	
		</div>
	</div>

</div>





<?php include "templates/admin-footer.php"; ?>