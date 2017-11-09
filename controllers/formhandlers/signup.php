<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/oop2/core/init.php';

if(isset($_POST['btn_val'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$birthdate=$_POST['birthdate'];
	$id_number=$_POST['id_number'];
	$email=$_POST['email'];
	$pword=$_POST['pword'];
	$cpword=$_POST['cpword'];

	$sql=mysqli_query($con,"SELECT * FROM house_master WHERE email='$email'");
	if(mysqli_num_rows($sql)==0){
		mysqli_query($con,"INSERT INTO house_master
			(fname,lname,birthdate,id_number,email,pword)
			VALUES
			('$fname','$lname','$birthdate','$id_number','$email','$pword')
			");

		 $sql=mysqli_query($con,"SELECT house_master_id FROM house_master WHERE email='$email' ");
         $row=mysqli_fetch_assoc($sql);
    
         $_SESSION['loggedin']=$row['house_master_id'];
        // header("location:../../home.php");

		echo "success";
		}else{
	    echo "error";
		}

}
?>