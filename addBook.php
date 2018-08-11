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
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
					<input type="text" class="form-control" placeholder="Enter book name" required="true">
				</div>  <br><br>
			  	Price <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                    <input type="text" class="form-control" placeholder="Enter price" required="true">
                </div> 	 <br><br>
				Category <br>
    			<select class="custom-select">
				    <option selected>Choose...</option>
				    <option value="1">Computer</option>
				    <option value="2">Mechanical</option>
				    <option value="3">Civil</option>
			  	</select> <br><br>
			</div>
			<div class="col-lg-6">
				Author <br>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>	
					<input type="text" class="form-control" placeholder="Enter author name" required="true"> 
				</div> <br><br>
				Edition <br>
				<input type="text" class="form-control" placeholder="Enter book edition" required="true"> 
			</div>
	</div>
	Book description <br><br>
	<div class="btn-toolbar" role="toolbar" style="margin-left: 0px; background-color: #9e9e9e;">
		<ul>
			<li class="btn btn-secondary" title="Bold" onclick="boldText();
			"><i class="fa fa-bold"></i></li>
			<li class="btn btn-secondary" title="Italics"><i class="fa fa-italic"></i></li>
			<li class="btn btn-secondary" title="Underline"><i class="fa fa-underline"></i></li>
			<li class="btn btn-secondary" title="Unordered list"><i class="fa fa-list-ul"></i></li>
			<li class="btn btn-secondary" title="Ordered List"><i class="fa fa-list-ol"></i></li>
		</ul>
	</div>
	<textarea class="form-control" rows="5" id="description" placeholder="Enter book's description" style="resize: none;"></textarea><br>
    <input type="submit" class="btn btn-primary" value="REGISTER">
	</form>
</div>
