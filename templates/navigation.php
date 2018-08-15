<nav class="navbar navbar-inverse" style="background-color: #181e46">
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
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-center">
        <li id="website-name">Online book re-selling portal</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
  
        <?php
          if(isset($_SESSION['username'])){
            //SHOW SELL BOOK AND LOGOUT IN NAVBAR
        ?>
          <li><a href="addBook.php"><span class="glyphicon glyphicon-book"></span> Sell Book</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> WELCOME <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li>
                      <a href="view_details.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-envelope"></i>Dashboard</a>
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

            <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a data-toggle="modal" href="" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php include "templates/login_modal.php" ?>
        <?php
          }
        ?>
        
      </ul>
      
    </div>
</nav>