<?php
session_start();
include('../connect.php');

if(empty($_SESSION['aname']))
{
	header('location:index');
}
error_reporting(0);
$id = $_GET['id'];
mysqli_query($con,"DELETE FROM `tbl_users` WHERE `uid` = $id ");


if(isset($_POST['add']))
{
  $category = mysqli_real_escape_string($con,$_POST['category']);
  $que = mysqli_real_escape_string($con,$_POST['que']);
  $opt1 = mysqli_real_escape_string($con,$_POST['opt1']);
  $opt2 = mysqli_real_escape_string($con,$_POST['opt2']);
  $opt3 = mysqli_real_escape_string($con,$_POST['opt3']);
  $opt4 = mysqli_real_escape_string($con,$_POST['opt4']);
  $ans = mysqli_real_escape_string($con,$_POST['ans']);

  mysqli_query($con,"INSERT INTO `tbl_question`(`category`,`que`,`opt1`,`opt2`,`opt3`,`opt4`,`ans`)VALUES('".$category."','".$que."','".$opt1."','".$opt2."','".$opt3."','".$opt4."','".$ans."')");
  echo "<script>
  alert('Successfully Add New Question in DataSet..');
  window.location.href='question_set';
  </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Question Set Page</title>
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
			<b>QUESTIONS LIST PAGE</b>
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
                            <a style="background-color:#010E28;color:white;" href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                   <span class="glyphicon glyphicon-plus"></span>
                                   ADD QUESTION
                            </a>


 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Question</h4>
      </div>
      <div class="modal-body">
        
        <form method="post">

          <select type="text" name="category" class="form-control" required="">
            <option value="">Select Category</option>
            <option>Openness</option>
            <option>Conscientiousness</option>
            <option>Agreeableness</option>
            <option>Extraversion</option>
            <option>Neuroticism</option>
          </select>
          <br>
          <textarea type="text" name="que" class="form-control" placeholder="Enter Question.."></textarea>
          <br>
          <input type="text" name="opt1" class="form-control" placeholder="Option A">
          <br>
          <input type="text" name="opt2" class="form-control" placeholder="Option B">
          <br>
          <input type="text" name="opt3" class="form-control" placeholder="Option C">
          <br>
          <input type="text" name="opt4" class="form-control" placeholder="Option D">
          <br>
          <input type="text" name="ans" class="form-control" placeholder="Enter Answer A/B/C/D">
          <br>
          <button type="sumbit" class="btn btn-default" name="add">Add to DataSet</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


                     </div>
                     
              </div>


              <!-- -------------- user list table start ---------- -->
             <br>
               <div class="table-responsive">

                     <table class="table table-hover table-striped table-bordered">

                            <thead>
                                   <tr>
                                          <th>Sr No</th>
                                          <th>Category</th>
                                          <th>Questions</th>
                                          <th>Option A</th>
                                          <th>Option B</th>
                                          <th>Option C</th>
                                          <th>Option D</th>
                                          <th>Answer</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>

                            <tbody id="myTable">
                                   <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_question` ORDER BY qid desc");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>
                                   <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td><?php echo $ulist_data['category'] ?></td>
                                          <td><?php echo $ulist_data['que'] ?></td>
                                          <td><?php echo $ulist_data['opt1'] ?></td>
                                          <td><?php echo $ulist_data['opt2'] ?></td>
                                          <td><?php echo $ulist_data['opt3'] ?></td>
                                          <td><?php echo $ulist_data['opt4'] ?></td>
                                          <td><?php echo $ulist_data['ans'] ?></td>
                                          <td>
                                              <a onclick="return confirm('Are you sure?')" href="question_set?id=<?php echo $ulist_data['uid'] ?>">
                                              <span class="glyphicon glyphicon-trash"></span>
                                              Delete
                                              </a>   
                                          </td>
                                   </tr>
                            <?php $counter++;} ?>
                            </tbody>
                            
                     </table>
                      
               </div>

              <!-- -------------- user list table send ---------- -->


		<!-- -------------------- Content page end ----------------------------- -->
		
	</div>

</body>
</html>