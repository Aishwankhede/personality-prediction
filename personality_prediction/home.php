<?php
session_start();
include('connect.php');
error_reporting(0);
if(empty($_SESSION['uid']))
{
	header('location:index');
}

$myresume = mysqli_query($con,"SELECT * FROM `tbl_resume` WHERE `uid` = '".$_SESSION['uid']."' ");
$mrdata = mysqli_fetch_array($myresume);

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
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-home"></span>
			<b>HOME PAGE</b>
		</div>

		<div class="row">
			
			<div class="col-sm-4">

				<div class="panel panel-default">

					<div class="panel panel-header">
						<h4>Uploaded Resume</h4>
					</div>
 
                    <div class="panel panel-body">
                    	<div class="table-responsive">
                    	<table class="table">

                    	<tr>
                    	    <th>
						         Candidate Photo :
						    </th>
						    <td>
						    	<img src="<?php echo 'pimgs/'.$mrdata['photo'] ?>" width="100px">
						    </td>
					    </tr>

                    	<tr>
                    	    <th>
						         Candidate Name :
						    </th>
						    <td>
						    	<?php echo $mrdata['cname'] ?>
						    </td>
					    </tr>

						<tr>
							<th>
								Candidate Contact :
							</th>
							<td>
								<?php echo $mrdata['contact'] ?>
							</td>
						</tr>

						<tr>
							<th>
								Candidate Email :
							</th>
							<td>
								<?php echo $mrdata['email'] ?>
							</td>
						</tr>

						<tr>
							<th>
								Candidate Address :
							</th>
							<td>
								<?php echo $mrdata['address'] ?>
							</td>
						</tr>

					</table>
				</div>


                        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $_SESSION['uname']?> Resume</h4>
      </div>
      <div class="modal-body">

      	            <div class="table-responsive">
      	            	<table class="table table-striped table-hover">
      	            	<tr>
      	            		<th>Candidate Name :</th><td><?php echo $mrdata['cname'] ?></td>
      	            	</tr>	
                        
						<tr>
      	            		<th>Candidate Contact :</th><td><?php echo $mrdata['contact'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>Candidate Email :</th><td><?php echo $mrdata['email'] ?></td>
      	            	</tr>

      	            	<tr>
      	            		<th>Candidate Address :</th><td><?php echo $mrdata['address'] ?></td>
      	            	</tr>
						
						<tr>
      	            		<th>SSC Result :</th><td><?php echo $mrdata['ssc'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>HSSC Result :</th><td><?php echo $mrdata['hssc'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>UG Result :</th><td><?php echo $mrdata['ug'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>PG Result :</th><td><?php echo $mrdata['pg'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>Extra Curricular :</th><td><?php echo $mrdata['extra_curr'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>Key Skills :</th><td><?php echo $mrdata['key_skills'] ?></td>
      	            	</tr>

						<tr>
      	            		<th>Work Experience :</th><td><?php echo $mrdata['work_exp'] ?></td>
      	            	</tr>
      	            </table>
      	        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

					</div>

					<div class="panel panel-footer">
						<button style="background-color:#010E28;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">View All Information</button>
					</div>
					
				</div>
				
			</div>

            <div class="col-sm-4">
            	
            	<div class="panel panel-default">
            		<div class="panel panel-header">
            			<h4>Test Result</h4>
            		</div>
            		<div class="panel panel-body">
            			<?php
       			$numdata = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `uid` = '".$_SESSION['uid']."' ");
       			$numdata1 = mysqli_num_rows($numdata);
       			if($numdata1==5)
       			{
       			$rdata = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `uid` = '".$_SESSION['uid']."' ");
       			$total = 0;
       			while($row = mysqli_fetch_assoc($rdata)){
       			?>
       			<?php $total = $total + $row['marks']; ?>
       			<?php 
       		}
       		?>
       		<p><b>Candidate Name : </b><?php echo $_SESSION['uname'] ?></p>
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
            	</div>

            </div>

            <div class="col-sm-2">
            	
            </div>

			<div class="col-sm-2">

				<?php
				$avl = mysqli_query($con,"SELECT * FROM `tbl_resume` WHERE `uid` = '".$_SESSION['uid']."' ");
				$avl1 = mysqli_num_rows($avl);
				?>

				<a href="test"><button style="background-color:#010E28;" class="btn btn-primary btn-lg" <?php if($avl1==0){echo 'disabled';}elseif($mrdata['flag']=='0'){echo 'disabled';}else{echo 'enabled';} ?>>Take a Test</button></a>
				
			</div>

		</div>
		
	</div>

</body>
</html>