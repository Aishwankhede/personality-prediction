<?php
session_start();
include('../connect.php');

if(empty($_SESSION['aname']))
{
	header('location:index');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home Page</title>
	<?php include('../bootcdn.php') ?>
	<style type="text/css">
       .well-sm, .well {box-shadow:0 0 2px #010E28;}
		#gicon {text-align:center;
		         background-color:#010E28;
		         padding:15px;
		         border-radius:30px;
		         font-size:30px;
		         color:white;}

		.col-sm-3 .well h3 {color:#010E28;}
		.col-sm-3 .well:hover {border:1px solid #010E28;}

               .table thead tr th {background-color:#010E28;
                                  color:white;}
                .table thead tr {border-left:2px solid #010E28;border-right:2px solid #010E28;}                  
               .table thead tr th {border:1px solid white;}
              .table tbody tr td {border:1px solid #010E28;}
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-home"></span>
			<b>HOME PAGE</b>
		</div>
		

		<!-- -------------------- Content page start ----------------------------- -->

       <div class="row">

       	<div class="col-sm-3">
       		<div class="well">
       			<?php
       			$a = mysqli_query($con,"SELECT * FROM `tbl_users` ");
       			$aa = mysqli_num_rows($a);
       			?>
       			<center>
       				<span id="gicon" class="glyphicon glyphicon-th-large"></span>
       				<h4>Candidates - <?php echo $aa; ?></h4>
       			</center>
       		</div>
       	</div>


       	<div class="col-sm-3">
       		<div class="well">
       			<?php
       			$b = mysqli_query($con,"SELECT * FROM `tbl_resume` ");
       			$bb = mysqli_num_rows($b);
       			?>
       			<center>
       				<span id="gicon" class="glyphicon glyphicon-list-alt"></span>
       				<h4>Resumes - <?php echo $bb; ?></h4>
       			</center>
       		</div>
       	</div>


       	<div class="col-sm-3">
       		<div class="well">
       			<?php
       			$c = mysqli_query($con,"SELECT * FROM `tbl_question` ");
       			$cc = mysqli_num_rows($c);
       			?>
       			<center>
       				<span id="gicon" class="glyphicon glyphicon-th"></span>
       				<h4>Question Set - <?php echo $cc; ?></h4>
       			</center>
       		</div>
       	</div>
       	
       </div>

		<!-- -------------------- Content page end ----------------------------- -->


              <div class="row">

                     <div class="col-sm-6">
                            <div class="well">
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <h4>Short Listed Candidates:-</h4>
                                     </div>
                                     <div class="col-sm-6">
                                       <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<input type="text" id="myInput" class="form-control" placeholder="Filter Result.." autofocus="">
                                     </div>
                                   </div>
                                   <br>
                                   <div class="table-responsive">
                                          <table class="table table-striped table-hover table-bordered">
                                                 <thead>
                                                        <tr>
                                                               <th>Sr No</th>
                                                               <th>Candidtae Name</th>
                                                               <th>Contact Number</th>
                                                               <th>Percentage</th>
                                                        </tr>
                                                 </thead>
                                                 <tbody id="myTable">
                                                        <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_users` ORDER BY uid desc");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>

                                    <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td><a href="test_result?id=<?php echo $ulist_data['uid'] ?>"><?php echo $ulist_data['uname'] ?></a></td>
                                          <td><?php echo $ulist_data['contact'] ?></td>
          
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
          <!-- <p><b>Candidate Name : </b><?php echo $ulist_data['uname'] ?></p>
        <p><b>Marks Obtained : </b><?php echo $total ?> / 25</p>
        <p><b>Percentage : </b>
          <?php
          echo $t = $total/25 * 100;
          ?>%
        </p> -->
          <?php
          }else{ 
            echo 'No Data Available..';
          } ?>
         <td><?php echo $t = $total/25 * 100;  ?>%</td>
   </tr>
   <?php $counter++;} ?>
                                                 </tbody>
                                          </table>
                                   </div>
                            </div>
                     </div>
                     
              </div>
		
	</div>

</body>
</html>