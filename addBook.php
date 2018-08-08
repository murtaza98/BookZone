<?php
    function customPageHeader(){
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<div class="container">
	<form>
		<div class="row">
			<div class="col-lg-6">
				Book Name <br>
				<input type="text" class="form-control" placeholder="Enter book name"> <br><br>
			  	Price <br>
				<input type="text" class="form-control"> <br><br>		
				Category <br>
    			<select class="custom-select" id="inputGroupSelect01">
				    <option selected>Choose...</option>
				    <option value="1">Computer</option>
				    <option value="2">Mechanical</option>
				    <option value="3">Civil</option>
			  	</select> <br><br>
			</div>
			<div class="col-lg-6">
				Author <br>
				<input type="text" class="form-control" placeholder="Enter author name"> <br><br>
				Edition <br>
				<input type="text" class="form-control" placeholder="Enter book edition"> <br><br>
			</div>
	</div>
	</form>
</div>
