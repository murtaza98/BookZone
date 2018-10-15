<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/book_details.css'>";
        echo "<script type='text/javascript' src='includes/javascript/ratings.js'></script>";
        echo "<script type='text/javascript' src='includes/javascript/book_details.js'></script>";
        echo "<script type='text/javascript' src='includes/javascript/reviews.js'></script>";
        // echo '<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>';
    }
?>
<?php include "./templates/header.php"; ?>
<div id="wrapper">
<?php include "./templates/navigation.php"; ?>
<div class= "container close_bookmark_sidebar" id="page-content-wrapper" style="margin: 0px; padding: 0px">

<?php
    if(isset($_GET['book_id'])){
        $book_id = $_GET['book_id'];
        $query = "SELECT * FROM books WHERE book_id = $book_id";
        
        $query_result = mysqli_query($connection,$query);
        
        if(!$query_result){
           header("Location: error.php");
        }
        $num_rows = mysqli_num_rows($query_result);
        if($num_rows==1){
            while($row = mysqli_fetch_assoc($query_result)){
                $book_name = $row['book_name'];
                $seller_username = $row['username'];
                $author = $row['author'];
                $edition = $row['edition'];
                $subject = $row['subject'];
                $category_id = $row['category_id'];
                $book_price = $row['book_price'];
                $book_original_price = $row['book_original_price'];
                $book_description = $row['book_description'];
                $book_image = $row['book_image'];
                $book_status = $row['book_status'];
                $date = $row['date'];
            }
        }
        
        
        //For loading category
        $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
        $query_result = mysqli_query($connection,$query);
        if(!$query_result){
            header("Location: error.php");
        }
        $num_rows = mysqli_num_rows($query_result);
        if($num_rows != 0){
            while($row = mysqli_fetch_assoc($query_result)){
                $category_name_temp = $row['category_name'];
                $parent_category_id = $row['parent_category_id'];
                if($parent_category_id == 0){
                    //IT has no parent
                    $category_name = $category_name_temp;
                }else{
                    //get the parent category name
                    $query_parent = "SELECT * FROM categories WHERE category_id = {$parent_category_id}";
                    
                    $query_result_parent = mysqli_query($connection,$query_parent);
                    
                    if(!$query_result_parent){
                        die("FAILED" . mysqli_error($connection));
                    }else{
                        $num_rows = mysqli_num_rows($query_result_parent);
                        if($num_rows != 0){
                            while($row_parent = mysqli_fetch_assoc($query_result_parent)){
                                $parent_category_name = $row_parent['category_name'];
                                
                                $category_name = $parent_category_name . ' -> ' . $category_name_temp;
                            }
                        }else{
                            //some error occured, print only chid category
                            $category_name = $category_name_temp;
                        }
                    }
                }
            }
        }else{
            $category_name = "NO CATEGORY AVAILABLE";
        }
    }else{
        header('Location: ./');
    }
?>

<?php 
    if (isset($_SESSION['username'])) {
        $openPage = "bookmark.php"; 
    }
    // add else here to print message

    $review_query = "SELECT * FROM reviews WHERE book_id='$book_id'";
    $review_result = mysqli_query($connection, $review_query);
    if (!$review_result) {
        die("FAILED" . mysqli_error($connection));
    }else {
        $avg_rating = 0;
        $total_5 = 0;
        $total_4 = 0;
        $total_3 = 0;
        $total_2 = 0;
        $total_1 = 0;
        
        $total_reviews = mysqli_num_rows($review_result);
        
        $reviewers_name = [];
        $reviewers_ratings = [];
        $reviewers_content = [];
        
        $sum_of_all_rating = 0;
        
        while($row = mysqli_fetch_assoc($review_result)){
            $review_username = $row['username'];
            $rating = $row['ratings'];
            $content = $row['review_content'];
            
            $sum_of_all_rating = $sum_of_all_rating + $rating;
            
            array_push($reviewers_name,$review_username);
            array_push($reviewers_ratings,$rating);
            array_push($reviewers_content,$content);
            
            switch($rating){
                case 1:
                    $total_1 = $total_1 + 1;
                    break;
                case 2:
                    $total_2 = $total_2 + 1;
                    break;
                case 3:
                    $total_3 = $total_3 + 1;
                    break;
                case 4:
                    $total_4 = $total_4 + 1;
                    break;
                case 5:
                    $total_5 = $total_5 + 1;
                    break;
                default:
                    break;
            }
            
        }
        
        if($sum_of_all_rating>0){
            $avg_rating = ($sum_of_all_rating)/$total_reviews;
        }
        
        $percent_1 = $total_1 != 0 ? round($total_1/$total_reviews * 100) : 0;
        $percent_2 = $total_2 != 0 ? round($total_2/$total_reviews * 100) : 0;
        $percent_3 = $total_3 != 0 ? round($total_3/$total_reviews * 100) : 0;
        $percent_4 = $total_4 != 0 ? round($total_4/$total_reviews * 100) : 0;
        $percent_5 = $total_5 != 0 ? round($total_5/$total_reviews * 100) : 0;
          
    
    }
 ?>
 
<?php
    if(isset($_SESSION['username'])){
        //bookmark query
//        $query = "SELECT * FROM bookmark where book_id = ".$_GET['book_id']." AND username ="."'$_SESSION['username']'";
        $query = "SELECT * FROM bookmark where book_id = {$_GET['book_id']} AND username ='{$_SESSION['username']}'";   
        $query_result_bookmark = mysqli_query($connection,$query);
        if(!$query_result_bookmark){
            die("FAILED" . mysqli_error($connection));
        }
        $temp_no_of_bookmarks = mysqli_num_rows($query_result_bookmark);
        $book_is_bookmarked = false;
        if($temp_no_of_bookmarks == 1){
            $book_is_bookmarked = true;
        }
    }
?>

<div class="container close_bookmark_sidebar" id='container'>
<div class="container" style="width: 100%;margin-left: 2%;margin-right: 2%;">
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12" id="bookImage">
            <img style="width:50%;margin-top: 5%;margin-left: 25%;margin-right: 25%" src="includes/images/<?php echo $book_image; ?>">
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
            <div style="margin-top: 5%"></div>
            <div class="bookName" style="font-size: 35px;font-weight: 550; font-family: Karla, Arial, Helvetica">
                <?php echo $book_name; ?>
            </div>
            <div class="author" style="font-size: 20px;">
                by <?php echo $author; ?>
            </div>
            <br>
            <div class="price" style="font-family: Karla, Arial, Helvetica">
                <div style="font-size: 28px">
                    <span>Was : </span><span style="text-decoration: line-through;">&#x20b9; <?php echo $book_original_price; ?></span>
                </div>

                <div style="font-size: 28px">
                    <span>Now : </span><span>&#x20b9; <?php echo $book_price; ?></span>
                    <span id="discount" style="font-size: 12px; color: #878787; border-style: solid; border-width: 1px;padding: 4px;margin-left: 8px; color: green;border-color: green">
                    <script type="text/javascript">
                        var discount = Math.round((<?php echo $book_original_price;?> - <?php echo $book_price; ?>)*100/<?php echo $book_original_price; ?>);
                        document.getElementById('discount').innerHTML = discount+'% off';
                    </script>
                </span>
                </div>
                <br>
                
            </div>

            <div class="bookReview">
<!--                <h5><font size="4"><strong>Ratings</strong></font></h5>-->
                
                <span id="avgRating" style="font-size: 15px">
                    <script>starRating('avgRating', <?php echo $avg_rating ?>)</script>  
                </span>
                &nbsp;&nbsp;
                
                <?php 
                    if (isset($_SESSION['username']) && $_SESSION['username']!=$seller_username) {
                ?>
                <span>
                    <a href="javascript:$('#reviewModal').modal('show');" data-target="#reviewModal"style="font-size: 15px;font-family:Karla, Arial, Helvetica, sans-serif;">
                        <u>Write a review</u>
                    </a>
                </span>
                <?php  
                    }else if(!isset($_SESSION['username'])){
                ?>
                    <a href="javascript:showLoginModal('#loginModal')" style="font-size: 15px;font-family:Karla, Arial, Helvetica, sans-serif;">
                        <u>Write a review</u>
                    </a>
                <?php
                    }
                ?>
                
                
<!--
                <span>
                    <a href="javascript:$('#reviewModal').modal('show');" data-target="#reviewModal" style="font-size: 15px;font-family:Karla, Arial, Helvetica, sans-serif
;"><u>Write a review</u></a>
                </span>
-->
                &nbsp;&nbsp;
                <span>
                    <a href="#detailed_review_div" style="font-size: 15px;font-family:Karla, Arial, Helvetica, sans-serif
;"><u>See all reviews</u></a>
                </span>
            </div>
            <br>
<!--            <hr style="width: 60%;margin: 0; border-color: #bcbcbc">-->
            
            <br>
            <br>
            
            
            <?php 
                if (isset($_SESSION['username'])) {
                    $openBuyNow = "buy_now.php";
                }
            ?>
            <div id="buynow_parent">
                <?php
                    if ($book_status == 'unavailable') {
                ?>
						<a href="#" type="button" disabled="true" class="btn" id="buyNow" style="background-color: #666; color: white;">Buy Now</a>
				<?php
                    }else if(isset($_SESSION['username'])&&$seller_username==$_SESSION['username']){
                        
				?>
						<a type="button" data-toggle="tooltip" title="You Cannot Buy Your Own Book" class="btn" id="buyNow" style="background-color: #666; color: white;">Buy Now</a>
                <?php
                    }else if(!isset($_SESSION['username'])){
                        
                ?>
                        <a href="#" type="button" onclick="javascript:showLoginModal('#loginModal')" class="btn" id="buyNow" style="background-color: #666; color: white;">Buy Now</a>
				<?php
					}else{
				?>
						<a href="<?php echo $openBuyNow ?>?book_id=<?php echo $book_id ?>" type="button" class="btn" id="buyNow" style="background-color: #666; color: white;">Buy Now</a>
				<?php	
					}
                ?>
                
                <?php
                    if(isset($_SESSION["username"]) && $_SESSION["username"]){
                        if(isset($book_is_bookmarked)&&$book_is_bookmarked){
                ?>
                            <a id="bookmark" onclick="handleBookmark(<?php echo $book_id; ?>)" type="button" class="btn" style=" color: black;background-color:orange;">Bookmarked</a>
                <?php        
                        }else{
                ?>
                            <a id="bookmark" onclick="handleBookmark(<?php echo $book_id; ?>)" type="button" class="btn" style=" color: black">Bookmark</a>
                <?php
                        }
                    }else{
                ?>
                        <a href="#" type="button" onclick="javascript:showLoginModal('#loginModal')" id="bookmark" type="button" class="btn" style=" color: black">Bookmark</a>
                <?php                        
                    }   
                ?>
            </div>
            <br>
                        
            
<!--            <hr style="width: 60%;margin: 0; border-color: #bcbcbc">-->

            <br>
            
            
            <div class="info" style="margin-bottom: 20px">
                <h5><font size="4"><b>Subject:</b>&nbsp;&nbsp;
                <?php echo $subject; ?></font></h5>
            </div>
            
            <div class="info" style="margin-bottom: 20px">
                <h5><font size="4"><b>Category:</b>&nbsp;&nbsp;
                <?php echo $category_name; ?></font></h5>
            </div>
            
            <div>
                <a href="#more_details" style="font-size: 13px;font-family:Karla, Arial, Helvetica, sans-serif ;"><u>More Details</u>
                </a>
                &emsp;&emsp;
                <a href="#more_seller" style="font-size: 13px;font-family:Karla, Arial, Helvetica, sans-serif ;"><u>More from this Sellers</u>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row" id="more_details">
   <div class="col-lg-6">
       <div class="container desc_container">
            <!-- Tab links -->
            <div class="tab">
              <button class="tablinks active" id="defaultOpen">DESCRIPTION</button>
        <!--      <button class="tablinks" onclick="openCity(event, '')">Paris</button>-->
        <!--      <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>-->
            </div>

            <!-- Tab content -->
            <div id="Description" class="tabcontent">
                <div class="desc_content" style="margin-bottom: 20px;line-height:10;">
                    <p style="line-height: 2;"><font size="3">
                    <?php echo $book_description; ?></font></p>
                </div>
            </div>
        </div>
   </div>    
   <div class="col-lg-6">
       <div class="container desc_container">
            <!-- Tab links -->
            <div class="tab">
              <button class="tablinks active" id="defaultOpen">DETAILED INFO</button>
        <!--      <button class="tablinks" onclick="openCity(event, '')">Paris</button>-->
        <!--      <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>-->
            </div>

            <!-- Tab content -->
            <div id="Description" class="tabcontent">
                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Subject:</b>&nbsp;&nbsp;
                    <?php echo $subject; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Category:</b>&nbsp;&nbsp;
                    <?php echo $category_name; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Book Name:</b>&nbsp;&nbsp;
                    <?php echo $book_name; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Author:</b>&nbsp;&nbsp;
                    <?php echo $author; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Original Price:</b>&nbsp;&nbsp;
                    <?php echo $book_original_price; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Book Price:</b>&nbsp;&nbsp;
                    <?php echo $book_price; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Edition:</b>&nbsp;&nbsp;
                    <?php echo $edition; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Subject:</b>&nbsp;&nbsp;
                    <?php echo $subject; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Category:</b>&nbsp;&nbsp;
                    <?php echo $category_name; ?></font></h5>
                </div>

                <div class="desc_content" style="margin-bottom: 20px">
                    <h5><font size="4"><b>Sold By:</b>&nbsp;&nbsp;
                    <?php echo $seller_username; ?></font></h5>
                </div>
            </div>
        </div>
   </div>
</div>

<div class="container">
    <h3 id="more_seller">More from other Sellers</h3>
    <div class='row'>
    <?php 
        $book_name = mysqli_real_escape_string($connection, $book_name);
        $morebook_query = "SELECT * FROM books WHERE username != '$seller_username' AND book_name = '{$book_name}'";
        $morebook_set = mysqli_query($connection, $morebook_query);
        if(!$morebook_set){
            die("FAILED" . mysqli_error($connection));
        }
        else{
            while($morebook_row = mysqli_fetch_assoc($morebook_set)){
                $morebook_id = $morebook_row['book_id'];
                $morebook_name = $morebook_row['book_name'];
                $morebook_author = $morebook_row['author'];
                $morebook_edition = $morebook_row['edition'];
                $morebook_subject = $morebook_row['subject'];
                $morebook_price = $morebook_row['book_price'];
                $morebook_image = $morebook_row['book_image'];
    ?>

        <div class="col-sm-6 col-md-3 col-lg-3 col-xs-6">
            <div class="thumbnail">
                <div class="w3-display-container w3-hover-opacity">
                    <img src="includes/images/<?php echo $morebook_image ?>" alt="<?php echo $morebook_name ?>" style="width:100%; height: 290px;">
                    <div class="w3-display-middle w3-display-hover">
                        <a href="book_details.php?book_id=<?php echo $morebook_id?>">
                            <button class="w3-button" style="background-color: #0b113e; color: white">View Details</button></a>
                    </div>
                    <div class="w3-display-topright w3-display-hover">
                        <a data-toggle="modal" href="" data-target="#quick_look" style="color: white" title="quick look"><button><span class="glyphicon glyphicon-zoom-in" style="color: black"></span></button></a>
                    </div>
                </div>
                <div class="caption" style="height: 60px; border-top: 5px solid blue">
                    <p align="center"><?php echo $morebook_name ?></p>
                </div>
            </div>
        </div>

    <?php 
            }
        }
    ?>
    </div>
</div>


<div id="detailed_review_div">
    <span class="heading">User Rating</span>
    
    <span id="average_review"></span>
    <script>
        bigStarRating('average_review',<?php echo round($avg_rating); ?>)
    </script>

    <p><?php echo $avg_rating; ?> average based on <?php echo $total_reviews; ?> reviews.</p>
    <hr style="border:3px solid #f1f1f1">

    <div class="row" style="margin:10px;">
      <div class="side">
        <div>5 star</div>
      </div>
      <div class="middle">
        <div class="bar-container">
          <div class="bar-5"></div>
          <script>
                review_bar('bar-5','<?php echo $percent_5; ?>')    
          </script>
        </div>
      </div>
      <div class="side right">
        <div><?php echo $total_5; ?></div>
      </div>
      <div class="side">
        <div>4 star</div>
      </div>
      <div class="middle">
        <div class="bar-container">
          <div class="bar-4"></div>
          <script>
                review_bar('bar-4','<?php echo $percent_4; ?>')    
          </script>
        </div>
      </div>
      <div class="side right">
        <div><?php echo $total_4; ?></div>
      </div>
      <div class="side">
        <div>3 star</div>
      </div>
      <div class="middle">
        <div class="bar-container">
          <div class="bar-3"></div>
          <script>
                review_bar('bar-3','<?php echo $percent_3; ?>')    
          </script>
        </div>
      </div>
      <div class="side right">
        <div><?php echo $total_3; ?></div>
      </div>
      <div class="side">
        <div>2 star</div>
      </div>
      <div class="middle">
        <div class="bar-container">
          <div class="bar-2"></div>
          <script>
                review_bar('bar-2','<?php echo $percent_2; ?>')    
          </script>
        </div>
      </div>
      <div class="side right">
        <div><?php echo $total_2; ?></div>
      </div>
      <div class="side">
        <div>1 star</div>
      </div>
      <div class="middle">
        <div class="bar-container">
          <div class="bar-1"></div>
          <script>
                review_bar('bar-1','<?php echo $percent_1; ?>')    
          </script>
        </div>
      </div>
      <div class="side right">
        <div><?php echo $total_1; ?></div>
      </div>
    </div>
</div>
<div id="detailed_review_detail">
   
<?php
    for($i = 0 ; $i < $total_reviews ; $i++){   
?>  
    <div>
        <!-- Left-aligned -->
        <div class="media">
          <div class="media-left">
            <img src="./includes/images/img_avatar.png" class="media-object" style="width:60px">
          </div>
          <div class="media-body">
            <h4 class="media-heading"><?php echo $reviewers_name[$i]; ?></h4>
            <span id="avgRating<?php echo $i; ?>" style="font-size: 15px">
                <script>starRating('avgRating<?php echo $i; ?>', <?php echo $reviewers_ratings[$i]; ?>)</script>  
            </span>
            <p><?php echo $reviewers_content[$i]; ?></p>
          </div>
        </div>
    </div>
    <hr>                  
<?php
    }
?>
    <?php if (isset($_SESSION['username']) && $_SESSION['username']!=$seller_username) {
    ?>
    <a data-toggle="modal" href="" data-target="#reviewModal" style="color: white"><button class="btn btn-primary">Write a review</button></a>

    <?php  
        }else if(!isset($_SESSION['username'])){
    ?>

    <a data-toggle="modal" onclick="javascript:showLoginModal('#loginModal')"  style="color: white"><button class="btn btn-primary">Write a review</button></a>

    <?php
        }else{
    ?>    
        <a style="color: white" data-toggle="tooltip" title="You Cannot Review Your Own Book"><button class="btn btn-primary">Write a review</button></a>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
    <?php
        }
    ?>

    <div id="reviewModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="margin-right: 9px;">&times;</button>
                    <h3 class="modal-title"><b>&nbsp;Write a review</b></h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="./templates/addReviews.php" id="reviewform">
                        <input id="modal_book_id" type="text" value="<?php echo $_GET['book_id']; ?>" name="book_id" style="display:none;">
                        <input id="modal_book_username" type="text" value="<?php echo $_SESSION['username']; ?>" name="username" style="display:none;">
                        <div>
                            <label><i class="fa fa-star"></i> Ratings</label>
                            <select class="form-control" name="ratings">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                        </div>
                        <label>Comments</label>
                        <textarea class="form-control" rows="5" name="review_content" form="reviewform" placeholder="Write a review!!!" style="width: 100%; resize: none;"></textarea>
                        <input type="submit" class="btn btn-primary" name="review_submit">
                    </form>
                </div>
                <div class="modal-footer" style="margin-right: 10px;">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute; margin-bottom: 10px; margin-right: 10px; right: 0; bottom: 0">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
