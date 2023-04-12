<?php
session_start();
include('../connect.php');

if(empty($_SESSION['aname']))
{
	header('location:index');
}

error_reporting(0);
$id = $_GET['id'];
mysqli_query($con,"DELETE FROM `tbl_resume` WHERE `uid` = $id ");

if(isset($_POST['update_test']))
{
	$uid = $_POST['uid'];
	mysqli_query($con,"UPDATE `tbl_resume` SET `flag`=1 WHERE `uid` = '".$uid."' ");
	header('location:resumes');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Uploaded Resumes</title>
    <?php include('../bootcdn.php') ?>
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
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-th-list"></span>
			<b>UPLOADED RESUMES PAGE</b>
		</div>
		

		<!-- -------------------- Content page start ----------------------------- -->

              <div class="row">

                     <div class="col-sm-3">

                      <input style="border:1px solid #010E28;" class="form-control" id="myInput" type="text" placeholder="Filter Here..">

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
                            
                     </div>

                     <div class="col-sm-7">
                            
                     </div>

                     <div class="col-sm-2">
                            <a style="background-color:#010E28;color:white;" href="#" class="btn btn-default" onclick="print()">
                                   <span class="glyphicon glyphicon-print"></span>
                                   PRINT
                            </a>
                     </div>
                     
              </div>


              <!-- -------------- resume list table start ---------- -->
             <br>
               <div class="table-responsive">

                     <table class="table table-hover table-striped table-bordered">

                            <thead>
                                   <tr>
                                          <th>Sr No</th>
                                          <th>Upload Date</th>
                                          <th>Candidate Name</th>
                                          <th>Contact Number</th>
                                          <th>Email Id</th>
                                          <th>Address</th>
                                          <th>SSC</th>
                                          <th>HSSC</th>
                                          <th>UG</th>
                                          <th>PG</th>
                                          <th>Extra Curricular</th>
                                          <th>Key Skills</th>
                                          <th>Work Experience</th>
                                          <th colspan="2">Action</th>
                                   </tr>
                            </thead>

                            <tbody id="myTable">
                                   <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_resume` ORDER BY rid desc");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>
                                   <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td><?php echo $ulist_data['rdate'] ?></td>
                                          <td><?php echo $ulist_data['cname'] ?></td>
                                          <td><?php echo $ulist_data['contact'] ?></td>
                                          <td><?php echo $ulist_data['email'] ?></td>
                                          <td><?php echo $ulist_data['address'] ?></td>
                                          <td><?php echo $ulist_data['ssc'] ?></td>
                                          <td><?php echo $ulist_data['hssc'] ?></td>
                                          <td><?php echo $ulist_data['ug'] ?></td>
                                          <td><?php echo $ulist_data['pg'] ?></td>
                                          <td><?php echo $ulist_data['extra_curr'] ?></td>
                                          <td><?php echo $ulist_data['key_skills'] ?></td>
                                          <td><?php echo $ulist_data['work_exp'] ?></td>
                                          <td>
                                              <a title="Delete Record" onclick="return confirm('Are you sure?')" href="resumes?id=<?php echo $ulist_data['uid'] ?>">
                                              <span class="glyphicon glyphicon-trash"></span>
                                              </a>   
                                          </td>
                                           <td>
                                              <form method="post" onsubmit="return confirm('Are you sure want to allow test?')">
                                              	<input type="hidden" name="uid" value="<?php echo $ulist_data['uid'] ?>">
                                              	<button title="Enable Test" style="background:none;border:none;" type="submit" name="update_test"><span class="glyphicon glyphicon-edit"></span></button>
                                              </form>   
                                          </td>
                                   </tr>
                            <?php $counter++;} ?>
                            </tbody>
                            
                     </table>
                      
               </div>

              <!-- -------------- resume list table send ---------- -->


		<!-- -------------------- Content page end ----------------------------- -->
		
	</div>

</body>
</html>