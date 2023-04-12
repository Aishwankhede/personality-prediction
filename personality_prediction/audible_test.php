<?php
session_start();
include('connect.php');
error_reporting(0);
if(empty($_SESSION['uid']))
{
	header('location:index');
}

if(isset($_POST['btn_atest']))
{
	$adate = date('Y-m-d');
	$uid = $_SESSION['uid'];
	$uname = $_SESSION['uname'];
	$atest = mysqli_real_escape_string($con,$_POST['atest']);

	mysqli_query($con,"INSERT INTO `tbl_audible`(`adate`,`uid`,`uname`,`atest`)VALUES('".$adate."','".$uid."','".$uname."','".$atest."') ");
	echo "<script>
     alert('Successfully Add Your Answer...');
     window.location.href='audible_test';
	</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Home Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		.well-sm {box-shadow:0 0 2px #010E28;}
		.panel-header {background-color:#010E28;
		               color:white;
		               text-align:center;}
		#wait_tip {background:#010E28;text-align:center;padding:5px;color:white;width:100%;}
	</style>
<script type="text/javascript">
	function getId(id) {
       return document.getElementById(id);
   }
   function validation() {
       getId("submit_btn").style.display="none";
       getId("wait_tip").style.display="";
       return true;
   }
</script>
	
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-bullhorn"></span>
			<b>AUDIBLE TEST PAGE</b>
		</div>

		<div class="row">
			
			<div class="col-sm-4">

				<div class="panel panel-default">

					<div class="panel panel-header">
						<h4>Brief About Politics</h4>
					</div>
 
             <form method="post" onsubmit="return validation();">
                    <div class="panel panel-body">
                    	<div class="input-group words" contenteditable>
    <span style="background:#010E28;color:white;" class="input-group-addon"><i class="glyphicon glyphicon-bullhorn"></i></span>
    <textarea style="border:1px solid #010E28;" type="text" id="p" class="form-control" name="atest" placeholder="Say something or input something..." rows="5" autofocus required></textarea>
  </div>
				    </div>


					<div class="panel panel-footer">
						<center> <span id="wait_tip" style="display:none;"> Please wait!..</span></center><br>
						<button style="background-color:#010E28;" class="btn btn-primary btn-block" name="btn_atest">Upload Audio Test</button>
					</div>
				</form>
					
				</div>
				
			</div>

           
		</div>

		
		
	</div>

<script type="text/javascript">

    var speech = true;
    window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    const recognition = new SpeechRecognition();
    recognition.interimResults = true;
    const words = document.querySelector('.words');

    words.appendChild(p);
    recognition.addEventListener('result', e => {
      const transcript = Array.from(e.results)
      .map(result => result[0])
      .map(result => result.transcript)
      .join('')

      document.getElementById("p").value = transcript;

      console.log(transcript);
      });

    if(speech == true)
    {
      recognition.start();
      recognition.addEventListener('end', recognition.start);
    }
    
  </script>


</body>


</html>