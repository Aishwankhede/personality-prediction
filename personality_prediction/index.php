<?php
session_start();
include('connect.php');

if(!empty($_SESSION['uid']))
{
	header('location:home');
}

/* user registration start */
if(isset($_POST['register']))
{
	$udate = date('Y-m-d');
	$uname = mysqli_real_escape_string($con,$_POST['uname']);
	$contact = mysqli_real_escape_string($con,$_POST['contact']);
	$setpass = mysqli_real_escape_string($con,$_POST['setpass']);

	mysqli_query($con,"INSERT INTO `tbl_users`(`udate`,`uname`,`contact`,`pass`)VALUES('".$udate."','".$uname."','".$contact."','".$setpass."')");
	echo "<script>
	      alert('Successfully registered new user.');
	      window.location.href='index';
	</script>";
}
/* user registration end */

/* login start */
if(isset($_POST['login']))
{
	$user = mysqli_real_escape_string($con,$_POST['user']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);

	$sql = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `contact`='".$user."' && `pass`='".$pass."' ");
	$result = mysqli_num_rows($sql);
	while($row = mysqli_fetch_assoc($sql))
	{
       $_SESSION['uid']=$row['uid'];
       $_SESSION['uname']=$row['uname'];
	}
	if($result>0)
	{
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
	<?php include('bootcdn.php'); ?>
	<style type="text/css">
		body {background-image:url('images/wall.gif');
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
 					<h4>User Login Here..</h4>
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
 					Not register click on <i><a href="register" data-toggle="modal" data-target="#myModal">Sign Up</a></i>
 				</p>
 				<p>
 					Go to <i><a href="admin/">Admin Login</a></i>
 				</p>
 			</div>
 			<!-- login form end -->
 		</div>
 	</div>


 	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Here..</h4>
      </div>
      <div class="modal-body">
        <form method="post">
        	<label>Candidate Name</label>
        	<input type="text" name="uname" class="form-control" placeholder="Candidate Name" required="">
        	<br>

        	<label>Contact Number</label>
        	<input type="number" name="contact" class="form-control" placeholder="Contact Number" required="">
        	<br>

        	<label>Set Password</label>
        	<input type="text" name="setpass" class="form-control" placeholder="Set Password" required="">
        	<br>

        	<button type="submit" class="btn btn-default btn-block" name="register">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
 	
 </div>

</body>
</html>