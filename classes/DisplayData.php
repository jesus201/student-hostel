<?php


class DisplayData{

	private $con;
	private $userloggedin;
	private $datevalidator;

	function __construct($con, $userloggedin){
		$this->con = $con;
	 	$this->userloggedin  = $userloggedin;
	 	$this->datevalidator = new DateValidator();
	}

public function fetchStudents(){
			//display  data2

  $sql=mysqli_query($this->con,"SELECT * FROM student WHERE house_master_id ='$this->userloggedin' ORDER By student_id DESC LIMIT 1 ");// LIMIT 1 //not so clear?.
  $row = mysqli_fetch_assoc($sql);
  $student_id=$row['student_id'];
  $st_fname=$row['st_fname'];
  $st_lname=$row['st_lname'];
  $st_email=$row['st_email'];
  $st_birthdate=$row['st_birthdate'];
  $id_number=$row['id_number'];
  $st_telnumber=$row['st_telnumber'];
  $st_dateregister=$this->datevalidator->date_time($row['st_dateregister']);
  $house_master_id=$row['house_master_id'];

  $str="";

  $str= " <tr>
  <td><a href='edit_student.php?edit=$student_id' title='edit'><i class='fa fa-pencil-square-o text-primary' aria-hidden='true'></i></a></td>
                        <td><a href='home.php?delete=$student_id' title='delete'><i class='fa fa-trash-o text-danger' aria-hidden='true'></i></a></td>
                        <td>$student_id</td>
                        <td>$st_fname</td>
                        <td>$st_lname</td>
                        <td>$st_email</td>
                        <td>$st_birthdate</td>
                        <td>$id_number</td>
                        <td>$st_telnumber</td>
                        <td>$st_dateregister</td>
                        <td>$house_master_id</td>


                        </tr>";


                    return $str;
	}


}





?>