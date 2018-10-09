<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
    </div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" onclick="goBack()"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="navbar-brand" onclick="goForward()"><span class="glyphicon glyphicon-chevron-right"></span></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin_index.php">BookZone Admin</a>
        <script>
          function goBack() {
              window.history.back();
          }
          function goForward(){
                window.history.forward();
          }  
        </script>
    </div>

    <!-- Top Menu Items -->
    <div class="nav navbar-nav collapse navbar-collapse navbar-ex1-collapse navbar-right">
        <li><a href="../">Home Site</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i>Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i>Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href=../templates/logout.php><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                </li>
            </ul>
        </li>
    </div>

    <!-- Side navigation -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li>
          <a href="admin_index.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="recent_activity.php"><i class="glyphicon glyphicon-dashboard"></i> Recent activities</a>
        </li>
        <li>
            <a href="users.php"><i class="glyphicon glyphicon-user"></i> Users</a>
        </li>
        <li>
            <a href="books.php"><i class="fa fa-book"></i> View All Books</a>
        </li>
        <li>
            <a href="categories.php"><i class="fa fa-list-alt"></i> Categories</a>
        </li>
        <li>
            <a href="reviews.php"><i class="fa fa-fw fa-wrench"></i> Reviews</a>
        </li>
      </ul>
    </div>

</nav>
