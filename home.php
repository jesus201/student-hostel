<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ajax_project6/core/init.php';

if(!isset($_SESSION['loggedin'])){
	header("location:index.php");
}

$sql=mysqli_query($con,"SELECT * FROM student WHERE house_master_id ='$userloggedin'");

if(isset($_GET['delete'])){
  $delete_url_id=$_GET['delete'];

  mysqli_query($con,"DELETE FROM student WHERE student_id='$delete_url_id'");
  header("location:home.php");
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>STUDENT HOSTEL</title>

 	<!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <!--fonts awesome icon-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--customstyle sheet-->
 <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
 <style>

body{
    margin-top: 0px;
}

.student_input{
 	width: 50%;
 	margin: auto;
	padding: 20px;
 	background-color: #616161;
 	border-radius: 5px;
}
 </style>

</head>
<body>
	<div style="background-color: #aa66cc">
        <p style="width: 100%; color: #fff; text-align: center; font-size: 30px;">WELCOME TO THE STUDENT HOSTEL.</p>
        <p style="color: #fff; text-align: center; text-transform:capitalize; font-size: 25px;">The confort and security of all student ternants is our priority.</p>
        <p style="background-color: grey; color:#fff; font-size: 25px; text-transform: capitalize; text-align: center; border-radius: 5px; padding: 10px;">the housemaster,MR <?=$masterfname?> <?=$masterlname?> will enter ternant infomation.</p>
    </div>
    <form action="controllers/formhandlers/signout.php">
       <button type="submit" class="btn btn-warning btn-lg">Signout</button>
    </form>
     <div class="container">
       	<div class="student_input">
      	    <div class="row">
           	     <p style="width: 100%; background-color: blue; color: #fff; padding: 5px; display: none;" id="suc2">error</p>
        		     <div class="col-md-6 form-group">
        			        <input type="text" name="st_fname" id="st_fname" class="form-control" placeholder="Student First Name">
        			   </div>
        			   <div class="col-md-6 form-group">
        			        <input type="text" name="st_lname" id="st_lname" class="form-control" placeholder="Student Last Name">
                 </div>
        		     <div class="col-md-12 form-group">
        			        <input type="email" name="st_email" id="st_email" class="form-control" placeholder="Student Email">
        		      </div>
        			    <div class="col-md-12 form-group">
        			        <input type="date" name="st_birthdate" id="st_birthdate" class="form-control" placeholder="Student Birthdate">
        		      </div>
        		      <div class="col-md-12 form-group">
    		   	  	       <input type="number" name="id_number" class="form-control" id="id_number" placeholder="Identity Card Number">
    		   	       </div>  				
                   <div class="col-md-12 form-group"> 
                       <input type="number" name="st_telnumber" id="st_telnumber" class="form-control" placeholder="Student Telephone Number">
                   </div>
        		       <div class="col-md-12 form-group">
        				       <button type="button" name="st_btn" id="st_btn" class="btn btn-primary form-control" onclick="student_validate()">Send</button>
        			    </div>       	 	
              </div>
        </div>

         <div class="row">
              <table class="table">
                <thead>
                    <tr>
                      <th></th>
                      <th></th>
                       <th>STUDENT-ID</th>
                       <th>ST-FIRST NAME</th>
                       <th>ST-LAST NAME</th>
                       <th>ST-EMAIL</th>
                       <th>ST-BIRTHDATE</th>
                       <th>ST-ID-NUMBER</th>
                       <th>ST-TELNUMBER</th>
                       <th>ST-DATEREGISTER</th>
                       <th>HOUSEMASTER_ID</th>
                    </tr>
                </thead>
                <tbody id="display_ajaxdata">
                  <?php while ($row=mysqli_fetch_assoc($sql)):?>
                    <tr>
                      <td><a href='edit_student.php?edit=<?=$row['student_id']?>' title='edit'><i class='fa fa-pencil-square-o text-primary' aria-hidden='true'></i></a></td>
                      <td><a href='home.php?delete=<?=$row['student_id']?>' title='delete'><i class='fa fa-trash-o text-danger' aria-hidden='true'></i></a></td>
                      <td><?=$row['student_id'];?></td>
                      <td><?=$row['st_fname'];?></td>
                      <td><?=$row['st_lname'];?></td>
                      <td><?=$row['st_email'];?></td>
                      <td><?=$row['st_birthdate'];?></td>
                      <td><?=$row['id_number'];?></td>
                      <td><?=$row['st_telnumber'];?></td>
                      <td><?=date_time($row['st_dateregister']);?></td>
                      <td><?=$row['house_master_id'];?></td>
                    </tr>

                   <?php endwhile ;?> 

                   <!--Display data after validation fake-->
                   
                </tbody>

              </table> 
            </div>
      </div>      
</body>
 <script>

 var userloggedin = <?=$userloggedin;?>;
  	
      function student_validate(){

           var st_fname = document.getElementById('st_fname').value;
           var st_lname = document.getElementById('st_lname').value;
           var st_email = document.getElementById('st_email').value;
           var st_birthdate = document.getElementById('st_birthdate').value;
           var id_number = document.getElementById('id_number').value;
           var st_telnumber = document.getElementById('st_telnumber').value;
           var st_btn = document.getElementById('st_btn').value;

           var data2 = "st_fname="+st_fname+"&st_lname="+st_lname+"&st_email="+st_email+"&st_birthdate="+st_birthdate+"&id_number="+id_number+"&st_telnumber="+st_telnumber+"&st_btn="+st_btn;

           jQuery.ajax({


           	url:"controllers/formhandlers/validate_student.php",
           	method:"POST",
           	data:data2,
           	cache:false,



           	success:function(data2){
           	
                     jQuery("#suc2").fadeIn();
                     jQuery("#suc2").html("Student data successfully validated");
                     jQuery("#suc2").css("background-color","green");

                     //EMPTY the empty the inputfields after clicking the validate button
                         jQuery("#st_fname").val('');
                         jQuery("#st_lname").val('');
                         jQuery("#st_email").val('');
                         jQuery("#st_birthdate").val('');
                         jQuery("#id_number").val('');
                         jQuery("#st_telnumber").val('');
                       //END OF EMPTY the inputfields after clicking the validate button    



                      
                         setTimeout(function(){ //setTimeout to erase(fadeOut) the success text after display 
                              jQuery("#suc2").fadeOut();
                         }, 2000);
                        //End of setTimeout text   


                        //display student data
                       jQuery("#display_ajaxdata").append(data2);
           		

           		
            },

            error:function(){
           		     alert("error");
           	}

        })

    }
</script>
</html>