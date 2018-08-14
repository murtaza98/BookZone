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
        
      </ul>
      <?php include "templates/login_modal.php" ?>
    </div>
</nav>