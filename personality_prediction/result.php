<?php
session_start();
include('connect.php');

if(empty($_SESSION['uid']))
{
	header('location:index');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		<style type="text/css">
		.well-sm, .well {box-shadow:0 0 2px #010E28;}

		.col-sm-3 .well h3 {color:#010E28;}
		.col-sm-3 .well:hover {border:1px solid #010E28;}

              .table thead tr th {background-color:#010E28;
                                  color:white;}
                .table thead tr {border-left:2px solid #010E28;border-right:2px solid #010E28;}                  
               .table thead tr th {border:1px solid white;}
              .table tbody tr td {border:1px solid #010E28;}
	</style>
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-list"></span>
			<b>RESULT PAGE</b>
		</div>


		<!-- result table start -->

       <div class="table-responsive">
       	<table class="table table-striped table-hover table-bordered">
       		<thead>
       			<tr>
       				<th>Sr No</th>
       				<th>Question</th>
       				<th>Answer Attemp</th>
       				<th>Marks</th>
       			</tr>
       		</thead>
       		<tbody>
       			<?php
       			$numdata = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `uid` = '".$_SESSION['uid']."' ");
       			$numdata1 = mysqli_num_rows($numdata);
       			if($numdata1==5)
       			{
       			$rdata = mysqli_query($con,"SELECT * FROM `tbl_test` WHERE `uid` = '".$_SESSION['uid']."' ");
       			$counter = 1;
       			$total = 0;
       			while($row = mysqli_fetch_assoc($rdata)){
       			?>
       			<tr>
       				<td><?php echo $counter; ?></td>
       				<td>
       					<?php
       					$sql = mysqli_query($con,"SELECT * FROM `tbl_question` WHERE `qid` = '".$row['que']."' ");
       					while($row1 = mysqli_fetch_assoc($sql)){
       				    ?>
       				    <p><?php echo $row1['que'] ?></p>
       				    <ol type="A">
       				    	<li><?php echo $row1['opt1'] ?></li>
       				    	<li><?php echo $row1['opt2'] ?></li>
       				    	<li><?php echo $row1['opt3'] ?></li>
       				    	<li><?php echo $row1['opt4'] ?></li>
       				    </ol>
       				    <b>Ans: <?php echo $row1['ans'] ?></b>
       				<?php } ?>
       				</td>
       				<td><?php echo $row['ans']; ?></td>
       				<td><?php echo $row['marks']; ?></td>
       				<?php $total = $total + $row['marks'] ?>
       			</tr>
       		<?php $counter++;}}else{ echo '<script>alert("Finish your test first...");window.location.href="test";</script>';} ?>
       		</tbody>
       	</table>
       </div>
		<!-- result table end -->

      <div class="well">
		<p><b>Candidate Name : </b><?php echo $_SESSION['uname'] ?></p>
		<p><b>Marks Obtained : </b><?php echo $total ?> / 25</p>
		<p><b>Percentage : </b>
			<?php
			echo $t = $total/25 * 100;
			?>%
		</p>
	</div>
		
	</div>

</body>
</html>