<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/oop2/core/init.php';

if(isset($_POST['st_btn'])){
	$st_fname=$_POST['st_fname'];
	$st_lname=$_POST['st_lname'];
	$st_email=$_POST['st_email'];
	$st_birthdate=$_POST['st_birthdate'];
	$id_number=$_POST['id_number'];
	$st_telnumber=$_POST['st_telnumber'];
	$st_dateregister=date("Y-m-d H:i:s");

	echo $validation->validate_student($st_fname,$st_lname,$st_email,$st_birthdate,$id_number,$st_telnumber,$st_dateregister);

    
}

?>