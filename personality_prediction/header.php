<style type="text/css">
  .navbar-inverse {background-color:#010E28;
                  border:none;
                  border-radius:0px;}
   #myNavbar ul li a {color:white;}
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color:white;" class="navbar-brand" href="#">
        <span style="background-color:white;color:#010E28;padding-top:1px;padding-bottom:4px;padding-right:2px;padding-left:2px;border-radius:10px;" class="glyphicon glyphicon-user"></span>
        <?php echo $_SESSION['uname'] ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home">
        <span class="glyphicon glyphicon-home"></span>
        Home</a>
        </li>

        <li><a href="upload_resume">
        <span class="glyphicon glyphicon-list-alt"></span>
        Upload Resume</a>
        </li>

        <li><a href="result">
        <span class="glyphicon glyphicon-edit"></span>
        Result</a>
        </li>

        <li><a href="audible_test">
        <span class="glyphicon glyphicon-bullhorn"></span>
        Audible Test</a>
        </li>

        <li><a href="logout">
        <span class="glyphicon glyphicon-off"></span>
        Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>