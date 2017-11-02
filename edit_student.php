<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ajax_project6/core/init.php';


if(isset($_GET['edit'])){
	$edit_id_url=$_GET['edit'];

	if(isset($_POST['st_btn'])){
		$st_fname=$_POST['st_fname'];
		$st_lname=$_POST['st_lname'];
		$st_email=$_POST['st_email'];
		$st_birthdate=$_POST['st_birthdate'];
		$id_number=$_POST['id_number'];
		$st_telnumber=$_POST['st_telnumber'];
        mysqli_query($con,"UPDATE student set st_fname='$st_fname', st_lname='$st_lname', st_email='$st_email', st_birthdate='$st_birthdate', id_number='$id_number', st_telnumber='$st_telnumber' WHERE student_id ='$edit_id_url'");
        header("location:home.php");


    }
	  
    $sql=mysqli_query($con,"SELECT * FROM student WHERE student_id='$edit_id_url'");
    $row=mysqli_fetch_assoc($sql);  
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT STUDENT</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body{
    	margin-top: 50px;
    }
	.edit_student{
			width: 50%;
			margin: auto;
			padding: 20px;
			background-color: #ffbb33;
			border-radius: 5px; 
	}
</style>
</head>
<body>
    <div class="container">
    	<div class="edit_student">
      	    <div class="row">
      	    	<form action="edit_student.php?edit=<?=$row['student_id']?>" method="POST">
	           	    <p style=" text-transform: uppercase; text-align: center; color: #fff; font-size: 20px; display: block;">edith student data and submit</p>
	        		<div class="col-md-6 form-group">
	        		    <input type="text" name="st_fname" id="st_fname" class="form-control" placeholder="Student First Name" value="<?=$row['st_fname'];?>">
	        		</div>
	        	    <div class="col-md-6 form-group">
	        			<input type="text" name="st_lname" id="st_lname" class="form-control" placeholder="Student Last Name" value="<?=$row['st_lname'];?>">
	                </div>
	        		<div class="col-md-12 form-group">
	        			<input type="email" name="st_email" id="st_email" class="form-control" placeholder="Student Email" value="<?=$row['st_email'];?>">
	        	    </div>
	        	    <div class="col-md-12 form-group">
	        			<input type="date" name="st_birthdate" id="st_birthdate" class="form-control" placeholder="Student Birthdate" value="<?=$row['st_birthdate'];?>">
	        		</div>
	        	    <div class="col-md-12 form-group">
	    		   	    <input type="number" name="id_number" class="form-control" id="id_number" placeholder="Identity Card Number" value="<?=$row['id_number'];?>">
	    		   	</div>  				
	                <div class="col-md-12 form-group"> 
	                    <input type="number" name="st_telnumber" id="st_telnumber" class="form-control" placeholder="Student Telephone Number" value="<?=$row['st_telnumber'];?>">
	                </div>
	        		<div class="col-md-12 form-group">
	        		    <button type="submit" name="st_btn" id="st_btn" class="btn btn-primary form-control">Send</button>
	        		</div>
	        		<div class="col-md-12 form-group">
	        			<a href="home.php" class="btn btn-danger form-control">Back to home</a>
	        		</div>
	        	</form>	       	 	
            </div>
        </div>
    </div>
</body>
</html>