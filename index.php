<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ajax_project6/core/init.php';

if(isset($_SESSION['loggedin'])){
	header("location:home.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AJAX PROJECT 6</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--custom style sheet-->
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
    <div class="container">
    	<div class="col-md-12">
    		<div class="style_inputs">
    			<div class="row">
    				 <p style="text-align: center; text-transform: uppercase; color:blue; font-size: 40px; font-family: sans-serif;" id="text_id">signin</p>

    				 <!--SIGNUP-->
    				<div id="signup" style="display: block;">
	    				<p style="background-color:red;color: #fff;padding:5px;margin-top:30px;border-radius:3px;display:none;" id="suc_signup">error</p>
				   	    <div class="col-md-6 form-group">
				   	  	   <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter fname">
				   	    </div>
				   	    <div class="col-md-6 form-group">
				   	  	   <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name">
				   	    </div>
				   	    <div class="col-md-12 form-group">
				   	  	   <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="Birthdate">
				   	    </div>
				   	    <div class="col-md-12 form-group">
				   	  	   <input type="number" name="id_number" class="form-control" id="id_number" placeholder="Identity Card Number">
				   	    </div>
				   	    <div class="col-md-12 form-group">
				   	  	   <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
				   	    </div>
				   	    <div class="col-md-12 form-group">
				   	  	   <input type="password" name="pword" class="form-control" id="pword" placeholder="Enter Password">
				   	    </div>
				   	    <div class="col-md-12 form-group">
				   	  	   <input type="password" name="cpword" class="form-control" id="cpword" placeholder="Confirm Password">
				   	    </div>
				   	    <div class="col-md-12 form-group">
				   	  	   <button type="button" id="btn_val" name="btn_val" class="form-control btn btn-primary" onclick="signup_validate()">SIGNUP</button>
				   	    </div>
				   	    <a style="padding: 15px; color:blue; cursor: pointer;" onclick="display_signin()">Aready have an Account!. Login.</a>
				   	</div>
				   	<!--END OF SIGNUP-->    

			   	     <!--SIGNIN-->
                      <div id="signin" style="display: none;">
                      	    <p style="background-color:red;color: #fff;padding:5px;margin-top:30px;border-radius:3px;display:none;" id="suc_signin">error</p>
	          	   	        <div class="col-md-12 form-group">
	   	    	 	  	    	 <input type="email" name="email_signin" id="email_signin" class="form-control" placeholder="Your Email*">
	   	    	 	  	    </div>
	   	    	 	  	    <div class="col-md-12 form-group">
	   	    	 	  	    	 <input type="password" name="pword_signin" id="pword_signin" class="form-control" placeholder="Your Password*">
	   	    	 	  	    </div>
	   	    	 	  	    <div class="col-md-12 form-group">
	   	    	 	  	    	 <button type="button" name="signin_val" id="signin_val" class="btn btn-primary form-control" onclick="signin_validate()">SIGNIN</button>
	   	    	 	  	    </div>
	   	    	 	  	    <a style="padding: 15px; color:blue; cursor: pointer;" onclick="display_signup()">Aready have an Account!. Signup.</a>
                      </div>
                      <!--END OF SIGNIN-->
      	   	   
    			</div>
    		</div>
    	</div>
    </div>
</body>
<script>

    function signin_validate(){


    	var email_signin = document.getElementById('email_signin').value;
		var pword_signin = document.getElementById('pword_signin').value;
		var signin_val = document.getElementById('signin_val').value;

		var data2 = "email_signin="+email_signin+"&pword_signin="+pword_signin+"&signin_val="+signin_val;


		//check if user has entered email
		if (email_signin =="") { 

				// var sum = 1+3;//templating

				// var num1=3;

				jQuery("#suc_signin").fadeIn();
				jQuery("#suc_signin").html("Email Not entered");

				setTimeout( () => {
 						jQuery("#suc_signin").fadeOut();
				}, 2000);

				//alert(`the sum is: ${sum} the value of num1 is ${num1}`); //emplating
				//alert("the sum is: "+sum+" the value is "+num1);

				return false;


		}

        
		jQuery.ajax({

			url:"controllers/formhandlers/signin.php",
			method:"POST",
			data:data2,
			cache:false,

			success:function(data2){

				if(data2=="success"){


			      //remove message after 2sec	
		        setTimeout(function(){
                     jQuery("#suc").fadeOut();
		        }, 2000);
		        // //end setTimeout

		        window.location.replace('home.php');//to redirect to a new page

                }
				if(data1=="error"){
					jQuery("#suc").fadeIn();
					jQuery("#suc").html("This was not a success");
					jQuery("#suc").css("background-color","red");

					
            			jQuery("#email").val('');
            			jQuery("#pword").val('');
            			
            	//remove message after 2sec	
		        setTimeout(function(){
                     jQuery("#suc").fadeOut();
		        }, 2000);
		        // //end setTimeout
				}
             
           },
		    error:function(){
				alert("error");
			}

		
		});
     }

	function signup_validate(){

		var  fname = document.getElementById('fname').value;
		var  lname = document.getElementById('lname').value;
		var  birthdate = document.getElementById('birthdate').value;
		var  id_number = document.getElementById('id_number').value;
		var  email = document.getElementById('email').value;
		var  pword = document.getElementById('pword').value;
		var  cpword = document.getElementById('cpword').value;
		var  btn_val = document.getElementById('btn_val').value;
		var data1 = "fname="+fname+"&lname="+lname+"&birthdate="+birthdate+"&id_number="+id_number+"&email="+email+"&pword="+pword+"&cpword="+cpword+"&btn_val="+btn_val;

		jQuery.ajax({

			url:"controllers/formhandlers/signup.php",
			method:"POST",
			data:data1,
			cache:false,

			success:function(data1){
				if(data1=="success"){
				
            	//remove message after 2sec	
		        setTimeout(function(){
                     jQuery("#suc").fadeOut();
		        }, 2000);
		        // //end setTimeout

		       window.location.replace('home.php');//to redirect to a new page

				}

				if(data1=="error"){
					jQuery("#suc").fadeIn();
					jQuery("#suc").html("This was not a success");
					jQuery("#suc").css("background-color","red");

					
            			jQuery("#email").val('');
            			jQuery("#pword").val('');
            			jQuery("#cpword").val('');
            			
            			
            	//remove message after 2sec	
		        setTimeout(function(){
                     jQuery("#suc").fadeOut();
		        }, 2000);
		        // //end setTimeout
				}
			},
			error:function(){
				alert("error");
			}
		})
	}

function display_signup(){
	  jQuery("#signup").css("display","block");
	  jQuery("#signin").css("display","none");
	  jQuery("#text_id").html("SIGNUP");
	}

function display_signin(){
     jQuery("#signin").css("display","block");
     jQuery("#signup").css("display","none");
     jQuery("#text_id").html("SIGNIN");
}      
</script>
</html>