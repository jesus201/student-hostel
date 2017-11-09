<?php


class Validation {

	 private $con;
	 private $userloggedin;
	 private $datevalidator;
	 private $displayData;

	 public function __construct($con,$userloggedin){
	 	$this->con = $con;
	 	$this->userloggedin  = $userloggedin;
	 	$this->datevalidator = new DateValidator();
	 	$this->displayData = new DisplayData($con, $userloggedin);


	 }

public function validate_student($st_fname,$st_lname,$st_email,$st_birthdate,$id_number,$st_telnumber,$st_dateregister){


  
  	mysqli_query($this->con,"INSERT INTO student
  	    (st_fname,st_lname,st_email,st_birthdate,id_number,st_telnumber,st_dateregister,house_master_id)
  	    VALUES
  	    ('$st_fname','$st_lname','$st_email','$st_birthdate','$id_number','$st_telnumber','$st_dateregister','$this->userloggedin') 
  		");


  
  //fetch students
  	return $this->displayData->fetchStudents();
   
  }





}






?>