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
        <span class="glyphicon glyphicon-user"></span> 
        <?php echo $_SESSION['aname'] ?>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="home">
            <span class="glyphicon glyphicon-home"></span>
          Home
          </a>
        </li>

        <li>
          <a href="users">
            <span class="glyphicon glyphicon-list"></span>
          User List
          </a>
        </li>

        <li>
          <a href="resumes">
            <span class="glyphicon glyphicon-th"></span>
          Resumes
          </a>
        </li>

        <li>
          <a href="question_set">
            <span class="glyphicon glyphicon-hdd"></span>
          Question Set
          </a>
        </li>

        <li>
          <a href="result">
            <span class="glyphicon glyphicon-list-alt"></span>
          Result
          </a>
        </li>

        <li>
          <a href="audible_list">
            <span class="glyphicon glyphicon-bullhorn"></span>
          Audible List
          </a>
        </li>

        <li>
          <a href="logout">
            <span class="glyphicon glyphicon-off"></span>
          Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>