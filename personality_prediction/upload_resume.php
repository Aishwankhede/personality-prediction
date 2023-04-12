<?php
session_start();
include('connect.php');

if(empty($_SESSION['uid']))
{
	header('location:index');
}

/* -------------- resume post query start --------------------- */

if(isset($_POST['post_resume']))
{
	$rdate = date('Y-m-d');
	$uid = $_SESSION['uid'];
  $photo = mysqli_real_escape_string($con,$_FILES['photo']['name']);
  $extra = 'e';
	$uname = $_SESSION['uname'];
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$contact = mysqli_real_escape_string($con,$_POST['contact']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$ssc_cat = mysqli_real_escape_string($con,$_POST['ssc_cat']);
	$ssc_per = mysqli_real_escape_string($con,$_POST['ssc_per']);
	$hssc_cat = mysqli_real_escape_string($con,$_POST['hssc_cat']);
	$hssc_per = mysqli_real_escape_string($con,$_POST['hssc_per']);
	$ug_cat = mysqli_real_escape_string($con,$_POST['ug_cat']);
	$ug_per = mysqli_real_escape_string($con,$_POST['ug_per']);
	$pg_cat = mysqli_real_escape_string($con,$_POST['pg_cat']);
	$pg_per = mysqli_real_escape_string($con,$_POST['pg_per']);
	$extra_curr = mysqli_real_escape_string($con,$_POST['extra_curr']);
	$key_skills = mysqli_real_escape_string($con,$_POST['key_skills']);
	$work_exp = mysqli_real_escape_string($con,$_POST['work_exp']);
	$a = ' - ';

	mysqli_query($con,"INSERT INTO `tbl_resume`(`rdate`,`uid`,`photo`,`uname`,`cname`,`contact`,`email`,`address`,`ssc`,`hssc`,`ug`,`pg`,`extra_curr`,`key_skills`,`work_exp`,`flag`) VALUES('".$rdate."','".$uid."','".$extra.$photo."','".$uname."','".$cname."','".$contact."','".$email."','".$address."','".$ssc_cat.$a.$ssc_per."','".$hssc_cat.$a.$hssc_per."','".$ug_cat.$a.$ug_per."','".$pg_cat.$a.$pg_per."','".$extra_curr."','".$key_skills."','".$work_exp."','0') ");
	echo "<script>
	alert('Resume uploaded successfully..');
	window.location.href='home';
	</script>";

  $post_photo=$_FILES['photo']['name'];
$post_photo_tmp=$_FILES['photo']['tmp_name'];

$ext=pathinfo($post_photo, PATHINFO_EXTENSION);   //getting image extension

if($ext=='png' || $ext=='PNG' ||
   $ext=='jpg' || $ext=='jpeg' ||
   $ext=='JPG' || $ext=='JPEG' ||
   $ext=='gif' || $ext=='GIF' )   //checking image extension

  if($ext =='jpg' || $ext=='jpeg' || $ext =='JPG' || $ext=='JPEG')
  {
    $src=imagecreatefromjpeg($post_photo_tmp);

  }
  if($ext=='png'  || $ext=='PNG')
  {
    $src=imagecreatefrompng($post_photo_tmp);
  }
  if($ext=='gif'  || $ext=='GIF')
  {
    $src=imagecreatefromgif($post_photo_tmp);
  }


  list($width_min,$height_min)=getimagesize($post_photo_tmp);  //fetching original image width & height

  $newwidth_min=200;  //set compression image width
  $newheight_min=200; //set compression image height
  /*$newheight_min=($height_min / $width_min)*$newwidth_min; */   // equation for compressed image height
  $temp_min= imagecreatetruecolor($newwidth_min, $newheight_min);   //craere frame for compressed image
  imagecopyresampled($temp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);  // compressing image
    imagejpeg($temp_min,"pimgs/e".$post_photo,80);   //copy image in folder
}

/* -------------- resume post query end --------------------- */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Resume Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		.well-sm {box-shadow:0 0 2px #010E28;}
		.panel-header {background-color:#010E28;
		               color:white;
		               text-align:center;}

		.btn-default {color:white;}
		#pbtn:hover {color:white;}
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-list-alt"></span>
			<b>UPLOAD RESUME PAGE</b>
		</div>

		<!-- --------------- Resume form start ---------------- -->

        <div class="row">
         <form method="post" enctype="multipart/form-data">

        	<div class="col-sm-4">
        		<div class="panel panel-default">
        			<div class="panel panel-header">
        				<h4>Personal Information</h4>
        			</div>

                   <div class="panel panel-body">

                   <label>Candidate Profile Photo</label>
                   <input type="file" name="photo" class="form-control" required="">
                   <br>

                   <label>Candidate Name</label>
                   <input type="text" name="cname" placeholder="Candidate Name" class="form-control" required="">
                   <br>
                   
                   <label>Candidate Contact</label>
                   <input type="text" name="contact" placeholder="Candidate Contact" class="form-control" required="">
                   <br>

                   <label>Candidate Email Id</label>
                   <input type="text" name="email" placeholder="Candidate Email" class="form-control" required="">
                   <br>

                   <label>Candidate Address</label>
                   <textarea type="text" name="address" placeholder="Candidate Address" class="form-control" required=""></textarea>
                   <br>


                   </div>

        		</div>
        	</div>

        	<div class="col-sm-4">
        		<div class="panel panel-default">
        			<div class="panel panel-header">
        				<h4>Educational Information</h4>
        			</div>

                   <div class="panel panel-body">

                   	<div class="input-group">
				    <span class="input-group-addon">SSC</span>
				    <input style="width:49%;" type="text" class="form-control" name="ssc_cat" placeholder="Category">
				    <input style="width:49%;" type="text" class="form-control" name="ssc_per" placeholder="Percentage">
				    </div>
				    <br>

				    <div class="input-group">
				    <span class="input-group-addon">HSSC</span>
				    <input style="width:49%;" type="text" class="form-control" name="hssc_cat" placeholder="Category">
				    <input style="width:49%;" type="text" class="form-control" name="hssc_per" placeholder="Percentage">
				    </div>
				    <br>

				    <div class="input-group">
				    <span class="input-group-addon">UG</span>
				    <input style="width:49%;" type="text" class="form-control" name="ug_cat" placeholder="Category">
				    <input style="width:49%;" type="text" class="form-control" name="ug_per" placeholder="Percentage">
				    </div>
				    <br>

				    <div class="input-group">
				    <span class="input-group-addon">PG</span>
				    <input style="width:49%;" type="text" class="form-control" name="pg_cat" placeholder="Category">
				    <input style="width:49%;" type="text" class="form-control" name="pg_per" placeholder="Percentage">
				    </div>
                   	
                   </div>

        		</div>

        		<div class="panel panel-default">
        			<div class="panel panel-header">
        				<h4>Extra Curricular</h4>
        			</div>

        			<div class="panel panel-body">
        				<textarea type="text" class="form-control" name="extra_curr" placeholder="Extra Curricular"></textarea>
        			</div>
        		</div>
        	</div>

        	<div class="col-sm-4">
        		<div class="panel panel-default">
        			<div class="panel panel-header">
        				<h4>Key Skills</h4>
        			</div>
        			<div class="panel panel-body">
        				<textarea type="text" class="form-control" name="key_skills" placeholder="Key Skills.."></textarea>
        			</div>
        		</div>

        		<div class="panel panel-default">
        			<div class="panel panel-header">
        				<h4>Work Experience</h4>
        			</div>
        			<div class="panel panel-body">
        				<textarea type="text" class="form-control" name="work_exp" placeholder="Work Experience"></textarea>
        			</div>
        		</div>
        	</div>

        </div>
<hr>
        <div class="row">

        	<div class="col-sm-3">
        <?php
        $avl = mysqli_query($con,"SELECT * FROM `tbl_resume` WHERE `uid` = '".$_SESSION['uid']."' ");
        $avl1 = mysqli_num_rows($avl);
        ?>
        		<button style="background-color:#010E28;" class="btn btn-primary" name="post_resume" <?php if($avl1==0){echo 'enabled';}else{echo 'disabled';} ?>>
        			<span class="glyphicon glyphicon-send"></span>
        		<span id="pbtn">Post Your Resume</span>
        	    </button>
        	</div>

        	<div class="col-sm-7"></div>

        	<div class="col-sm-2">
        		<button style="background-color:#010E28;" class="btn btn-primary">
        			<span class="glyphicon glyphicon-refresh"></span>
        		<span id="pbtn">Reset Entries</span>
        	    </button>
        	</div>
        	
        </div>
    </form>
        <hr>

		<!-- --------------- Resume form end ---------------- -->
		
	</div>

</body>
</html>