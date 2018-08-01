<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/visitor.css'>";
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>


<div class="container-fluid"  style="background: #e7f8f2; border: 10px solid #e7f8f2; ">
    <div class="input-group input-group full-width-util">
        <input type="text" name="q" id="searchBox" class="form-control home-search-bar acInput" placeholder="Search by title, author, semester" autocomplete="on">
        <button type="submit" value="Search" id="searchButtonInline" class="btn btn-primary no-top-margin">Go </button>
    </div>
</div>
<br>
<div class="container">
    <div class="row"  id="#category" >        
    <!--   id="#category"-->
        <div class="col-sm-3">
            <h2>Categories</h2>
            <?php include "templates/sidebar.php"; ?>
        </div>
    </div>
</div>
	
<?php include "templates/footer.php"; ?>