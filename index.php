<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/index.css'>";
    }
?>

<?php include "./templates/header.php"; ?>

<?php include "./templates/navigation.php"; ?>

<!-- search box start -->
<div class="container-fluid"  style="background: #fff; border: 10px solid #fff; ">
    <div class="full-width-util input-group" id="searchBox">
        <input type="text" name="q"  class="form-control home-search-bar acInput" placeholder="Search by title, author, semester" autocomplete="on">
        <span class="input-group-btn">
            <button type="submit" value="Search" id="searchButtonInline" class="btn btn-primary no-top-margin">Go!</button>
        </span>
    </div>
</div>
<!-- search box end -->

<br>
<div class="container">
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
                    $product_query = "SELECT * FROM books WHERE category_id = {$single_category_id}";

                    $product_query_result = mysqli_query($connection,$product_query);

                    if(!$product_query_result){
                        die("QUERY FAILED ".mysqli_error($connection));
                    }else{
                        $num_products = mysqli_num_rows($product_query_result);
                        if($num_products!=0){
                            if(!$title_printed){
                                echo "<h3>{$category_name}</h3>";
                                //row div started
                                echo "<div class='row'>";
                                $title_printed = true;
                            }
                            while($product_row = mysqli_fetch_assoc($product_query_result)){
                                $book_id = $product_row['book_id'];
                                $book_name = $product_row['book_name'];
                                $book_author = $product_row['author'];
                                $book_edition = $product_row['edition'];
                                $book_subject = $product_row['subject'];
                                $book_price = $product_row['book_price'];
                                $book_image = $product_row['book_image'];
?>
                                <div class="col-sm-6 col-md-3 col-lg-3 col-xs-6"> 
                                    <div class="thumbnail">
                                        <a href="book_details.php?book_id=<?php echo $book_id?>">
                                            <img src="includes/images/<?php echo $book_image ?>" alt="<?php echo $book_name ?>" style="width:100%; height: 230px;">
                                            <div class="caption" style="height: 60px">
                                                <p align="center"><?php echo $book_name ?></p>
                                            </div>
                                        </a>
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
	
<?php include "templates/footer.php"; ?>
