<?php
function customPageHeader(){
    echo "<link rel='stylesheet' type='text/css' href='includes/css/main_page.css'>";
    echo "<script type='text/javascript' src='includes/javascript/main_page.js'></script>";
    
}
?>
<?php include "./templates/header.php"; ?>
<style type="text/css">
    .viewMore {
        height: 300px;
        background-color: #d5e6f3
    }
    .books {
        padding-right: 15px;
        padding-left: 5px;
    }
</style>

<?php 
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $verify_query = "SELECT * FROM users WHERE username = '{$username}'";
        
        $verify_query_result = mysqli_query($connection,$verify_query);
        
        if(!$verify_query_result){
            die("FAILED" . mysqli_error($connection));
        }else{
            $verify_row = mysqli_fetch_assoc($verify_query_result);
            $email_id = $verify_row['email'];
            $username = $verify_row['username'];
            $is_verified = $verify_row['is_verified'];
            if ($is_verified == 'false') {
                header("Location: verify_user.php?email_id='{$email_id}'&username='{$username}'");
            }
        }
    }
?>
<div id="wrapper">
<?php include "./templates/navigation.php"; ?>
<div class= "container close_bookmark_sidebar" id="page-content-wrapper" style="margin: 0px; padding: 0px">
<div class="container-fluid row" style=" background-image:url('includes/images/image1.jpg'); background-repeat: no-repeat; background-size:100% 100%; height: 400px;">

<br>
<br>

<!--<p align="center" style="color: #484848; font-size: 30px;font-family: fantasy;">Buy and Sell Books Online</p>-->

<p align="center" style="color: white; font-size: 30px;font-family: fantasy;">Buy and Sell Books Online</p>
<!-- search box start -->
<form method="GET" action="./search.php">
    <div class="container-fluid close_bookmark_sidebar autocomplete" style="background-color: transparent; margin-top: 20px;">
        <div class="full-width-util input-group" id="searchBox">
            <input id="myInput" type="text" name="search"  class="form-control home-search-bar acInput" placeholder="Search by Book title.." autocomplete="off" style="width:100%; background-color:#fff" required>
            <span class="input-group-btn">
                <button type="submit" value="Search" id="searchButtonInline" class="btn btn-primary no-top-margin">Go!</button>
            </span>
        </div>
        <div id="parent_element" style="background-color:white;"></div>
    </div>
</form>
<!--
<form autocomplete="off" action="" style="margin:0 auto;">
  <span class="autocomplete" style="width:300px;margin: 0 auto;">
    <input id="myInput" type="text" name="myCountry" placeholder="Country">
  </span>
  <span>
      <input type="submit">
  </span>
</form>
-->
<!-- search box end -->

<script>

    autocomplete(document.getElementById("myInput"),document.getElementById("parent_element"));
    
</script>

</div>
<br>
<div class="container close_bookmark_sidebar" id='container'>
    <div class="row" >
    <!--   id="#category"-->
        <div class="col-sm-3">
            <h2>Categories</h2>
            <?php include "templates/sidebar.php"; ?>
        </div>
		<div class="col-sm-9">

<?php
        $query = "SELECT * FROM categories WHERE parent_category_id = 0";

        $category_result = mysqli_query($connection,$query);

        if(!$category_result){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
            while($category_row = mysqli_fetch_assoc($category_result)){
                $category_id = $category_row['category_id'];
                $category_name = $category_row['category_name'];

                //THIS ARRAY WILL CONTAIN ALL CATGORIES AND SUB CATEGORY IDS FOR A PARTICULAR CATEGORY
                $all_category_ids = array();
                $all_category_ids[] = $category_id;


                //DO ONE MORE CALL AND FIND ALL SUB CATEGORIES

                //THE PRESENT MEHTOD WILL ONLY WORK FOR ONE NESTED SUB-CATEGORY
                //TO MAKE IT WORK FOR MORE NESTED SUB CATEGORIES, USE  AND USE QUEUES
                //REFERENCE https://stackoverflow.com/questions/15741398/best-way-to-store-categories-and-product-type-in-db

                $sub_query = "SELECT * FROM categories WHERE parent_category_id = {$category_id}";

                $sub_query_result = mysqli_query($connection,$sub_query);

                if(!$sub_query_result){
                    die("QUERY FAILED ".mysqli_error($connection));
                }else{
                    while($sub_query_row = mysqli_fetch_assoc($sub_query_result)){
                        $sub_category_id = $sub_query_row['category_id'];
                        $all_category_ids[] = $sub_category_id;
                    }
                }


                $title_printed =false;

                foreach ($all_category_ids as $single_category_id) {
                    $product_query = "SELECT * FROM books WHERE category_id = {$single_category_id} AND book_status='available' ORDER BY date DESC";

                    $product_query_result = mysqli_query($connection,$product_query);

                    if(!$product_query_result){
                        die("QUERY FAILED ".mysqli_error($connection));
                    }else{
                        $num_products = mysqli_num_rows($product_query_result);
                        if($num_products != 0){
                            if(!$title_printed){
                                $count = 0;
                                echo "<h3>{$category_name}</h3>";
                                //row div started
                                echo "<div class='row'>";
                                $title_printed = true;
                            }

                            while($count < 4 && $product_row = mysqli_fetch_assoc($product_query_result)){
                                $count = $count + 1;
                                $book_id = $product_row['book_id'];
                                $book_name = $product_row['book_name'];
                                $book_author = $product_row['author'];
                                $book_edition = $product_row['edition'];
                                $book_subject = $product_row['subject'];
                                $book_price = $product_row['book_price'];
                                $book_image = $product_row['book_image'];
?>
                                <div class="books col-sm-6 col-md-3 col-lg-3 col-xs-6">
                                    <div class="thumbnail">
                                        <div class="w3-display-container w3-hover-opacity">
                                            <img src="includes/images/<?php echo $book_image ?>" alt="<?php echo $book_name ?>" style="width:100%; height: 230px;">
                                            <div class="w3-display-middle w3-display-hover">
                                                <a href="book_details.php?book_id=<?php echo $book_id?>">
                                                    <button class="w3-button" style="background-color: #0b113e; color: white">View Details</button></a>
                                            </div>
                                            <div class="w3-display-topright w3-display-hover">
                                                <a onclick="showQuickView('<?php echo $book_name; ?>','<?php echo $book_author; ?>','<?php echo $book_price; ?>','<?php echo $book_subject; ?>','<?php echo $book_image; ?>','<?php echo $book_id; ?>');" data-toggle="modal" href="" data-target="" style="color: white" title="quick look"><button><span class="glyphicon glyphicon-zoom-in" style="color: black"></span></button></a>
                                            </div>
                                        </div>
                                            <div class="caption" style="height: 60px; border-top: 5px solid blue">
                                                <p align="center"><?php echo $book_name ?></p>
                                            </div>
                                    </div>
                                </div>
<?php
                            }
                        }
                    }
                }
                if($title_printed){
                    //row div end
                    echo "</div>";
                }
            }
        }
?>
		</div>
    </div>
</div>

<div id="quick_view" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span><h4 style="width: auto;">Quick Look</h4>
                <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px; width: auto;">&times;</button></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">
                        <img style="max-width:300px;max-height:300px;" id="modal_image" src="">
                    </div>
                    <div class="col-sm-7">
                        <div id="modal_name" style="font-size:28px; font-weight:500;"></div>
                        by <span id="modal_author" style="font-size:20px; font-weight:400;"></span><br><br>
                        Subject <span id="modal_subject" style="font-size:18px; font-weight:400;"></span><br><br>
                        &#8377<span id="modal_price" style="font-size:20px; font-weight:400;"></span><br><br>
                        <a id="modal_view_more" class="btn btn-primary">View More</a>
                    </div>
                </div>
            <div class="modal-footer" style="margin-right: 10px;">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include "templates/footer.php"; ?>
