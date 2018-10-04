<nav class="navbar navbar-inverse" id="navbar" style="border-bottom: 2px solid black;margin-bottom:0px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" onclick="goBack()"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="navbar-brand" onclick="goForward()"><span class="glyphicon glyphicon-chevron-right"></span></a>
        <script>
          function goBack() {
              window.history.back();
          }
          function goForward(){
                window.history.forward();
          }
        </script>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-left">
          <li id="website-name">BookZone</li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
            if(isset($_SESSION['username'])){
              //SHOW SELL BOOK AND LOGOUT IN NAVBAR
          ?>
            <li><a href="index.php"><i class="fa fa-home" style="font-size: 22px; color: white"></i></a></li>
            <li><a href="#"><i class="fa fa-info" style="color: white"> About</i></a></li>
            <li><a href="addBook.php"><span class="glyphicon glyphicon-book" style="color: white"></span> Sell Book</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" style="color: white"></i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                       <a>WELCOME <?php echo $_SESSION['username'] ?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="view_details.php"><i class="fa fa-fw fa-user" style="color: white"></i>Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear" style="color: white"></i>Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="./templates/logout.php"><i class="fa fa-fw fa-power-off" style="color: white"></i>Log Out</a>
                    </li>
                </ul>
            </li>
            <li><a href="#menu-toggle" id="menu-toggle" title="Bookmark"><font size="4"><i class="fas fa-shopping-cart" style="color: white"></i></font></a></li>


          <?php
            }else{
              //SHOW LOGIN AND SIGN UP IN NAVBAR
          ?>
              <li><a href="index.php"><i class="fa fa-home" style="font-size: 22px; color: white"></i></a></li>
            <li><a href="#"><i class="fa fa-info" style="color: white">  About</i></a></li>
              <li><a href="register.php" style="color: white"><span class="glyphicon glyphicon-user" style="color: white"></span> Sign Up</a></li>
              <li><a data-toggle="modal" href="" data-target="#loginModal" style="color: white"><span class="glyphicon glyphicon-log-in" style="color: white"></span> Login</a></li>
              <?php include "templates/login_modal.php" ?>
          <?php
            if(isset($_SESSION['autostart_modal'])){
                echo "<script>$(window).on('load', function(){
                    $('#loginModal').modal('show');
                  });</script>";
                  $_SESSION['autostart_modal'] = null;
              }
            }
          ?>

        </ul>
      </div>
    </div>
</nav>


        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" style="font-size: 35px;font-weight: 550; color: white;font-family: Karla, Arial, Helvetica; background-color: black">Bookmarks</a>
                    <button id="close_sidebar" style="position: absolute; top: 0; right: 0; color: red; border: 0; background-color: transparent"><i class="glyphicon glyphicon-remove"></i></button>
                </li><br>
                <?php
                  $username = $_SESSION['username'];
                  $query = "SELECT * FROM books WHERE book_id IN ( SELECT book_id FROM bookmark WHERE username='$username')";
                  $query_result = mysqli_query($connection, $query);
                  if (!$query_result) {
                    die('QUERY FAILED '.mysqli_error($connection));
                  }else {
                    while($query_set = mysqli_fetch_assoc($query_result)){
                      $bookId = $query_set['book_id'];
                      $bookName = $query_set['book_name'];
                      $author = $query_set['author'];
                      $edition = $query_set['edition'];
                      $subject = $query_set['subject'];
                      $bookPrice = $query_set['book_price'];
                      $originalPrice = $query_set['book_original_price'];
                      $bookDescription = $query_set['book_description'];
                      $bookImage = $query_set['book_image'];
                      $categoryId = $query_set['category_id'];
                      $category_query = "SELECT category_name FROM categories WHERE category_id='$categoryId'";
                      $category_result = mysqli_query($connection, $category_query);
                      $category_set = mysqli_fetch_assoc($category_result);
                      $categoryName = $category_set['category_name'];
                      echo '<div class="w3-display-container w3-hover-opacity">
                              <li class="sidebar-brand" style: "font-family: Karla, Arial, Helvetica">
                                <div class="container">
                                  <div class="media">
                                    <div class="w3-display-topright w3-display-hover">
                                      <a href="remove_bookmark.php?book_id='.$bookId.'"><button class="w3-button" style="color: white; background-color:red">Remove</button></a>
                                    </div>
                                    <!--div class="w3-display-bottomright w3-display-hover">
                                      <a href="book_details.php?book_id='.$bookId.'"><button class="w3-button" style="color: white; background-color:blue">View</button></a>
                                    </div-->
                                    <div class="media-left media-top">
                                      <img src="includes/images/'.$bookImage.'" class="media-object" style="width:60px">
                                    </div>
                                    <div class="media-body">
                                      <h4 class="media-heading" style="color: black;"><b>'.$bookName.'</b>&nbsp;<small><b>'.$author.'</b></small></h4>
                                      <div class="price">
                                        <span style="font: 20px;color: black;">&#x20b9; '.$bookPrice.'</span>
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                              </li>
                            </div>';
                    }
                  }
                 ?>
            </ul>
        </div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#close_sidebar").click(function(e) {
       $("#wrapper").removeClass("toggled");
    });
</script>
