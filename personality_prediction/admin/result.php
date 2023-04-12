<?php
session_start();
include('../connect.php');

if(empty($_SESSION['aname']))
{
	header('location:index');
}
/*error_reporting(0);
$id = $_GET['id'];
mysqli_query($con,"DELETE FROM `tbl_users` WHERE `uid` = $id ");
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>
	<?php include('../bootcdn.php') ?>
	<style type="text/css">
		.well-sm, .well {box-shadow:0 0 2px #010E28;}
      .panel-header {background-color:#010E28;
                   color:white;
                   text-align:center;}
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-th-list"></span>
			<b>RESULT PAGE</b>
		</div>
		

		<!-- -------------------- Content page start ----------------------------- -->

            

              <!-- -------------- result list table start ---------- -->
             <br>
             <div class="row">
           
                                   <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_users` ORDER BY uid desc");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>

                                    <div class="col-sm-4">
              
              <div class="panel panel-default">
                <div class="panel panel-header">
                  <h4>Test Result (<?php echo $ulist_data['uname'] ?>)</h4>
                </div>
                <div class="panel panel-body">
                  <?php
            $numdata = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `uid` = '".$ulist_data['uid']."' ");
            $numdata1 = mysqli_num_rows($numdata);
            if($numdata1==5)
            {
            $rdata = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `uid` = '".$ulist_data['uid']."' ");
            $total = 0;
            while($row = mysqli_fetch_assoc($rdata)){
            ?>
            <?php $total = $total + $row['marks']; ?>
            <?php 
          }
          ?>
          <p><b>Candidate Name : </b><?php echo $ulist_data['uname'] ?></p>
        <p><b>Marks Obtained : </b><?php echo $total ?> / 25</p>
        <p><b>Percentage : </b>
          <?php
          echo $t = $total/25 * 100;
          ?>%
        </p>
          <?php
          }else{ 
            echo 'No Data Available..';
          } ?>

                </div>
                <div class="panel panel-footer">
                  <a href="test_result?id=<?php echo $ulist_data['uid'] ?>"><button style="background-color:#010E28;" class="btn btn-primary btn-block">View Result</button></a>
                </div>
              </div>

            </div>
                                  
                            <?php } ?>
                          </div>
                      

              <!-- -------------- result list table send ---------- -->


		<!-- -------------------- Content page end ----------------------------- -->
		
	</div>

</body>
</html>