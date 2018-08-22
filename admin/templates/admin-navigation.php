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
        <a class="navbar-brand" href="index.html">CMS Admin</a>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Name<b class="caret"></b></a>
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
                    <a href="#"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                </li>
            </ul>
        </li>
    </div>

    <!-- Side navigation -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li>
          <a href="./"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Books <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts_dropdown" class="collapse">
                <li>
                    <a href="#">View All Books</a>
                </li>
                <li>
                    <a href="#">Add Books</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="categories.php"><i class="fa fa-fw fa-desktop"></i> Categories</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-wrench"></i> Reviews</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#users_toggle"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users_toggle" class="collapse">
                <li>
                    <a href="#">View All Users</a>
                </li>
                <li>
                    <a href="#">Add User</a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="#"><i class="fa fa-fw fa-file"></i> Profile</a>
        </li>
      </ul>
    </div>

</nav>