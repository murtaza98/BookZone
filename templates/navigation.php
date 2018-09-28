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
            <li><a href="#"><i class="fa fa-info">About</i></a></li>
            <li><a href="addBook.php"><span class="glyphicon glyphicon-book"></span> Sell Book</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> WELCOME <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="view_details.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                    </li>
                    <li>
                        <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-fw fa-book"></i>Bookmarks</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i>Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="./templates/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                    </li>
                </ul>
            </li>


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
                    <a href="#">
                        Bookmark
                    </a>
                    <button class="w3-bar-item w3-button w3-right w3-padding-16" id="close_sidebar">×</button>
                </li>
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
                      echo '<li class="sidebar-brand">
                            <div class="container">
                            <div class="media">
                                <div class="media-left media-top">
                                  <a href="remove_bookmark.php?book_id='.$bookId.'"><i class="glyphicon glyphicon-remove" style="color: red;"></i></a>
                                  <img src="includes/images/'.$bookImage.'" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><b>'.$bookName.'</b>&nbsp;<small><b>'.$author.'</b></small></h4>
                                  <div class="price">
                                <span style="font-size: 28px;"><?php echo $bookPrice; ?></span>
                                <span style="font-size: 16px; color: #878787; text-decoration: line-through;"><?php echo $originalPrice; ?></span>
                              </div>
                              <div class="Edition">
                                <h5><strong>Edition</strong>&nbsp'.$edition.'</h5>
                              </div>  
                                  
                                </div>
                            </div>
                          </div></li>';
                    }
                  }
                 ?>
                <!--<li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li-->
            </ul>
        </div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // $(document).ready(function(){
    //   $("#page-content-wrapper").on('click', function(e) {
    //     // document.getElementById('wrapper').style.display = none;
    //     $("#wrapper").removeClass("toggled");    });
    // });
</script>