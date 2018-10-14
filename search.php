<?php
    function customPageHeader(){
        echo "<link rel='stylesheet' type='text/css' href='includes/css/main_page.css'>";
        echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
        echo "<script type='text/javascript' src='includes/javascript/main_page.js'></script>";
        
    }
?>

<?php
    if(isset($_GET["search"])){
        $search_index = $_GET["search"];
    }
?>

<?php include "./templates/header.php"; ?>
<div id="wrapper">
<?php include "./templates/navigation.php"; ?>
<div class= "container close_bookmark_sidebar" id="page-content-wrapper" style="margin: 0px; padding: 0px">
<!--<div class="container-fluid row" style=" background-image:url('includes/images/image1.jpg'); background-repeat: no-repeat; background-size:100% 100%; height: 400px;">-->

<p align="center" style="color: white; font-size: 30px;font-family: fantasy;">Buy and Sell Books Online</p>



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
            <h2>Search Result for <u><?php echo $search_index; ?></u></h2>
        <br>
        <div class = "row">

<?php
        $search_index = mysqli_real_escape_string($connection,$search_index);
        $query = "SELECT * from books WHERE book_name LIKE '%$search_index%'";
        $query_result = mysqli_query($connection,$query);

        if(!$query_result){
            die("QUERY FAILED ".mysqli_error($connection));
        }else{
            if (mysqli_num_rows($query_result) == 0) {
                echo "<h3 style='padding-left:17px;'>No Book found</h3>";
            }
            while($product_row = mysqli_fetch_assoc($query_result)){
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
                        <div class="w3-display-container w3-hover-opacity">
                            <img src="includes/images/<?php echo $book_image ?>" alt="<?php echo $book_name ?>" style="width:100%; height: 230px;">
                            <div class="w3-display-middle w3-display-hover">
                                <a href="book_details.php?book_id=<?php echo $book_id?>">
                                    <button class="w3-button" style="background-color: #0b113e; color: white">View Details</button></a>
                            </div>
                            <div class="w3-display-topright w3-display-hover">
                                <script type="text/javascript">
                                    function f1() {
                                        document.getElementById('modal01').style.display='block';
                                    }
                                </script>
                                <button class="glyphicon glyphicon-zoom-in" style="color: black; size: 32px;" onclick="f1()"></button>
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
?>
            </div> 
            
		</div>
    </div>
</div>
<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
        <img src="includes/images/<?php echo $book_image ?>" style="width:30%">
    </div>
</div>
</div>
<?php include "templates/footer.php"; ?>
