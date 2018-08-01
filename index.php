<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/index.css'>";
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>


<div class="container-fluid"  style="background: #fff; border: 10px solid #fff; ">
    <div class="full-width-util input-group" id="searchBox">
        <input type="text" name="q"  class="form-control home-search-bar acInput" placeholder="Search by title, author, semester" autocomplete="on">
        <span class="input-group-btn">
            <button type="submit" value="Search" id="searchButtonInline" class="btn btn-primary no-top-margin">Go!</button>
        </span>
    </div>
</div>
<br>
<div class="container">
    <div class="row" >        
    <!--   id="#category"-->
        <div class="col-sm-3">
            <h2>Categories</h2>
            <?php include "templates/sidebar.php"; ?>
        </div>
    </div>
</div>
	
<?php include "templates/footer.php"; ?>