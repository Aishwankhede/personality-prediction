<?php
session_start();
include('connect.php');

if(empty($_SESSION['uid']))
{
	header('location:index');
}

if(isset($_POST['subans']))
{
	$uid = $_SESSION['uid'];
	$uname = $_SESSION['uname'];
	$hidque = $_POST['hidque'];
	$opts = $_POST['opts'];
	$hidans = $_POST['hidans'];

	if($opts==$hidans)
	{
		mysqli_query($con,"INSERT INTO `tbl_test`(`uid`,`uname`,`que`,`ans`,`marks`)VALUES('".$uid."','".$uname."','".$hidque."','".$opts."','5') ");
	}else{
		mysqli_query($con,"INSERT INTO `tbl_test`(`uid`,`uname`,`que`,`ans`,`marks`)VALUES('".$uid."','".$uname."','".$hidque."','".$opts."','0') ");
	}
	echo "<script>
  alert('Successfully submitted Answer..');
  window.location.href='test';
  </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Test Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		.well-sm {box-shadow:0 0 2px #010E28;}
		.panel-header {background-color:#010E28;
		               color:white;
		               padding-left:20px;
		               padding-top:5px;}
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-edit"></span>
			<b>TEST PAGE</b>
		</div>

		<div class="row">

			<?php
			$a = mysqli_query($con,"SELECT * FROM `tbl_question` LIMIT 5");
			while($aa = mysqli_fetch_assoc($a)){
			?>
			<form method="post">
				<div style="<?php
				$b = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `que`='".$aa['qid']."' AND `uid`='".$_SESSION['uid']."' ");
				$bb = mysqli_num_rows($b);
				if($bb>0)
				{
					echo 'display:none';
				}else{ echo 'display:block'; }
				 ?>">
			<div class="col-sm-12">

				<div class="panel panel-default">

					<div class="panel panel-header">
						<p><b><?php echo $aa['que'] ?></b></p>
						<input type="hidden" name="hidque" value="<?php echo $aa['qid'] ?>">
					</div>
 
                    <div class="panel panel-body">

                    	<input type="checkbox" name="opts" value="A">
                    	<?php echo $aa['opt1'] ?>
                    	<br>

                    	<input type="checkbox" name="opts" value="B">
                    	<?php echo $aa['opt2'] ?>
                    	<br>

                    	<input type="checkbox" name="opts" value="C">
                    	<?php echo $aa['opt3'] ?>
                    	<br>

                    	<input type="checkbox" name="opts" value="C">
                    	<?php echo $aa['opt4'] ?>
                    	<br>

                    	<input type="hidden" name="hidans" value="<?php echo $aa['ans'] ?>">

					</div>

					<div class="panel panel-footer">
						<button style="background-color:#010E28;" class="btn btn-primary" name="subans">Submit Answer</button>
					</div>
					
				</div>
				
			</div>
		</div>
		</form>
  <?php } ?>
			

		</div>
		
	</div>

</body>
</html>