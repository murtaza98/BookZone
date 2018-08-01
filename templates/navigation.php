<nav class="navbar navbar-inverse">
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
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li id="website-name">Online book re-selling portal</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
      </ul>
    </div>
</nav>