<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/oop2/core/init.php';


if(isset($_POST['signin_val'])){
	$email_signin=$_POST['email_signin'];
	$pword_signin=$_POST['pword_signin'];

	$sql=mysqli_query($con,"SELECT email,pword FROM house_master WHERE email='$email_signin' AND pword='$pword_signin'");
	if(mysqli_num_rows($sql)==1){

		$sql=mysqli_query($con,"SELECT house_master_id FROM house_master WHERE email='$email_signin'");
		$row=mysqli_fetch_assoc($sql);

		$_SESSION['loggedin']=$row['house_master_id'];
		
     echo "success";
    }else{
     header("location:../../error_page.php");	
    }
    
}

?>