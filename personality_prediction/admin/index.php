<?php
session_start();
include('../connect.php');

if(!empty($_SESSION['aname']))
{
	header('location:home');
}

/* login start */
if(isset($_POST['login']))
{
	$user = mysqli_real_escape_string($con,$_POST['user']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);

   if($user == 'Admin' && $pass == 'admin123')
   {
    $_SESSION['aname']=$user;
     header('location:home');
	}else{
		echo "<script>
		alert('Invalid Username or password..');
		window.location.href='index';
		</script>";
	}
}
/* login end */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<?php include('../bootcdn.php'); ?>
	<style type="text/css">
		body {background-image:url('../images/wall.gif');
	         background-size:cover;
	         background-attachment:fixed;}

	    .well {background-color:rgba(0,0,0,0.5);
	          color:lightsteelblue;
	          border:none;
	          /*box-shadow:0 0 2px lightsteelblue;*/}
        .input-group-addon {background:none;
                            border:none;
                            color:lightsteelblue;}

        .form-control {background:none;
                       border:none;
                       background-color:rgba(0,0,0,0.3);
                       border-radius:30px;}

        .form-control[placeholder] {color:lightsteelblue;}
        .btn-block {background:none;
                   border:none;
                   font-weight:bold;
                   background-color:rgba(0,0,0,0.4);}

        .modal-content {background-color:rgba(0,0,0,0.7);
                        color:lightsteelblue;}

        .modal-content .form-control {background-color:rgba(0,0,0,0.7);}
        .modal-content .btn-block {background-color:rgba(0,0,0,0.7);}
	</style>
</head>
<body>

 <div class="container-fluid">
<br><br><br><br><br><br><br><br>
 	<div class="row">
 		<div class="col-sm-9"></div>
 		<div class="col-sm-3">
 			<!-- login form start -->
 			<div class="well">
 				<form method="post">
 					<h4>Admin Login Here..</h4>
 					<br>
 					<div class="input-group">
					   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					   <input type="text" class="form-control" name="user" placeholder="Username" autofocus="">
					</div>
					<br>
					<div class="input-group">
					   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					   <input type="password" class="form-control" name="pass" placeholder="Password">
					</div>
					<br>
					<button type="submit" name="login" class="btn btn-default btn-block">Login</button>
 				</form>
                <br>
 				<p>
 					Go to <i><a href="../">User Login</a></i>
 				</p>
 			</div>
 			<!-- login form end -->
 		</div>
 	</div>


 	
 	
 </div>

</body>
</html>